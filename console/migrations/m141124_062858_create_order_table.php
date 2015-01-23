<?php

use yii\db\Schema;
use yii\db\Migration;

class m141124_062858_create_order_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%order}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . '(11) NOT NULL COMMENT "会员编号"',
            'user_realname' => Schema::TYPE_STRING . '(20) COMMENT "真实姓名"',
            'user_sex' => 'tinyint(1) NOT NULL DEFAULT 0 COMMENT "性别(0保密，1男，2女)"',
            'user_mobile' => Schema::TYPE_STRING . '(20) COMMENT "会员手机号"',
            'total_fee' => Schema::TYPE_DECIMAL . '(11, 2) NOT NULL COMMENT "订单总价"',
            'payables' => Schema::TYPE_DECIMAL . '(11, 2) NOT NULL COMMENT "应付金额"',
            'paid' => Schema::TYPE_DECIMAL . '(11, 2) NOT NULL COMMENT "已付金额"',
            'arrive_time' => Schema::TYPE_INTEGER . '(11) NOT NULL COMMENT "到店时间"',
            'people_num' => Schema::TYPE_SMALLINT . '(11) NOT NULL COMMENT "用餐人数"',
            'table_id' => Schema::TYPE_INTEGER . '(11) NOT NULL COMMENT "预定餐台id"',
            'table_name' => Schema::TYPE_STRING . '(32) NOT NULL COMMENT "预定餐台名称"',
            'terminal_model' => 'tinyint(1) NOT NULL DEFAULT 0 COMMENT "终端设备类型(0未知)"',
            'terminal_name' => Schema::TYPE_STRING . '(36) COMMENT "终端设备名称"',
            'status' => 'tinyint(1) NOT NULL COMMENT "订单状态(0未下单，1正常，2完成，3系统取消，4会员取消，店铺取消)"',
            'shop_id' => Schema::TYPE_INTEGER . '(11) COMMENT "所属店铺id"',
            'property' => 'tinyint(1) NOT NULL COMMENT "订单属性(1正常订单，2外卖订单)"',
            'address_id' => Schema::TYPE_INTEGER . '(11) COMMENT "送餐地址id"',
            'send_time' => Schema::TYPE_INTEGER . '(11) COMMENT "送餐时间"',
            'cancel_reason' => Schema::TYPE_STRING . '(200) COMMENT "取消原因"',
            'created_by'  => Schema::TYPE_STRING . '(36) NOT NULL COMMENT "创建者"',
            'created_at' => Schema::TYPE_INTEGER . '(11) NOT NULL DEFAULT 0 COMMENT "创建时间"',
            'updated_at' => Schema::TYPE_INTEGER . '(11) NOT NULL DEFAULT 0 COMMENT "修改时间"',
            'cancel_at' => Schema::TYPE_INTEGER . '(11) NOT NULL DEFAULT 0 COMMENT "取消时间"',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%order}}');
    }
}
