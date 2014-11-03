<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\db\Connection;
use yii\web\UploadedFile;

/**
 * This is the model class for table "jobs".
 *
 * @property integer $id
 * @property string $code
 * @property string $title
 * @property string $division
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jobs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'title', 'division'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => '部门编码',
            'title' => '部门名称',
            'division' => '用人司局',
        ];
    }

    public function upload($name)
    {
        $arr_jobs = [];
        $upload = UploadedFile::getInstanceByName($name);
        $name = date('Y-m-d') . '-' . rand(1, 5) . '-job.xls';
        if ($upload->saveAs($name)) {
            $objPHPExcel = \PHPExcel_IOFactory::load($name);
            $jobs = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            $flag = 1;
            foreach ($jobs as $job) {
                if (!empty($job['A']) && $flag != 1) {
                    $arr_jobs[] = [
                        'code' => $job['A'],
                        'title' => $job['B'],
                        'division' => $job['C'],
                    ];
                }
                $flag++;
            }
        } else {
            return false;
        }
        return $arr_jobs;

    }
}
