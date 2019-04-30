<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m171205_122127_session
 */
use panix\engine\db\Migration;

class m171205_122127_session extends Migration
{

    public $tableName = '{{%session}}';

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => \yii\db\Schema::TYPE_CHAR . '(40) not null',
            'user_id' => $this->integer()->null()->unsigned(),
            'expire' => $this->integer()->notNull(),
            'expire_start' => $this->integer()->notNull(),
            'data' => 'BLOB',
            'ip' => $this->string(100),
            'user_type' =>  $this->string(50)->notNull(),
            'user_name' =>  $this->string(100)->notNull()
        ]);
        $this->createIndex('user_id', $this->tableName, 'user_id');
        $this->createIndex('expire', $this->tableName, 'expire');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

}
