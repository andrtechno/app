<?php
/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m000009_154133_desktop
 */

use panix\engine\db\Migration;
use panix\mod\admin\models\Desktop;
use panix\mod\admin\models\DesktopWidgets;

class m000009_154133_desktop extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable(Desktop::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->unsigned()->null(),
            'name' => $this->string(100)->null(),
            'addons' => $this->tinyInteger(1)->defaultValue(1),
            'columns' => $this->tinyInteger(3),
            'private' => $this->tinyInteger(1)->defaultValue(0),
            'created_at' => $this->timestamp()->defaultValue(null),
            'updated_at' => $this->timestamp()->defaultValue(null),
            'ordern' => $this->integer()->unsigned(),
        ]);

        $this->createTable(DesktopWidgets::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'desktop_id' => $this->integer()->unsigned()->notNull(),
            'widget' => $this->string(100)->notNull(),
            'col' => $this->tinyInteger(1)->defaultValue(1),
            'title' => $this->string(255)->notNull(),
        ]);

        $this->createIndex('user_id', Desktop::tableName(), 'user_id');
        $this->createIndex('desktop_id', DesktopWidgets::tableName(), 'desktop_id');
    }

    public function down()
    {
        $this->dropTable(Desktop::tableName());
        $this->dropTable(DesktopWidgets::tableName());
    }

}
