<?php

use yii\db\Schema;
use yii\db\Migration;

class m150501_061950_init_cms extends Migration {

    private $tableOptions = null;

    public function up() {
        if ($this->db->driverName === 'mysql') {
            $this->tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->_language();
        $this->_settings();
        $this->_notifactions();
        $this->_modules();
        $this->_session_user();
    }

    public function down() {
        $this->dropTable('{{%language}}');
        $this->dropTable('{{%settings}}');
        $this->dropTable('{{%notifactions}}');
        $this->dropTable('{{%modules}}');
        $this->dropTable('{{%session_user}}');
        
    }

    private function _language($tableName = '{{%language}}') {
        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'code' => $this->string(2)->notNull(),
            'locale' => $this->string(5)->notNull(),
            'is_default' => $this->boolean()->defaultValue(0),
            'switch' => $this->boolean()->defaultValue(1),
            'ordern' => $this->integer(),
                ], $this->tableOptions);
        $this->createIndex('switch', $tableName, 'switch', false);
        $this->createIndex('ordern', $tableName, 'ordern', false);
    }

    private function _settings($tableName = '{{%settings}}') {
        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'category' => $this->string(255)->notNull(),
            'param' => $this->string(5),
            'value' => $this->text(),
                ], $this->tableOptions);

        $this->createIndex('param', $tableName, 'param', false);
        $this->createIndex('category', $tableName, 'category', false);
    }

    private function _notifactions($tableName = '{{%notifactions}}') {
        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'type' => "ENUM('default', 'info', 'success', 'danger', 'warning')",
            'text' => $this->text(),
            'url' => $this->string(255),
            'is_read' => $this->boolean()->defaultValue(0),
            'user_id_read' => $this->integer(),
            'date_create' => $this->timestamp()->defaultValue(null),
                ], $this->tableOptions);

        $this->createIndex('is_read', $tableName, 'is_read', false);
    }

    private function _modules($tableName = '{{%modules}}') {
        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(15),
            'className' => $this->string(100),
            'switch' => $this->boolean()->defaultValue(1),
            'access' => $this->smallInteger(8),
                ], $this->tableOptions);

        $this->createIndex('name', $tableName, 'name', false);
    }
    
    
    private function _session_user($tableName = '{{%session_user}}') {
        $this->createTable($tableName, [
            'id' => $this->primaryKey(),
            'ip' => $this->string(15),
            'expire' => $this->integer(1),
            'user_id' => $this->integer(),
            'data'=>'LONGBLOB'
                ], $this->tableOptions);

        $this->createIndex('user_id', $tableName, 'user_id', false);
        $this->createIndex('expire', $tableName, 'expire', false);
    }

}
