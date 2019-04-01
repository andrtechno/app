<?php

namespace console\migrations;

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m171205_114613_language
 */
use panix\engine\db\Migration;

class m171205_114613_language extends Migration
{

    public $tableName = '{{%language}}';

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'code' => $this->string(2)->notNull(),
            'locale' => $this->string(5)->notNull(),
            'is_default' => $this->boolean()->defaultValue(0),
            'switch' => $this->boolean()->defaultValue(1),
            'ordern' => $this->integer(),
        ], $this->tableOptions);
        $this->createIndex('switch', $this->tableName, 'switch');
        $this->createIndex('ordern', $this->tableName, 'ordern');


        $this->batchInsert($this->tableName, ['name', 'code', 'locale', 'is_default', 'switch', 'ordern'], [
            ['Русский', 'ru', 'ru-RU', 1, 1, 1],
            ['English', 'en', 'en-US', 0, 0, 0],
            ['Український', 'ua', 'uk-UA', 0, 0, 0],
            ['Deutsch', 'de', 'de', 0, 0, 0],
        ]);

    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
