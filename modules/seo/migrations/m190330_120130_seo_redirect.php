<?php

namespace app\modules\seo\migrations;

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m190330_120130_seo_redirect
 */

use panix\engine\db\Migration;
use app\modules\seo\models\Redirects;

class m190330_120130_seo_redirect extends Migration
{

    public function up()
    {
        $this->createTable(Redirects::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'url_from' => $this->string(255)->notNull(),
            'url_to' => $this->string(255)->notNull(),
            'switch' => $this->boolean()->defaultValue(1),
        ], $this->tableOptions);
        $this->createIndex('switch', Redirects::tableName(), 'switch');
    }

    public function down()
    {
        $this->dropTable(Redirects::tableName());
        return false;
    }

}
