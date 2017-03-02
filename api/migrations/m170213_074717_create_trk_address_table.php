<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trk_address`.
 */
class m170213_074717_create_trk_address_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trk_address', [
            'id' => $this->primaryKey(),
            'id_trk' => $this->integer(),
            'address' => $this->integer(),
            'id_product' => $this->integer(),
            'status' => $this->integer(),
            'display' => $this->float(),
            'price' => $this->float(),
        ]);

        $this->createIndex('idx_trk_address_id_trk', "trk_address", "id_trk");
        $this->createIndex('idx_trk_address_id_product', "trk_address", "id_product");
        $this->createIndex('idx_trk_address_status', "trk_address", "status");

        $this->addForeignKey('fk_trk_address_id_trk', "trk_address", "id_trk", "trks", "id");
        $this->addForeignKey('fk_trk_address_id_product', "trk_address", "id_product", "products", "id");
        $this->addForeignKey('fk_trk_address_status', "trk_address", "status", "trk_status", "id");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('trk_address');
    }
}
