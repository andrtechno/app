<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m000010_122127_session
 */
use panix\engine\db\Migration;

class m000010_122127_session extends Migration
{

    public function up()
    {
        $this->createTable(Yii::$app->session->sessionTable, [
            'id' => \yii\db\Schema::TYPE_CHAR . '(40) NOT NULL',
            'user_id' => $this->integer()->null()->unsigned(),
            'expire' => $this->integer()->notNull(),
            'expire_start' => $this->integer()->notNull(),
            'data' => 'LONGBLOB',
            'ip' => $this->string(100),
            'user_type' => $this->string(50)->notNull(),
            'user_name' => $this->string(100)->notNull(),
            'created_at' => $this->timestamp('CURRENT_TIMESTAMP')
        ]);
        //$this->createIndex('id', $this->tableName, 'id');
        $this->addPrimaryKey('id', Yii::$app->session->sessionTable, 'id');
    }

    public function down()
    {
        $this->dropTable(Yii::$app->session->sessionTable);
    }

}
