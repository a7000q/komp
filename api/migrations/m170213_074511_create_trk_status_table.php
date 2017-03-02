<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trk_status`.
 */
class m170213_074511_create_trk_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trk_status', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('trk_status');
    }
}
