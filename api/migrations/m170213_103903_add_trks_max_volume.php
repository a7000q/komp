<?php

use yii\db\Migration;

class m170213_103903_add_trks_max_volume extends Migration
{
    public function up()
    {
        $this->addColumn("trks", "max_volume", $this->integer());
        $this->addColumn("trks", "type", $this->text());
    }

    public function down()
    {
        $this->dropColumn("trks", "max_volume");
        $this->dropColumn("trks", "type");
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
