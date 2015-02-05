<?php

use yii\db\Schema;
use yii\db\Migration;

class m150205_034949_create_union_members_table extends Migration
{
    public $tableName1 = '{{%union_members}}';

    public $tableName2 = '{{%third_config}}';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable($this->tableName1, [
            'id' => Schema::TYPE_PK,
            'member_id' => Schema::TYPE_INTEGER . '(11) NOT NULL COMMENT "会员ID"',
            'openid' => Schema::TYPE_STRING . '(64) NOT NULL COMMENT "openid, 微信则保存为unionid"',
            'nickname' => Schema::TYPE_STRING . '(64) NOT NULL COMMENT "昵称"',
            'headimgurl' => Schema::TYPE_STRING . ' NOT NULL COMMENT "头像链接"',
            'gender' => 'tinyint(1) NOT NULL DEFAULT 1 COMMENT "性别(1男，2女)"',
            'country' => Schema::TYPE_STRING . '(64) NOT NULL DEFAULT "" COMMENT "国家"',
            'province' => Schema::TYPE_STRING . '(64) NOT NULL DEFAULT "" COMMENT "省份"',
            'city' => Schema::TYPE_STRING . '(64) NOT NULL DEFAULT "" COMMENT "城市"',
            'source' => 'tinyint(1) NOT NULL COMMENT "第三方来源(1QQ,2微博，3豆瓣，4微信)"',
            'created_at' => Schema::TYPE_INTEGER . '(11) NOT NULL COMMENT "创建时间"',
            'updated_at' => Schema::TYPE_INTEGER . '(11) NOT NULL COMMENT "更新时间"',
        ], $tableOptions);

        $this->createIndex('OPENID_INDEX', $this->tableName1, 'openid', true);

        $this->createTable($this->tableName2, [
            'id' => Schema::TYPE_PK,
            'app_id' => Schema::TYPE_STRING . '(32) NOT NULL COMMENT "appId"',
            'app_secret' => Schema::TYPE_STRING . '(32) NOT NULL COMMENT "appSecret"',
            'type' => 'tinyint(1) NOT NULL COMMENT "第三方(1QQ,2微博，3豆瓣，4微信)"',
            'status' => 'tinyint(1) NOT NULL DEFAULT 1 COMMENT "启用状态(1启用，0禁用)"',
            'created_at' => Schema::TYPE_INTEGER . '(11) NOT NULL COMMENT "创建时间"',
            'updated_at' => Schema::TYPE_INTEGER . '(11) NOT NULL COMMENT "更新时间"',
        ], $tableOptions);

        $this->createIndex('THIRD_CONFIG_TYPE_INDEX', $this->tableName2, 'type', true);
    }

    public function down()
    {
        $this->dropTable($this->tableName1);
        $this->dropTable($this->tableName2);
    }
}
