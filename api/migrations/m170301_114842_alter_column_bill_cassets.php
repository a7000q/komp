<?php

use yii\db\Migration;

class m170301_114842_alter_column_bill_cassets extends Migration
{
    public function safeUp()
    {
        $this->alterColumn("bill_cassets", "count", $this->integer()->defaultValue(0));
        $this->alterColumn("bill_cassets", "sum", $this->integer()->defaultValue(0));
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
        */
    public function safeDown()
    {
    }
}
