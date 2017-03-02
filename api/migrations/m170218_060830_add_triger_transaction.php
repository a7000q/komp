<?php

use yii\db\Migration;

class m170218_060830_add_triger_transaction extends Migration
{
    public function up()
    {
        $sql = '
            DROP TRIGGER IF EXISTS `update_transaction`;
            
            CREATE TRIGGER `update_transaction` BEFORE UPDATE ON `transactions`
                FOR EACH ROW
                BEGIN
                    SET NEW.sum = NEW.volume * NEW.price;
                END;
        ';

        $this->execute($sql);
    }

    public function down()
    {
        $sql = '
            DROP TRIGGER IF EXISTS `update_transaction`;
        ';

        $this->execute($sql);
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
