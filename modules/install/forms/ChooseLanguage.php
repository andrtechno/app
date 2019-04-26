<?php

namespace app\modules\install\forms;
use panix\engine\base\Model;
use Yii;
class ChooseLanguage extends Model {

    public $lang;

    public function rules() {
        return [
            ['lang', 'required'],
        ];
    }

    public function attributeLabels() {
        return [
            'lang' => Yii::t('install/default', 'CHOOSELANG'),
        ];
    }


    public static function getLangs() {
        return [
            'ru' => 'Русский',
            'en' => 'English',
            'uk' => 'Український'
        ];
    }

}
