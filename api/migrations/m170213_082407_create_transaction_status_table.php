<?php

use yii\db\Migration;

/**
 * Handles the creation of table `transaction_status`.
 */
class m170213_082407_create_transaction_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('transaction_status', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('transaction_status');
    }
}
