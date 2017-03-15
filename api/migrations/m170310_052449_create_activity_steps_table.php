<?php

use yii\db\Migration;

/**
 * Handles the creation of table `activity_steps`.
 */
class m170310_052449_create_activity_steps_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('activity_steps', [
            'id' => $this->integer(),
            'name' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('activity_steps');
    }
}
