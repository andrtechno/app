<?php

/**
 * Generation migrate by PIXELION CMS
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 *
 * Class m000014_183311_dynamic_form
 */
use panix\engine\db\Migration;
use panix\mod\admin\models\DynamicForm;

class m000014_183311_dynamic_form extends Migration
{


    public function init()
    {
        parent::init();
        if ($this->db->driverName === 'mysql') {
            $this->tableOptions = 'CHARACTER SET utf8mb4 ENGINE=InnoDB';
        }
    }

    public function up()
    {
        $this->createTable(DynamicForm::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(255)->notNull(),
            'count_submit'=>$this->integer()->unsigned()->defaultValue(0),
            'rules' => $this->text()->null()->defaultValue(NULL),
        ]);

    }

    public function down()
    {
        $this->dropTable(DynamicForm::tableName());
    }

}
