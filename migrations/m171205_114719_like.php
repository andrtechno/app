<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m171205_114719_like
 */

use panix\engine\db\Migration;
use panix\engine\widgets\like\models\Like;


class m171205_114719_like extends Migration
{

    public function up()
    {
        $this->createTable(Like::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->unsigned(),
            'object_id' => $this->integer()->unsigned(),
            'model' => $this->string(100)->notNull(),

        ]);

        $this->createIndex('user_id', Like::tableName(), 'user_id');
        $this->createIndex('object_id', Like::tableName(), 'object_id');


    }

    public function down()
    {
        $this->dropTable(Like::tableName());
    }

}
