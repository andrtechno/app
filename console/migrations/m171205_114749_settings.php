<?php

namespace console\migrations;

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m171205_114749_settings
 */

use panix\engine\db\Migration;

class m171205_114749_settings extends Migration
{

    public $tableName = '{{%settings}}';

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'category' => $this->string(255)->notNull(),
            'param' => $this->string(5),
            'value' => $this->text(),
        ]);
        $this->createIndex('param', $this->tableName, 'param');
        $this->createIndex('category', $this->tableName, 'category');



        $this->batchInsert($this->tableName, ['category', 'param', 'value'], [
            ['app', 'email', 'dev@pixelion.com.ua'],
            ['app', 'pagenum', 20],
            ['app', 'sitename', 'Pixelion'],
            ['app', 'theme', 'basic'],
            ['app', 'backup_limit', 10],

        ]);

    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
