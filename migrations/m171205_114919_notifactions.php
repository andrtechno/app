<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 * 
 * Class m171205_114919_notifactions
 */
use panix\engine\db\Migration;

class m171205_114919_notifactions extends Migration {

    public $tableName = '{{%notifactions}}';

    public function up() {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'type' => "ENUM('default', 'info', 'success', 'danger', 'warning')",
            'text' => $this->text(),
            'url' => $this->string(255),
            'is_read' => $this->boolean()->defaultValue(0),
            'user_id_read' => $this->integer(),
            'date_create' => $this->timestamp()->defaultValue(null),
        ]);
        $this->createIndex('is_read', $this->tableName, 'is_read');
    }

    public function down() {
        $this->dropTable($this->tableName);
    }

}
