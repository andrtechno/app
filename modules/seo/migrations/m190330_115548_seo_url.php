<?php
namespace app\modules\seo\migrations;
/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m190330_115548_seo_url
 */

use panix\engine\db\Migration;
use app\modules\seo\models\SeoUrl;

class m190330_115548_seo_url extends Migration {

    // Use up()/down() to run migration code without a transaction.
    public function up() {
        $this->createTable(SeoUrl::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'url' => $this->string(255)->notNull(),
            'title' => $this->string(150)->null(),
            'description' => $this->text()->null(),
            'h1' => $this->string(255)->null(),
            'text' => $this->text()->null(),

        ], $this->tableOptions);
        $this->createIndex('url', SeoUrl::tableName(), 'url');
    }

    public function down() {
        echo "m190330_115548_seo_url cannot be reverted.\n";
        $this->dropTable(SeoUrl::tableName());
        return false;
    }

}
