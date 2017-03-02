<?php

use yii\db\Migration;

class m170213_110445_add_column_products_price extends Migration
{
    public function up()
    {
        $this->addColumn("products", "price", $this->decimal(4, 2));
    }

    public function down()
    {
       $this->dropColumn("products", "price");
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
