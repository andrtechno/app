<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m000002_202400_settings
 */

use panix\engine\db\Migration;

class m000015_202201_utm extends Migration
{
    public $tableName = '{{%utm}}';

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey()->unsigned(),
            'utm_source' => $this->string(100)->null(),
            'utm_medium' => $this->string(100)->null(),
            'utm_term' => $this->string(100)->null(),
            'utm_campaign' => $this->string(100)->null(),
            'utm_content' => $this->text()->null(),
            'created_at' => $this->integer()->null(),
        ]);
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
