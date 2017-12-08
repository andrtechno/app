<?php

/**
 * Generation migrate by CORNER CMS
 * 
 * @author CORNER CMS development team <dev@corner-cms.com>
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
            'id' => $this->primaryKey(),
            'modelClass' => $this->string(255)->notNull(),
            'column_key' => $this->string(25)->notNull(),
            'ordern' => $this->integer(),
        ]);
        $this->createIndexes(['modelClass', 'column_key', 'ordern']);
        
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropTable($this->tableName);
    }

}
