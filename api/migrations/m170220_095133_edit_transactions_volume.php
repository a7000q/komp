<?php

use yii\db\Migration;

class m170220_095133_edit_transactions_volume extends Migration
{
    public function up()
    {
        $this->alterColumn("transactions", "volume", $this->float()->notNull()->defaultValue(0));
    }

    public function down()
    {
        $this->alterColumn("transactions", "volume", $this->float());
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
