<?php

use yii\db\Migration;

class m170301_114430_alter_column_bill_acceptor extends Migration
{
    public function up()
    {
        $this->alterColumn("bill_cassets", "status", $this->integer()->defaultValue(1));
    }

    public function down()
    {

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
