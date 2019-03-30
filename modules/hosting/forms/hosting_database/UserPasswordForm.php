<?php

namespace app\modules\hosting\forms\hosting_database;

use Yii;

class UserPasswordForm extends \panix\engine\base\Model {

    protected $module = 'hosting';
    public $password;

    public function rules() {
        return [
            [['password'], "required"],
        ];
    }

}
