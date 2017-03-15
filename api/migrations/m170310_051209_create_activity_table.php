<?php

use yii\db\Migration;

/**
 * Handles the creation of table `activity`.
 */
class m170310_051209_create_activity_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('activity', [
            'id' => $this->primaryKey(),
            'date' => $this->integer(),
            'id_side' => $this->integer(),
            'id_address' => $this->integer(),
            'id_pay' => $this->integer(),
            'step' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('activity');
    }
}
