<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trk_sides`.
 */
class m170302_084417_create_trk_sides_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trk_sides', [
            'id' => $this->primaryKey(),
            'id_trk' => $this->integer(),
            'name' => $this->string(),
        ]);

        $this->createIndex("idx-trk_sides-id_trk", "trk_sides", "id_trk");
        $this->addForeignKey("fk-trk_sides_id_trk", "trk_sides", "id_trk", "trks", "id");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('trk_sides');
    }
}
