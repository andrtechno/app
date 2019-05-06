<?php

use yii\db\Migration;

class m170908_125100_portfolio extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%portfolio_item}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(255)->notNull(),
            'user_id' => $this->integer(),
            'date_create' => $this->timestamp()->defaultValue(null),
            'date_update' => $this->timestamp(),
            'views' => $this->integer()->defaultValue(0),
            'ordern' => $this->integer(),
            'switch' => $this->boolean()->defaultValue(1),
                ], $tableOptions);


        $this->createTable('{{%portfolio_item_translate}}', [
            'id' => $this->primaryKey(),
            'object_id' => $this->integer(),
            'language_id' => $this->string(2),
            'name' => $this->string(255),
            'text' => $this->text(),
                ], $tableOptions);


        $this->createIndex('switch', '{{%portfolio_item}}', 'switch', 0);
        $this->createIndex('ordern', '{{%portfolio_item}}', 'ordern', 0);
        $this->createIndex('user_id', '{{%portfolio_item}}', 'user_id', 0);
        $this->createIndex('slug', '{{%portfolio_item}}', 'slug', 0);

        $this->createIndex('object_id', '{{%portfolio_item_translate}}', 'object_id', 0);
        $this->createIndex('language_id', '{{%portfolio_item_translate}}', 'language_id', 0);


        $columns = ['slug', 'user_id', 'ordern', 'date_create'];
        $this->batchInsert('{{%portfolio_item}}', $columns, [
            ['about', 1, 1, date('Y-m-d H:i:s')],
            ['mypage', 1, 2, date('Y-m-d H:i:s')],
        ]);


        $columns = ['object_id', 'language_id', 'name', 'text'];
        $this->batchInsert('{{%portfolio_item_translate}}', $columns, [
            [1, Yii::$app->language, 'О компании', ''],
            [2, Yii::$app->language, 'Тест', ''],
        ]);
    }

    public function down() {

        $this->dropTable('{{%portfolio_item}}');
        $this->dropTable('{{%portfolio_item_translate}}');
    }

}
