<?php

/**
 * Generation migrate by PIXELION CMS
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 *
 * Class m000016_202321_block
 */

use panix\engine\db\Migration;
use panix\mod\admin\models\Block;
use panix\mod\admin\models\BlockTranslate;

class m000016_202321_block extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(Block::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'switch' => $this->boolean()->defaultValue(true),
            'created_at' => $this->integer(11)->null(),
            'updated_at' => $this->integer(11)->null()
        ], $tableOptions);


        $this->createTable(BlockTranslate::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'object_id' => $this->integer()->unsigned(),
            'language_id' => $this->tinyInteger()->unsigned(),
            'name' => $this->string(255),
            'content' => $this->text()
        ], $tableOptions);


        $this->createIndex('switch', Block::tableName(), 'switch');

        $this->createIndex('object_id', BlockTranslate::tableName(), 'object_id');
        $this->createIndex('language_id', BlockTranslate::tableName(), 'language_id');

        if ($this->db->driverName != "sqlite") {
            $this->addForeignKey('{{%fk_block_translate}}', BlockTranslate::tableName(), 'object_id', Block::tableName(), 'id', "CASCADE", "NO ACTION");
        }

    }

    public function down()
    {
        if ($this->db->driverName != "sqlite") {
            $this->dropForeignKey('{{%fk_block_translate}}', BlockTranslate::tableName());
        }
        $this->dropTable(Block::tableName());
        $this->dropTable(BlockTranslate::tableName());
    }

}
