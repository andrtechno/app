<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m171205_114749_settings
 */

use panix\engine\db\Migration;
use panix\mod\admin\models\SettingsForm;

class m171205_114749_settings extends Migration
{

    public function up()
    {
        $this->createTable(SettingsForm::$tableName, [
            'id' => $this->primaryKey(),
            'category' => $this->string(255)->notNull(),
            'param' => $this->string(5),
            'value' => $this->text(),
        ]);
        $this->createIndex('param', $this->tableName, 'param');
        $this->createIndex('category', $this->tableName, 'category');
        $settings = [];
        foreach (SettingsForm::defaultSettings() as $key => $value) {
            $settings[] = [SettingsForm::$category, $key, $value];
        }

        $this->batchInsert(SettingsForm::$tableName, ['category', 'param', 'value'], $settings);

    }

    public function down()
    {
        $this->dropTable(SettingsForm::$tableName);
    }

}
