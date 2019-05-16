<?php

class m171205_103329_agreements extends \panix\engine\db\Migration {

    public function up() {
        $this->createTable('{{%agreements}}', [
            'id' => $this->primaryKey(),
            'redaction_id' => $this->integer()->unsigned(),
            'calc_id' => $this->integer()->unsigned(),
            'price' => 'float(10,2) DEFAULT NULL',
            'course' => 'float(10,2) DEFAULT NULL',
            'customer_is' => $this->boolean()->defaultValue(0),
            'customer_name' => $this->string(255)->notNull(),
            'customer_text' => $this->text(),
            'date' => 'date NOT NULL',
            'programming_days' => $this->integer(),
            'layouts_days ' => $this->integer(),
            'date_create' => $this->timestamp()->defaultValue(null),
            'date_update' => $this->timestamp()
        ]);

        $this->createTable('{{%agreements__redaction}}', [
            'id' => $this->primaryKey(),
            'performer' => $this->string(255),
            'date_create' => $this->timestamp()->defaultValue(null),
            'date_update' => $this->timestamp()
        ]);

        $this->createTable('{{%agreements__redaction_translate}}', [
            'id' => $this->primaryKey()->unsigned(),
            'language_id' => $this->tinyInteger()->unsigned(),
            'object_id' => $this->integer()->unsigned(),
            'text' => $this->text(),
        ]);
        
        $this->createIndex('redaction_id', '{{%agreements}}', 'redaction_id');
        $this->createIndex('calc_id', '{{%agreements}}', 'calc_id');
        
        $this->createIndex('language_id', '{{%agreements__redaction_translate}}', 'language_id');
        $this->createIndex('object_id', '{{%agreements__redaction_translate}}', 'object_id');
    }

    public function down() {
        $this->dropTable('{{%agreements}}');
        $this->dropTable('{{%agreements__redaction}}');
        $this->dropTable('{{%agreements__redaction_translate}}');
    }

}
