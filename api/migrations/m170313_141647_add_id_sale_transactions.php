<?php

use yii\db\Migration;

class m170313_141647_add_id_sale_transactions extends Migration
{
    public function up()
    {
        $this->addColumn("transactions", "id_sale", $this->integer());
    }

    public function down()
    {
        $this->dropColumn("transactions", "id_sale");
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
