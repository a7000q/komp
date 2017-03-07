<?php

use yii\db\Migration;

class m170306_083832_add_column_ids extends Migration
{
    public function up()
    {
        $this->addColumn("products", "ids", $this->integer());
    }

    public function down()
    {
        $this->dropColumn("products", "ids");
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
