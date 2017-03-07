<?php

use yii\db\Migration;

class m170307_055815_add_record_null_products extends Migration
{
    public function up()
    {
        $this->insert("products", ['name' => 'Без цены', 'ids' => 0]);
    }

    public function down()
    {
       $this->delete("products", ['ids' => 0]);
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
