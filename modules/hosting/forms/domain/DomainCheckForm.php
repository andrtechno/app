<?php

namespace app\modules\hosting\forms\domain;

use Yii;

class DomainCheckForm extends \panix\engine\base\Model {

    protected $module = 'hosting';
    public $name;
    public $domain;

    public function rules() {
        return [
            [['name', 'domain'], "required"],
        ];
    }

    public function validateCountDomain($attribute) {
        $array = explode(',', $this->$attribute);
        $count = count($array);
        if ($count > 10) {
            $this->addError($attribute, "Максимальное количество проверки доменов 10 шт. Вы указали {$count}");
        }
    }

}
