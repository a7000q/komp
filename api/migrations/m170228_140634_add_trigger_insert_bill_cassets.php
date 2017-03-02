<?php

use yii\db\Migration;

class m170228_140634_add_trigger_insert_bill_cassets extends Migration
{
    public function up()
    {
        $sql = '
           
           CREATE TRIGGER `insert_bill_cassets` BEFORE INSERT ON `bill_cassets`
                FOR EACH ROW
                BEGIN
                    SET NEW.date_start = UNIX_TIMESTAMP();
                END;
        ';

        $this->execute($sql);
    }

    public function down()
    {
        $sql = '
            DROP TRIGGER IF EXISTS `insert_bill_cassets`;
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
