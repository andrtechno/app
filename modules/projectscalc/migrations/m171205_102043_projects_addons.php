<?php

class m171205_102043_projects_addons extends \panix\engine\db\Migration {

    public $tableName = '{{%projects_addons}}';

    /**
     * @inheritdoc
     */
    public function up() {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'price' => 'float(10,2) DEFAULT NULL',

        ]);
        $this->createIndexes(['project_id']);
        
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropTable($this->tableName);
    }

}
