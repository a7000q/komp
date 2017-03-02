<?php

use yii\db\Migration;

class m170301_115629_delete_triger_update_bill_cassets extends Migration
{
    public function up()
    {
        $sql = '
            DROP TRIGGER IF EXISTS `update_bill_cassets`;
        ';

        $this->execute($sql);
    }

    public function down()
    {
        echo "m170301_115629_delete_triger_update_bill_cassets cannot be reverted.\n";

        return false;
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
