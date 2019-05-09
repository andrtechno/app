<?php

namespace app\modules\install\forms;
use Yii;
class ChooseLanguage extends \yii\base\Model {

    public $lang;

    public function rules() {
        return array(
            array('lang', 'required'),
        );
    }

    public function attributeLabels() {
        return array(
            'lang' => Yii::t('install/default', 'CHOOSELANG'),
        );
    }

    public function getForm() {
        return new CMSForm(array(
            'showErrorSummary' => true,
            'attributes' => array('id' => __CLASS__, 'class' => 'form-horizontal'),
            'elements' => array(
                'lang' => array(
                    'type' => 'radiolist',
                    'items' => self::getLangs(),
                    'layout' => '{label}<br/>{input}<br/>{error}'
                ),
            ),
            'buttons' => array(
                'submit' => array(
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'label' => Yii::t('install/default', 'NEXT')
                )
            )
                ), $this);
    }

    public static function getLangs() {
        return array(
            'ru' => 'Русский',
            'en' => 'English',
            'uk' => 'Український'
        );
    }

}
