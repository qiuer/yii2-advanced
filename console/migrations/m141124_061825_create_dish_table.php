<?php

use yii\db\Schema;
use yii\db\Migration;

class m141124_061825_create_dish_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%dish}}', [
            'id' => Schema::TYPE_PK,
            'shop_id' => Schema::TYPE_INTEGER . '(11) COMMENT "所属店铺"',
            'name' => Schema::TYPE_STRING . '(50) NOT NULL COMMENT "菜品名称"',
            'name2' => Schema::TYPE_STRING . '(50) COMMENT "菜品别名"',
            'is_package' => 'tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT "是否为套餐(0否，1是)"',
            'is_special' => 'tinyint(1) NOT NULL DEFAULT 0 COMMENT "是否为特色菜(1是，0否)"',
            'is_temporary' => 'tinyint(1) NOT NULL DEFAULT 0 COMMENT "是否为临时菜"',
            'is_random_price' => 'tinyint(1) NOT NULL DEFAULT 0 COMMENT "是否为时价菜(1是0否)"',
            'is_confirm_weight' => 'tinyint(1) NOT NULL DEFAULT 0 COMMENT "是否需要确认称重"',
            'is_single_order' => 'tinyint(1) NOT NULL DEFAULT 1 COMMENT "是否允许单点(1是，0否)"',
            'is_enable' => 'tinyint(1) NOT NULL DEFAULT 1 COMMENT "菜品是否启用(1是，0否)"',
            'price' => Schema::TYPE_DECIMAL . '(11, 2) NOT NULL DEFAULT 0.00 COMMENT "菜品当前价格"',
            'price_origin' => Schema::TYPE_DECIMAL . '(11, 2) NOT NULL DEFAULT 0.00 COMMENT "菜品原价"',
            'code' =>  Schema::TYPE_STRING . '(10) NOT NULL COMMENT "菜品编号"',
            'spell' => Schema::TYPE_STRING . '(50) NOT NULL COMMENT "菜品简拼"',
            'unit' => Schema::TYPE_STRING . '(20) COMMENT "菜品计价单位"',
            'property' => 'tinyint(1) NOT NULL DEFAULT 1 COMMENT "菜品属性"',
            'image_id' => Schema::TYPE_INTEGER . '(11) COMMENT "图片id"',
            'summary' => Schema::TYPE_TEXT . ' COMMENT "菜品简介"',
            'sort_index' => Schema::TYPE_INTEGER . '(11) COMMENT "排列序号"',
            'created_by' => Schema::TYPE_STRING . '(36) NOT NULL COMMENT "创建者"',
            'created_at' => Schema::TYPE_INTEGER . '(11) NOT NULL DEFAULT 0 COMMENT "创建时间"',
            'updated_at' => Schema::TYPE_INTEGER . '(11) NOT NULL DEFAULT 0 COMMENT "修改时间"',
        ]);
    }

    public function down()
    {
       $this->dropTable('{{%dish}}');
    }
}
