<?php

class m171205_103329_agreements extends \panix\engine\db\Migration {

    public function up() {
        $this->createTable('{{%offers}}', [
            'id' => $this->primaryKey(),
            'redaction_id' => $this->integer(),
            'calc_id' => $this->integer(),
            'date_create' => $this->timestamp()->defaultValue(null),
            'date_update' => $this->timestamp()
        ]);

        $this->createTable('{{%offers_redaction}}', [
            'id' => $this->primaryKey(),
            'date_create' => $this->timestamp()->defaultValue(null),
            'date_update' => $this->timestamp()
        ]);

        $this->createTable('{{%offers_redaction_translate}}', [
            'id' => $this->primaryKey(),
            'language_id' => $this->string(2),
            'object_id' => $this->integer(),
            'text' => $this->text(),
        ]);

        
        $this->createIndex('redaction_id', '{{%agreements}}', 'redaction_id');
        $this->createIndex('calc_id', '{{%agreements}}', 'calc_id');
        
        $this->createIndex('language_id', '{{%offers_redaction_translate}}', 'language_id');
        $this->createIndex('object_id', '{{%offers_redaction_translate}}', 'object_id');
    }

    public function down() {
        $this->dropTable('{{%offers}}');
        $this->dropTable('{{%offers_redaction}}');
        $this->dropTable('{{%offers_redaction_translate}}');
    }

}
