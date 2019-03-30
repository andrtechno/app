<?php
namespace app\modules\seo\models;
class Redirects extends \panix\engine\db\ActiveRecord {

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
     * @return string the associated database table name
     */
    public static function tableName() {
        return '{{%redirects}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('url_from, url_to', 'required'),
            array('url_from', 'UniqueAttributesValidator', 'with' => 'url_from'),
            //  array('url_from, url_to', 'length', 'max' => 255),
            array('url_from, url_to', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'url_from' => Yii::t('seo/default', 'REDIRECT_FROM'),
            'url_to' => Yii::t('seo/default', 'REDIRECT_TO'),
        );
    }


    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('url_from', $this->url_from, true);
        $criteria->compare('url_to', $this->url_to, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
