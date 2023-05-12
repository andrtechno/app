<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m000013_123013_mails_tpl
 */
use panix\engine\db\Migration;

class m000013_123013_mails_tpl extends Migration
{

    public $tableName = '{{%mails_tpl}}';

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
            'layout' => $this->string(50)->notNull(),
            'modelClass' => $this->string(),
        ]);

    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
