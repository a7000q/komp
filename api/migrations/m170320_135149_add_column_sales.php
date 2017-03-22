<?php

use yii\db\Migration;

class m170320_135149_add_column_sales extends Migration
{
    public function up()
    {
        $this->addColumn("sales", "id_card", $this->integer()->defaultValue(0));
    }

    public function down()
    {
       $this->renameColumn("sales", "id_card");
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
