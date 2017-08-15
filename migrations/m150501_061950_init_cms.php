<?php

use yii\db\Schema;
use yii\db\Migration;

class m150501_061950_init_cms extends Migration {

    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // create tables. note the specific order
        $this->createTable('{{%language}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . "(100) DEFAULT NULL",
            'code' => Schema::TYPE_STRING . "(25) DEFAULT NULL",
            'locale' => Schema::TYPE_STRING . "(100) DEFAULT NULL",
            'is_default' => "tinyint(1) DEFAULT NULL",
            'flag_name' => Schema::TYPE_STRING . ' DEFAULT NULL',
                ], $tableOptions);


        $this->createTable('{{%settings}}', [
            'id' => Schema::TYPE_PK,
            'category' => Schema::TYPE_STRING . "(255) DEFAULT ''",
            'param' => Schema::TYPE_STRING . "(255) DEFAULT NULL",
            'value' => Schema::TYPE_TEXT . ' DEFAULT NULL',
                ], $tableOptions);

        $this->createIndex('param', '{{%settings}}', 'param', false);
        $this->createIndex('category', '{{%settings}}', 'category', false);
    }

    public function safeDown() {
        // drop tables in reverse order (for foreign key constraints)
        $this->dropTable('{{%language}}');
        $this->dropTable('{{%settings}}');
    }

}
