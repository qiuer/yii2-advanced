<?php

use yii\db\Schema;
use yii\db\Migration;

class m150205_093229_create_index extends Migration
{
    public function up()
    {
        $this->createIndex('OPENID_INDEX', '{{%union_members}}', 'openid', true);
    }

    public function down()
    {
        echo "m150205_093229_create_index cannot be reverted.\n";

        return false;
    }
}
