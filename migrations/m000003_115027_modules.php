<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m000003_115027_modules
 */
use panix\engine\db\Migration;

class m000003_115027_modules extends Migration
{

    public $tableName = '{{%modules}}';

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(15),
            'className' => $this->string(100),
            'switch' => $this->boolean()->defaultValue(1),
            'access' => $this->smallInteger(8),
        ]);
        $this->createIndex('name', $this->tableName, 'name');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
