<?php
namespace app\modules\install\forms;
use Yii;
class License extends \yii\base\Model {

    public $license_key;

    public function rules() {
        return array(
            array('license_key', 'required'),
           // array('license_key', 'validateLicense'),
        );
    }

    public function attributeLabels() {
        return array(
            'license_key' => Yii::t('install/default', 'LICENSE_KEY'),
        );
    }

    public function getForm() {
        return new CMSForm(array(
            'showErrorSummary' => false,
            'attributes' => array('id' => __CLASS__, 'class' => 'form-horizontal'),
            'elements' => array(
                'license_key' => array('type' => 'text', 'class' => 'form-control'),
            ),
            'buttons' => array(
                'previous' => array(
                    'type' => 'submit',
                    'class' => 'btn btn-default',
                    'label' => Yii::t('install/default', 'BACK')
                ),
                'submit' => array(
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'label' => Yii::t('install/default', 'NEXT')
                )
            )
                ), $this);
    }

    public function validateLicense($attr) {
        Yii::app()->cache->flush();
        $data = LicenseCMS::run()->connected($this->$attr);
        if ($data['status'] == 'error') {
            $this->addError($attr, $data['message']);
        }
    }

    public function install() {
        Yii::app()->cache->flush();
        if ($this->hasErrors())
            return false;

        return true;
    }

}
