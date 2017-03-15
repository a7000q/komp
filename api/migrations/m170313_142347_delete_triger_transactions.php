<?php

use yii\db\Migration;

class m170313_142347_delete_triger_transactions extends Migration
{
    public function safeUp()
    {
        $sql = '
            DROP TRIGGER IF EXISTS `insert_transaction`;
        ';

        $this->execute($sql);

        $this->dropForeignKey("fk_transactions_id_type", "transactions");
        $this->dropColumn("transactions", "id_type");
        $this->dropTable("transaction_type");

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
