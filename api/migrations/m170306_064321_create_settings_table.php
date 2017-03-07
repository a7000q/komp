<?php

use yii\db\Migration;

/**
 * Handles the creation of table `settings`.
 */
class m170306_064321_create_settings_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('settings', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'rus_name' => $this->string(),
            'value' => $this->string(),
        ]);

        $this->insert("settings", ['name' => 'token', 'rus_name' => 'Токен']);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('settings');
    }
}
