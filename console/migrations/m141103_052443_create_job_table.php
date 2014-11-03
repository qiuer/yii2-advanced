<?php

use yii\db\Schema;
use yii\db\Migration;

class m141103_052443_create_job_table extends Migration
{
    public function up()
    {
        $this->createTable('jobs', [
            'id' => Schema::TYPE_PK,
            'code' => Schema::TYPE_STRING,
            'title' => Schema::TYPE_STRING,
            'division' => Schema::TYPE_STRING,
        ]);
    }

    public function down()
    {
        $this->dropTable('jobs');
    }
}
