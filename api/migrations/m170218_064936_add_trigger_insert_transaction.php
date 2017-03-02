<?php

use yii\db\Migration;

class m170218_064936_add_trigger_insert_transaction extends Migration
{
    public function up()
    {
        $sql = '
           
           CREATE TRIGGER `insert_transaction` BEFORE INSERT ON `transactions`
                FOR EACH ROW
                BEGIN
                    SET NEW.date = UNIX_TIMESTAMP();
                    
                    IF NEW.id_type = 1 THEN
                        BEGIN
                            SET @id_product := (SELECT `id_product` FROM `trk_address` WHERE `id` = new.id_trk_address);
                            SET @price := (SELECT `price` FROM `products` WHERE `id` = @id_product);
                            SET NEW.price = @price;
                        END;
                    END IF;
                        
                END;
        ';

        $this->execute($sql);
    }

    public function down()
    {
        $sql = '
            DROP TRIGGER IF EXISTS `insert_transaction`;
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
