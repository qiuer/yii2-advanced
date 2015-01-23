<?php
/**
 * Created by PhpStorm.
 * User: qxm
 * Date: 14/11/21
 * Time: 下午4:48
 */

namespace frontend\controllers;

use Yii;
use yii\mongodb\Query;
use yii\web\Controller;

class DishController extends Controller
{
    public function actionIndex()
    {
        $collection = \Yii::$app->mongodb->getCollection('customer');
        $collection->insert(['name' => 'qxm', 'sex' => 'female', 'status' => 1]);

        var_dump('aa');
    }

    public function actionView()
    {
       $query = new Query();
        $query->from('customer')
            ->limit(10);
        $rows = $query->all();
        var_dump($rows);die;
    }
} 