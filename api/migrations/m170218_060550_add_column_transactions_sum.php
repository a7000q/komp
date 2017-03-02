<?php

use yii\db\Migration;

class m170218_060550_add_column_transactions_sum extends Migration
{
    public function up()
    {
        $this->addColumn('transactions', 'sum', $this->float());
    }

    public function down()
    {
        $this->dropColumn('transactions', 'sum');
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
