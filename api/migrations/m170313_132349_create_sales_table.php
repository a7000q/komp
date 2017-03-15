<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sales`.
 */
class m170313_132349_create_sales_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('sales', [
            'id' => $this->primaryKey(),
            'date' => $this->integer(),
            'id_trk' => $this->integer(),
            'name_trk' => $this->string(),
            'id_trk_address' => $this->integer(),
            'name_trk_address' => $this->string(),
            'id_product' => $this->integer(),
            'name_product' => $this->string(),
            'price' => $this->float(),
            'volume' => $this->float(),
            'sum' => $this->float(),
            'id_pay' => $this->integer(),
            'status' => $this->integer(),
            'upload' => $this->integer()->defaultValue(1)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('sales');
    }
}
