<?php

use yii\db\Migration;

class m170213_084212_add_data_transaction_status extends Migration
{
    public function up()
    {
        $this->insert("transaction_status", ['name' => "create"]);
        $this->insert("transaction_status", ['name' => "fuel"]);
        $this->insert("transaction_status", ['name' => "success"]);
    }

    public function down()
    {
        $this->delete("transaction_status", ['name' => "create"]);
        $this->delete("transaction_status", ['name' => "fuel"]);
        $this->delete("transaction_status", ['name' => "success"]);
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
