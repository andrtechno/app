<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m000004_202402_grid_columns
 */

use panix\engine\db\Migration;
use panix\engine\grid\GridColumns;

class m000004_202402_grid_columns extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable(GridColumns::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'grid_id' => $this->string(25)->notNull(),
            'modelClass' => $this->string(255)->notNull(),
            'column_data' => $this->text()->notNull(),
            'pageSize' => $this->smallInteger()->null(),
        ]);

        $this->createIndex('modelClass', GridColumns::tableName(), 'modelClass');
        $this->createIndex('grid_id', GridColumns::tableName(), 'grid_id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(GridColumns::tableName());
    }

}
