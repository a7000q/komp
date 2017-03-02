<?php

use yii\db\Migration;

class m170301_062858_add_triger_insert_bills extends Migration
{
    public function up()
    {
        $sql = '
           
           CREATE TRIGGER `insert_bills` BEFORE INSERT ON `bills`
                FOR EACH ROW
                BEGIN
                    SET NEW.date = UNIX_TIMESTAMP();
                END;
        ';

        $this->execute($sql);
    }

    public function down()
    {
        $sql = '
            DROP TRIGGER IF EXISTS `insert_bills`;
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
