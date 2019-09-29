<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m000008_115127_session_user
 */
use panix\engine\db\Migration;

class m000008_115127_session_user extends Migration
{

    public $tableName = '{{%session_user}}';

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'ip' => $this->string(15),
            'expire' => $this->integer(1),
            'user_id' => $this->integer(),
            'data' => 'LONGBLOB'
        ]);
        $this->createIndex('user_id', $this->tableName, 'user_id');
        $this->createIndex('expire', $this->tableName, 'expire');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
