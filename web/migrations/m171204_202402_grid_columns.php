<?php

class m171204_202402_grid_columns extends \panix\engine\db\Migration {

    public $tableName = '{{%grid_columns}}';

    /**
     * @inheritdoc
     */
    public function up() {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'modelClass' => $this->string(50)->notNull(),
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
