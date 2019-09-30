<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m000012_120026_chat
 */
use panix\engine\db\Migration;

class m000012_120026_chat extends Migration
{

    public $tableName = '{{%chat}}';

    public function init()
    {
        parent::init();
        if ($this->db->driverName === 'mysql') {
            $this->tableOptions = 'CHARACTER SET utf8mb4 ENGINE=InnoDB';
        }
    }

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->unsigned(),
            'message' => $this->text(),
            'date_update' => $this->timestamp()->defaultValue(null)
        ]);
        $this->createIndex('user_id', $this->tableName, 'user_id');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
