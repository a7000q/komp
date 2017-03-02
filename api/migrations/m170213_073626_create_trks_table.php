<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trks`.
 */
class m170213_073626_create_trks_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trks', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'port' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('trks');
    }
}
