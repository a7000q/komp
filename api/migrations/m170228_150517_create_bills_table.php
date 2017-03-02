<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bills`.
 */
class m170228_150517_create_bills_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('bills', [
            'id' => $this->primaryKey(),
            'date' => $this->integer(),
            'value' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('bills');
    }
}
