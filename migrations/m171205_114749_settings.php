<?php

/**
 * Generation migrate by CORNER CMS
 * 
 * @author CORNER CMS development team <dev@corner-cms.com>
 * 
 * Class m171205_114749_settings
 */

use panix\engine\db\Migration;

class m171205_114749_settings extends Migration {

    public $tableName = '{{%settings}}';

    public function up() {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'category' => $this->string(255)->notNull(),
            'param' => $this->string(5),
            'value' => $this->text(),
        ]);
        $this->createIndex('param', $this->tableName, 'param');
        $this->createIndex('category', $this->tableName, 'category');
    }

    public function down() {
        $this->dropTable($this->tableName);
    }

}