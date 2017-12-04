<?php

class SettingsProjectsCalcForm extends FormSettingsModel {

    public $pagenum;

    public static function defaultSettings() {
        return array(
            'pagenum' => 10,
        );
    }

    public function getForm() {
        return new CMSForm(array(
            'attributes' => array(
                'id' => __CLASS__,
                'class' => 'form-horizontal',
            ),
            'showErrorSummary' => true,
            'elements' => array(
                'pagenum' => array('type' => 'text'),
            ),
            'buttons' => array(
                'submit' => array(
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'label' => Yii::t('app', 'SAVE')
                )
            )
                ), $this);
    }

    public function rules() {
        return array(
            array('pagenum', 'numerical', 'integerOnly' => true),
        );
    }

}
