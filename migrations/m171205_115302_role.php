<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m171205_115302_role
 */
use panix\engine\db\Migration;

class m171205_115302_role extends Migration
{

    public $tableName = '{{%role}}';

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'create_time' => $this->timestamp()->defaultValue(null),
            'update_time' => $this->timestamp(),
            'can_admin' => 'smallint(6) NOT NULL DEFAULT "0"'
        ]);
        $this->batchInsert($this->tableName, ['name', 'can_admin'], [
            ['Admin', 1],
            ['User', 0],
        ]);
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
