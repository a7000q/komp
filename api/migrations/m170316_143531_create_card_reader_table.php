<?php

use yii\db\Migration;

/**
 * Handles the creation of table `card_reader`.
 */
class m170316_143531_create_card_reader_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('card_reader', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'port' => $this->integer(),
            'status' => $this->integer(),
            'id_electro' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('card_reader');
    }
}
