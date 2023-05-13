<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m000011_150526_tags
 */
use panix\engine\db\Migration;
use panix\engine\taggable\Tag;
use panix\engine\taggable\TagAssign;

class m000011_150526_tags extends Migration
{

    public function up()
    {
        $this->createTable(Tag::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()->notNull(),
            'frequency' => $this->integer()->defaultValue(0)->notNull()
        ]);

        $this->createTable(TagAssign::tableName(), [
            'post_id' => $this->integer()->unsigned()->notNull(),
            'tag_id' => $this->integer()->unsigned()->notNull(),
        ]);

        $this->addPrimaryKey('{{%tag_assign}}', TagAssign::tableName(), ['post_id', 'tag_id']);
    }

    public function down()
    {
        $this->dropTable(Tag::tableName());
        $this->dropTable(TagAssign::tableName());
    }

}
