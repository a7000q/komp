<?php

use yii\db\Migration;

class m170228_140855_add_trigger_update_bill_cassets extends Migration
{
    public function up()
    {
        $sql = '
           
           CREATE TRIGGER `update_bill_cassets` BEFORE UPDATE ON `bill_cassets`
                FOR EACH ROW
                BEGIN
                    IF (NEW.status = 2) THEN
                        BEGIN
                            SET NEW.date_end = UNIX_TIMESTAMP();
                            
                            INSERT INTO `bill_cassets` (`id`) VALUES (NULL);
                        END;
                    END IF;
                END;
        ';

        $this->execute($sql);
    }

    public function down()
    {
        $sql = '
            DROP TRIGGER IF EXISTS `update_bill_cassets`;
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
