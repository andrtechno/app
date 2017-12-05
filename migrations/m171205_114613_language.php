<?php

/**
 * Generation migrate by CORNER CMS
 * 
 * @author CORNER CMS development team <dev@corner-cms.com>
 * 
 * Class m171205_114613_language
 */
use panix\engine\db\Migration;

class m171205_114613_language extends Migration {

    public $tableName = '{{%language}}';

    // Use up()/down() to run migration code without a transaction.
    public function up() {
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
    }

    public function down() {
        $this->dropTable($this->tableName);
    }

}