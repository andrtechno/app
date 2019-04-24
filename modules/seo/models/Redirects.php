<?php
namespace app\modules\seo\models;

use Yii;
use panix\engine\db\ActiveRecord;

class Redirects extends ActiveRecord {

    const MODULE_ID = 'seo';
    const route = '/seo/admin/default';

    public function getForm() {
        return new CMSForm(array(
            'attributes' => array(
                'id' => __CLASS__,
                'class' => 'form-horizontal',
            ),
            'elements' => array(
                'url_from' => array(
                    'type' => 'text',
                    'hint' => Yii::t('seo/default', 'REDIRECT_HINT', array('example' => '/my-old-url'))
                ),
                'url_to' => array(
                    'type' => 'text',
                    'hint' => Yii::t('seo/default', 'REDIRECT_HINT', array('example' => '/my-new-url'))
                ),
            ),
            'buttons' => array(
                'submit' => array(
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'label' => $this->isNewRecord ? Yii::t('app', 'CREATE', 0) : Yii::t('app', 'SAVE')
                )
            )
                ), $this);
    }


    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%redirects}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['url_from', 'url_to'], 'required'],
            //array('url_from', 'UniqueAttributesValidator', 'with' => 'url_from'),
            [['url_from', 'url_to'], 'string', 'max' => 255],
        ];
    }


}
