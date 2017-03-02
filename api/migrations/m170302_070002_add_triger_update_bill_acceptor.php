<?php

use yii\db\Migration;

class m170302_070002_add_triger_update_bill_acceptor extends Migration
{
    public function up()
    {
        $sql = '
           
           CREATE TRIGGER `update_bill_acceptor` BEFORE UPDATE ON `bill_acceptor`
                FOR EACH ROW
                BEGIN
                    IF (OLD.status = 1 && NEW.status = 2) THEN
                        BEGIN
                            SET NEW.sum = 0;
                        END;
                    END IF;
                END;
        ';

        $this->execute($sql);
    }

    public function down()
    {
        $sql = '
            DROP TRIGGER IF EXISTS `update_bill_acceptor`;
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
