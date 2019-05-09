<?php
namespace app\modules\install\models\wizard\registration;

use yii\base\Model;

class ChooseLanguage extends Model
{
	public $lang;

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['lang'], 'required']
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
