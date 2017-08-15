<?php

namespace app\system\modules\shop\models\forms;

use panix\engine\SettingsModel;

class SettingsForm extends SettingsModel {

    protected $category = 'shop';
    protected $module = 'shop';
    public $pagenum;

    public function rules() {
        return [
            [['pagenum'], "required"],
        ];
    }

}