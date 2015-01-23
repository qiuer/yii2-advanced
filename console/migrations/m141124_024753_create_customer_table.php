<?php

use yii\db\Schema;
use yii\db\Migration;

class m141124_024753_create_customer_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%customer}}', [
            'id' => Schema::TYPE_PK,
            'nickname' => Schema::TYPE_STRING . '(50) NOT NULL COMMENT "会员名称"',
            'sex' => 'tinyint(1) NOT NULL DEFAULT 0 COMMENT "性别(0保密，1男，2女)"',
            'birthday_type' => 'tinyint(1) NOT NULL DEFAULT 1 COMMENT "生日类型(1公历生日-默认，2农历生日)"',
            'birthday' => Schema::TYPE_INTEGER . '(11) COMMENT "生日"',
            'mobile' => Schema::TYPE_STRING . '(32) NOT NULL COMMENT "手机号码"',
            'email' => Schema::TYPE_STRING . '(64) NOT NULL COMMENT "邮箱"',
            'qq' => Schema::TYPE_STRING . '(32) COMMENT "qq号码"',
            'openid' => Schema::TYPE_STRING . '(32) COMMENT "用户公众号"',
            'country' => Schema::TYPE_STRING . '(16) COMMENT "用户所在国家"',
            'province' => Schema::TYPE_STRING . '(16) COMMENT "用户所在省份"',
            'city' => Schema::TYPE_STRING . '(16) COMMENT "用户所在城市"',
            'created_by' => Schema::TYPE_STRING . '(36) NOT NULL COMMENT "创建者"',
            'created_at' => Schema::TYPE_INTEGER . '(11) NOT NULL DEFAULT 0 COMMENT "创建时间"',
            'updated_at' => Schema::TYPE_INTEGER . '(11) NOT NULL DEFAULT 0 COMMENT "修改时间"',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%customer}}');
    }
}
