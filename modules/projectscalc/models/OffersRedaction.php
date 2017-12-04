<?php

Yii::import('mod.projectsCalc.models.OffersRedactionTranslate');

class OffersRedaction extends ActiveRecord {

    const MODULE_ID = 'projectsCalc';
    const route = '/projectsCalc/admin/offersRedaction';

    /**
     * Multilingual attrs
     */
    public $text;

    /**
     * Name of the translations model.
     */
    public $translateModelName = 'OffersRedactionTranslate';

    public function getForm() {
        Yii::import('ext.bootstrap.selectinput.SelectInput');
        Yii::app()->controller->widget('ext.tinymce.TinymceWidget');

        return new CMSForm(array(
            'attributes' => array(
                'id' => __CLASS__,
                'class' => 'form-horizontal',
            ),
            'showErrorSummary' => true,
            'elements' => array(
                'text' => array(
                    'type' => 'textarea',
                    'class' => 'editor'
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

    public function getGridColumns() {
        return array(
            array(
                'name' => 'id',
                'type' => 'raw',
                'htmlOptions' => array('class' => 'text-left'),
                'value' => '$data->getOfferName()',
            ),
            array(
                'name' => 'date_create',
                'value' => 'CMS::date($data->date_create)',
            ),
            array(
                'name' => 'date_update',
                'value' => 'CMS::date($data->date_update)',
            ),
            'DEFAULT_CONTROL' => array(
                'class' => 'ButtonColumn',
                'template' => '{update}{delete}',

            ),
            'DEFAULT_COLUMNS' => array(
                array('class' => 'CheckBoxColumn'),
            ),
        );
    }

    public function getOfferName() {
        return 'Редакция предложения №' . $this->id;
    }

    /**
     * Returns the static model of the specified AR class.
     * @return Page the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{offers_redaction}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('text', 'required'),
            array('date_create', 'date', 'format' => 'yyyy-MM-dd HH:mm:ss'),
            array('id, text, date_update, date_create', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'offer_translate' => array(self::HAS_ONE, $this->translateModelName, 'object_id'),
        );
    }

    /**
     * @return array
     */
    public function behaviors() {
        $a = array();
        $a['timezone'] = array(
            'class' => 'app.behaviors.TimezoneBehavior',
            'attributes' => array('date_create', 'date_update'),
        );
        $a['TranslateBehavior'] = array(
            'class' => 'app.behaviors.TranslateBehavior',
            'relationName' => 'offer_translate',
            'translateAttributes' => array(
                'text',
            ),
        );

        return $a;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions. Used in admin search.
     * @return ActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        $criteria = new CDbCriteria;

        $criteria->with = array('offer_translate');

        $criteria->compare('t.id', $this->id);
        $criteria->compare('translate.text', $this->text, true);
        $criteria->compare('t.date_create', $this->date_create, true);
        $criteria->compare('t.date_update', $this->date_update, true);


        return new ActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageVar' => 'page'/* ,'route'=>'/news' */)
        ));
    }

}
