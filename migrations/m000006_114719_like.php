<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m000006_114719_like
 */

use panix\engine\db\Migration;
use panix\engine\widgets\like\models\Like;


class m000006_114719_like extends Migration
{

    public function up()
    {
        $this->createTable(Like::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->unsigned(),
            'object_id' => $this->integer()->unsigned(),
            'handler_hash' => $this->string(8)->notNull(),
            'value' => $this->tinyInteger()->unsigned()->null(),
            'created_at' => $this->integer(),
        ]);

        $this->createIndex('user_id', Like::tableName(), 'user_id');
        $this->createIndex('object_id', Like::tableName(), 'object_id');
        $this->createIndex('handler_hash', Like::tableName(), 'handler_hash');

    }

    public function down()
    {
        $this->dropTable(Like::tableName());
    }

}
