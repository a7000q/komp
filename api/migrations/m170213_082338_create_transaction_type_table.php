<?php

use yii\db\Migration;

/**
 * Handles the creation of table `transaction_type`.
 */
class m170213_082338_create_transaction_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('transaction_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('transaction_type');
    }
}
