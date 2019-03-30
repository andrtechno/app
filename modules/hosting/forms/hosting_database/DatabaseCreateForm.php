<?php

namespace app\modules\hosting\forms\hosting_database;

use Yii;

class DatabaseCreateForm extends \panix\engine\base\Model {

    protected $module = 'hosting';
    public $name;
    public $collation = 'utf8_general_ci';
    public $user_create = 1;

    public function rules() {
        return [
            [['name', 'collation', 'user_create'], "required"],
            ['collation', 'in', 'range' => $this->getCollectionArray()],
            [['name'], 'string', 'max' => 16 - strlen(Yii::$app->settings->get('hosting', 'account'))-1],
            [['user_create'], 'boolean'],
        ];
    }

    public function getCollectionArray() {
        return [
            'utf8_general_ci' => 'utf8_general_ci',
            'cp1251_ukrainian_ci' => 'cp1251_ukrainian_ci',
            'cp1251_general_ci' => 'cp1251_general_ci',
            'latin1_swedish_ci' => 'latin1_swedish_ci',
        ];
    }

}
