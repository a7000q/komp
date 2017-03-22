<?php

use yii\db\Migration;

/**
 * Handles the creation of table `server_msg`.
 */
class m170320_101556_create_server_msg_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('server_msg', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'msg' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('server_msg');
    }

}
