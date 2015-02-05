<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%union_members}}".
 *
 * @property integer $id
 * @property integer $member_id
 * @property string $openid
 * @property string $nickname
 * @property string $headimgurl
 * @property integer $gender
 * @property string $country
 * @property string $province
 * @property string $city
 * @property integer $source
 * @property integer $created_at
 * @property integer $updated_at
 */
class UnionMember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%union_members}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className()
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'openid', 'nickname', 'headimgurl', 'source'], 'required'],
            [['member_id', 'gender', 'source', 'created_at', 'updated_at'], 'integer'],
            [['openid', 'nickname', 'country', 'province', 'city'], 'string', 'max' => 64],
            [['headimgurl'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => '会员ID',
            'openid' => 'openid, 微信则保存为unionid',
            'nickname' => '昵称',
            'headimgurl' => '头像链接',
            'gender' => '性别(1男，2女)',
            'country' => '国家',
            'province' => '省份',
            'city' => '城市',
            'source' => '第三方来源(1QQ,2微博，3豆瓣，4微信)',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
