<?php

/**
 * Generation migrate by PIXELION CMS
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 *
 * Class m000016_202422_timeline
 */

use panix\engine\db\Migration;
use panix\mod\admin\models\Timeline;


class m000016_202422_timeline extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(Timeline::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->null(),
            'action' => $this->string(50)->null(),
            'text' => $this->string(255)->null(),
            'created_at' => $this->integer()->null(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable(Timeline::tableName());
    }

}
