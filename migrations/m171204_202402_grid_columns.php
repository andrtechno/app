<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 * 
 * Class m171204_202402_grid_columns
 */

use panix\engine\db\Migration;

class m171204_202402_grid_columns extends Migration {

    public $tableName = '{{%grid_columns}}';

    /**
     * @inheritdoc
     */
    public function up() {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey()->unsigned(),
            'grid_id' => $this->string(25)->notNull(),
            'modelClass' => $this->string(255)->notNull(),
            'column_key' => $this->string(25)->notNull(),
            'ordern' => $this->integer(),
        ]);
        $this->createIndexes(['modelClass', 'column_key', 'ordern','grid_id']);
        
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropTable($this->tableName);
    }

}
