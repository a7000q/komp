<?php

use yii\db\Migration;

class m170213_100413_add_data_trk_status extends Migration
{
    public function up()
    {
        $this->insert("trk_status", ['name' => 'down']);
        $this->insert("trk_status", ['name' => 'up']);
    }

    public function down()
    {
        $this->delete("trk_status", ['name' => 'down']);
        $this->delete("trk_status", ['name' => 'up']);
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
