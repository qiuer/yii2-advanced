<?php

namespace backend\controllers;

use Yii;
use app\models\Job;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class JobController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpload()
    {
        $model = new Job();
        if (\Yii::$app->request->post()) {
            $jobs = $model->upload('job-file');
            if ($jobs != false) {
                return $this->render('upload', [
                    'model' =>$model,
                    'jobs' => $jobs
                ]);
            }
        }
    }

    public function actionConfirm()
    {
        $errors = [];
        if (\Yii::$app->request->post()) {
            $jobs = \Yii::$app->request->post('Job');
            foreach ($jobs as $key => $value) {
                $model = new Job();
                $model->setAttributes($value);
                $model->validate();
                $model->save();
                if ($model->getErrors()) {
                    $errors[] = $model->getErrors();
                }
                unset($model);
            }
            if (!empty($errors)) {
                $model = new Job();
                return $this->render('update', [
                    'jobs' => $jobs,
                    'model' => $model,
                    'errors' => $errors
                ]);
            }
            return $this->redirect(['/job/list']);
        }
    }

    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Job::find(),
            'pagination' => [
                'pageSize' => 15
            ]
        ]);
        return $this->render('list', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($id)
    {
        $model = $this->getModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/job/list']);
        }
        return $this->render('view', [
            'model' => $model
        ]);
    }

    private function getModel($id)
    {
        if (($model = Job::findOne($id)) == null) {
            throw new NotFoundHttpException ('The requested page does not exit.');
        } else {
            return $model;
        }
    }

}
