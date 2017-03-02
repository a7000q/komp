<?php

use yii\db\Migration;

class m170213_105759_drop_trk_address_display_price extends Migration
{
    public function up()
    {
        $this->dropColumn("trk_address", "display");
        $this->dropColumn("trk_address", "price");
    }

    public function down()
    {
        echo "m170213_105759_drop_trk_address_display_price cannot be reverted.\n";

        return false;
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
