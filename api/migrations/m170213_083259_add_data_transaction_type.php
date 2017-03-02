<?php

use yii\db\Migration;

class m170213_083259_add_data_transaction_type extends Migration
{
    public function up()
    {
        $this->insert("transaction_type", ['name' => "cash"]);
        $this->insert("transaction_type", ['name' => 'card']);
    }

    public function down()
    {
       $this->delete("transaction_type", ['name' => "cash"]);
        $this->delete("transaction_type", ['name' => "card"]);
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
