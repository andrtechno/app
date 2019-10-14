<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m000007_114919_notifications
 */
use panix\engine\db\Migration;
use panix\mod\admin\models\Notifications;

class m000007_114919_notifications extends Migration
{

    public function up()
    {
        $this->tableName = Notifications::tableName();
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'type' => "ENUM('default', 'info', 'success', 'danger', 'warning')",
            'text' => $this->text(),
            'url' => $this->string(255),
            'sound' => $this->string(100)->defaultValue(NULL),
            'status' => $this->boolean()->defaultValue(0)->notNull(),
            'user_id_read' => $this->integer(),
            'created_at' => $this->integer(11)->null(),
        ]);
        $this->createIndex('is_read', $this->tableName, 'is_read');
    }

    public function down()
    {
        $this->tableName = Notifications::tableName();
        $this->dropTable($this->tableName);
    }

}
