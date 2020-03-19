<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m000005_114613_language
 */
use panix\engine\db\Migration;
use panix\mod\admin\models\Languages;

class m000005_114613_language extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable(Languages::tableName(), [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'code' => $this->string(2)->notNull(),
            'slug' => $this->string(4)->notNull(),
            'locale' => $this->string(5)->notNull(),
            'flag_name' => $this->string(10)->null(),
            'is_default' => $this->boolean()->defaultValue(0),
            'switch' => $this->boolean()->defaultValue(1),
            'ordern' => $this->integer(),
        ], $this->tableOptions);
        $this->createIndex('switch', Languages::tableName(), 'switch');
        $this->createIndex('ordern', Languages::tableName(), 'ordern');


        $this->batchInsert(Languages::tableName(), ['name', 'code', 'slug', 'locale', 'flag_name', 'is_default', 'switch', 'ordern'], [
            ['Русский', 'ru', 'ru', 'ru-RU', 'ru.png', 1, 1, 1],
            ['English', 'en', 'ru', 'en-US', 'en.png', 0, 0, 2],
            ['Український', 'uk', 'ru', 'uk-UA', 'ua.png', 0, 0, 3],
            ['Deutsch', 'de', 'ru', 'de', 'de.png', 0, 0, 4],
        ]);

    }

    public function down()
    {
        $this->dropTable(Languages::tableName());
    }

}
