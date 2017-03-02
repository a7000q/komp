<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bill_acceptor`.
 */
class m170228_135514_create_bill_acceptor_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('bill_acceptor', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'com' => $this->integer(),
            'sum' => $this->integer()->defaultValue(0),
            'status' => $this->integer()->defaultValue(1),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('bill_acceptor');
    }
}
