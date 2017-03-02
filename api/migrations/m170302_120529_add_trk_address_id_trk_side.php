<?php

use yii\db\Migration;

class m170302_120529_add_trk_address_id_trk_side extends Migration
{
    public function up()
    {
        $this->addColumn("trk_address", "id_trk_side", $this->integer());
        $this->createIndex("idx-trk_address-id_trk_side", "trk_address", "id_trk_side");
        $this->addForeignKey("fk-trk_address-id_trk_side", "trk_address", "id_trk_side", "trk_sides", "id");
    }

    public function down()
    {
        $this->dropColumn("trk_address", "id_trk_side");
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
