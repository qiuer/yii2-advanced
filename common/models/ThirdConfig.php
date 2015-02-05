<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%third_config}}".
 *
 * @property integer $id
 * @property string $app_id
 * @property string $app_secret
 * @property integer $type
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class ThirdConfig extends \yii\db\ActiveRecord
{
    public static $typeList = [
        1 => 'QQ' ,
        2 => '微博',
        3 => '豆瓣',
        4 => '微信'
    ];
    const TYPE_QQ = 1;
    const TYPE_WEIBO = 2;
    const TYPE_DOUBAN = 3;
    const TYPE_WEIXIN = 4;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%third_config}}';
    }

    public function behaviors()
    {
        return [
            ['class' => TimestampBehavior::className()]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['app_id', 'app_secret', 'type', 'status'], 'required'],
            [['type', 'status', 'created_at', 'updated_at'], 'integer'],
            [['app_id', 'app_secret'], 'string', 'max' => 32],
            ['type', 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'app_id' => 'appId',
            'app_secret' => 'appSecret',
            'type' => '第三方(1QQ，2微博，3豆瓣，4微信)',
            'status' => '启用状态(1启用，0禁用)',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
