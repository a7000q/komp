<?php

use yii\db\Migration;

class m170318_064434_add_triger_card_reader extends Migration
{
    public function up()
    {
        $sql = '
           
           CREATE TRIGGER `update_card_reader` BEFORE UPDATE ON `card_reader`
                FOR EACH ROW
                BEGIN
                    IF (OLD.status = 1 && NEW.status = 2) THEN
                        BEGIN
                            SET NEW.id_electro = 0;
                        END;
                    END IF;
                END;
        ';

        $this->execute($sql);
    }

    public function down()
    {
        $sql = '
            DROP TRIGGER IF EXISTS `update_card_reader`;
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
