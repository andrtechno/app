<?php

//Yii::import('mod.projectsCalc.models.AgreementsTranslate');

class Offers extends ActiveRecord {

    const MODULE_ID = 'projectsCalc';
    const route = '/projectsCalc/admin/offers';

    public function getForm() {
        Yii::import('ext.bootstrap.selectinput.SelectInput');
        Yii::app()->controller->widget('ext.tinymce.TinymceWidget');
        Yii::import('app.jui.JuiDatePicker');
        return new CMSForm(array(
            'attributes' => array(
                'id' => __CLASS__,
                'class' => 'form-horizontal',
            ),
            'showErrorSummary' => true,
            'elements' => array(
                'redacton_id' => array(
                    'type' => 'SelectInput',
                    'data' => Html::listData(AgreementsRedaction::model()->findAll(), 'id', 'id'),
                    'htmlOptions' => array('empty' => '&mdash; Не привязывать &mdash;'),
                    'visible' => true
                ),
                'calc_id' => array(
                    'type' => 'SelectInput',
                    'data' => Html::listData(ProjectsCalc::model()->findAll(), 'id', 'title'),
                    'htmlOptions' => array('empty' => '&mdash; Не привязывать &mdash;'),
                    'visible' => true
                ),
            /* 'customer_firstname' => array('type' => 'text'),
              'customer_lastname' => array('type' => 'text'),
              'customer_middlename' => array('type' => 'text'),
              'customer_passport' => array('type' => 'text'),
              'customer_address' => array('type' => 'text'),
              'customer_phone' => array('type' => 'text'),
              'date' => array('type' => 'JuiDatePicker'),
              'programming_days' => array('type' => 'text'),
              'makets_days' => array('type' => 'text'), */
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
                //'name' => 'id',
                'header'=>'name',
                'type' => 'raw',
                'htmlOptions' => array('class' => 'text-left'),
                'value' => '$data->gridName',
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
                'template' => '{print}{update}{delete}',
                'buttons' => array(
                    'print' => array(
                        'icon' => 'icon-print',
                        'label' => Yii::t('ProjectsCalcModule.default', 'OFFER_PRINT'),
                        //'visible'=>'Yii::app()->user->openAccess(array("Cart.Default.*", "Cart.Default.Print"))',
                        'url' => 'Yii::app()->createUrl("/admin/projectsCalc/offers/print", array("id"=>$data->id))',
                    ),
                ),
            ),
        );
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
        return '{{offers}}';
    }

    public function getGridName(){
        return Yii::t('ProjectsCalcModule.default','OFFER_NAME',array('{client}'=>$this->calc->title));
    }
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('redacton_id, calc_id', 'required'),
            array('date_create', 'date', 'format' => 'yyyy-MM-dd HH:mm:ss'),
            //array('date', 'date', 'format' => 'yyyy-MM-dd'),
            //array('makets_days, programming_days', 'numerical', 'integerOnly' => true),
            array('id, redacton_id, date_update, date_create', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'redaction' => array(self::BELONGS_TO, 'OffersRedaction', 'id'),
            'calc' => array(self::BELONGS_TO, 'ProjectsCalc', 'id'),
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
        /* $a['TranslateBehavior'] = array(
          'class' => 'app.behaviors.TranslateBehavior',
          'translateAttributes' => array(
          'text',
          ),
          );
         */
        return $a;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions. Used in admin search.
     * @return ActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        $criteria = new CDbCriteria;

        // $criteria->with = array('translate');

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.redacton_id', $this->redacton_id);
        // $criteria->compare('translate.text', $this->text, true);
        $criteria->compare('t.date_create', $this->date_create, true);
        $criteria->compare('t.date_update', $this->date_update, true);


        return new ActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageVar' => 'page'/* ,'route'=>'/news' */)
        ));
    }

    public function renderOffer() {
        $calcs = array();
        //$bank = ProjectHelper::privatBank();

        if ($this->calc) {
            foreach ($this->calc->modules as $calc) {
                $calcs[] = $calc->title;
            }
        }
        $types = ProjectHelper::siteTypeLists();
        $replace = array(
            "{offer_id}" => $this->id,
            "{client}" => $this->calc->title,
            "{list}" => implode('<br/>', $calcs),
            "{price_layouts}" => ProjectHelper::priceFormat(round($this->calc->price_layouts * $this->calc->course, 0)),
            "{price_makeup}" => ProjectHelper::priceFormat(round($this->calc->price_makeup * $this->calc->course, 0)),
            "{price_prototype}" => ProjectHelper::priceFormat(round($this->calc->price_prototype * $this->calc->course, 0)),
            "{total_price_uah}" => ProjectHelper::priceFormat(round($this->calc->total_price * $this->calc->course, 0)),
            "{total_price_usd}" => ProjectHelper::priceFormat($this->calc->total_price),
            "{type}" => $types[$this->calc->type_id],
        );
        return CMS::textReplace($this->redaction->text, $replace);
    }

}
