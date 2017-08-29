<?php

use yii\db\Migration;
use yii\db\Schema;

class m170823_210602_product extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%shop_product2}}', [
            'id' => Schema::TYPE_PK,
            'manufacturer_id' => Schema::TYPE_INTEGER . ' null default null',
            'category_id' => Schema::TYPE_INTEGER . ' null default null',
            'type_id' => Schema::TYPE_INTEGER . ' null default null',
            'supplier_id' => Schema::TYPE_INTEGER . ' null default null',
            'currency_id' => Schema::TYPE_INTEGER . ' null default null',
            'use_configurations' => 'tinyint(1) NOT NULL DEFAULT "0"',
            'seo_alias' => Schema::TYPE_STRING . ' NOT NULL',
            'price' => 'float(10,2) DEFAULT NULL',

                ], $tableOptions);
        
        //$this->createIndex('{{%user_auth_provider_id}}', '{{%user_auth}}', 'provider_id', false);

        // add foreign keys for data integrity
        //$this->addForeignKey('{{%user_role_id}}', '{{%user}}', 'role_id', '{{%role}}', 'id');
    }

    public function down() {
        $this->dropTable('{{%shop_product2}}');

        return false;
    }


}
