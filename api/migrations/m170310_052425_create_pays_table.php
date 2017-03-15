<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pays`.
 */
class m170310_052425_create_pays_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('pays', [
            'id' => $this->integer(),
            'name' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('pays');
    }
}
