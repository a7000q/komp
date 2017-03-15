<?php

use yii\db\Migration;

class m170310_052535_add_record_activity extends Migration
{
    public function safeUp()
    {
        $this->insert("pays", ['name' => 'Наличные', 'id' => 1]);
        $this->insert("pays", ['name' => 'Топливная карта', 'id' => 2]);

        $this->insert("activity_steps", ['name' => 'Выберите колонку', 'id' => 1]);
        $this->insert("activity_steps", ['name' => 'Выберите топливо', 'id' => 2]);
        $this->insert("activity_steps", ['name' => 'Выберите вид оплаты', 'id' => 3]);
        $this->insert("activity_steps", ['name' => 'Внесите деньги', 'id' => 4]);
        $this->insert("activity_steps", ['name' => "Поднесите вашу <br> топливную карту <br>к считывателю", 'id' => 5]);
        $this->insert("activity_steps", ['name' => 'Наберите желаемый объем заправки', 'id' => 6]);
        $this->insert("activity_steps", ['name' => 'Счастливого пути!', 'id' => 7]);
        $this->insert("activity_steps", ['name' => 'Терминал временно не работает!', 'id' => 8]);

    }

    public function safeDown()
    {
        $this->delete("pays", ['name' => 'Наличные']);
        $this->delete("pays", ['name' => 'Топливная карта']);

        $this->delete("activity_steps", ['name' => 'Выберите колонку']);
        $this->delete("activity_steps", ['name' => 'Выберите топливо']);
        $this->delete("activity_steps", ['name' => 'Выберите вид оплаты']);
        $this->delete("activity_steps", ['name' => 'Внесите деньги']);
        $this->delete("activity_steps", ['name' => "Поднесите вашу <br> топливную карту <br>к считывателю"]);
        $this->delete("activity_steps", ['name' => 'Наберите желаемый объем заправки']);
        $this->delete("activity_steps", ['name' => 'Счастливого пути!']);
        $this->delete("activity_steps", ['name' => 'Терминал временно не работает!']);
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
