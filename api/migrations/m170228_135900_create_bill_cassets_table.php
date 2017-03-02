<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bill_cassets`.
 */
class m170228_135900_create_bill_cassets_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('bill_cassets', [
            'id' => $this->primaryKey(),
            'date_start' => $this->integer(),
            'date_end' => $this->integer(),
            'sum' => $this->integer(),
            'count' => $this->integer(),
            'status' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('bill_cassets');
    }
}
