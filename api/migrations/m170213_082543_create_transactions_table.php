<?php

use yii\db\Migration;

/**
 * Handles the creation of table `transactions`.
 */
class m170213_082543_create_transactions_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('transactions', [
            'id' => $this->primaryKey(),
            'date' => $this->integer(),
            'id_type' => $this->integer(),
            'id_trk_address' => $this->integer(),
            'status' => $this->integer(),
            'volume' => $this->float(),
            'volume_start' => $this->float(),
            'price' => $this->float(),
        ]);


        $this->createIndex("idx_transactions_id_type", "transactions", "id_type");
        $this->createIndex("idx_transactions_id_trk_address", "transactions", "id_trk_address");
        $this->createIndex("idx_transactions_status", "transactions", "status");

        $this->addForeignKey("fk_transactions_id_type", "transactions", "id_type", "transaction_type", "id");
        $this->addForeignKey("fk_transactions_id_trk_address", "transactions", "id_trk_address", "trk_address", "id");
        $this->addForeignKey("fk_transactions_status", "transactions", "status", "transaction_status", "id");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('transactions');
    }
}
