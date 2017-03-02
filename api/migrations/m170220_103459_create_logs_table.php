<?php

use yii\db\Migration;

/**
 * Handles the creation of table `logs`.
 */
class m170220_103459_create_logs_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('logs', [
            'id' => $this->primaryKey(),
            'date' => $this->integer(),
            'msg' => $this->text(),
        ]);

        $sql = '
            CREATE TRIGGER `insert_log` BEFORE INSERT ON `logs`
                FOR EACH ROW
                BEGIN
                    SET NEW.date = UNIX_TIMESTAMP();
                END;
        ';

        $this->execute($sql);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('logs');
    }
}
