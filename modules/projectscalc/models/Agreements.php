<?php

namespace app\modules\projectscalc\models;

use Yii;
use panix\engine\Html;
use app\modules\projectscalc\components\ProjectHelper;

class Agreements extends \panix\engine\db\ActiveRecord {

    const MODULE_ID = 'projectscalc';
    const route = '/projectscalc/admin/agreements';

    // public static function find() {
    //    return new AgreementsQuery(get_called_class());
    // }
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
                'redaction_id' => array(
                    'type' => 'SelectInput',
                    'data' => Html::listData(AgreementsRedaction::model()->findAll(), 'id', 'id'),
                    'htmlOptions' => array('empty' => '&mdash; Выбор &mdash;'),
                ),
                'calc_id' => array(
                    'type' => 'SelectInput',
                    'data' => Html::listData(ProjectsCalc::model()->findAll(), 'id', 'title'),
                    'htmlOptions' => array('empty' => '&mdash; Выбор &mdash;'),
                ),
                'customer_is' => array(
                    'type' => 'SelectInput',
                    'data' => array(0 => 'Физическое лицо', 1 => 'Юридическое лицо'),
                    'htmlOptions' => array('empty' => '&mdash; Выбор &mdash;'),
                ),
                'customer_name' => array('type' => 'text'),
                'customer_text' => array('type' => 'textarea', 'class' => 'editor'),
                'customer_firstname' => array('type' => 'text'),
                'customer_lastname' => array('type' => 'text'),
                'customer_middlename' => array('type' => 'text'),
                'customer_passport' => array('type' => 'text'),
                'customer_address' => array('type' => 'text'),
                'customer_phone' => array('type' => 'text'),
                'date' => array(
                    'type' => 'JuiDatePicker',
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd'
                    )
                ),
                'programming_days' => array('type' => 'text'),
                'layouts_days' => array('type' => 'text'),
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

    //

    public function getGridName() {
        return Yii::t('projectscalc/default', 'AGREEMENTS_NAME', array(
                    '{client}' => $this->customer_name
        ));
    }

    public function beforeSave($insert) {
        $total = 0;
        $bank = ProjectHelper::privatBank();
        if ($bank['UAH']) {
            $this->course = $bank['UAH'];
        }
        if ($this->calc) {
            if ($this->calc->price_layouts > 0)
                $total += $this->calc->price_layouts;
            if ($this->calc->price_makeup > 0)
                $total += $this->calc->price_makeup;
            if ($this->calc->price_prototype > 0)
                $total += $this->calc->price_prototype;
            $total += $this->calc->total_price;
        }
        $this->price = $total;
        return parent::beforeSave($insert);
    }

    public function getGridColumns() {
        return [
            [
                'attribute' => 'id',
                'header' => 'name',
                'format' => 'raw',
                'contentOptions' => array('class' => 'text-left'),
                //'value' => '$data->gridName',
            ],
            'date_create'=>[
                'attribute' => 'date_create',
                //'value' => 'CMS::date($data->date_create)',
            ],
            'date_update'=>[
                'attribute' => 'date_update',
                //'value' => 'CMS::date($data->date_update)',
            ],
            'DEFAULT_CONTROL' => [
                'class' => 'panix\engine\grid\columns\ActionColumn',
                'template' => '{print}{pdf}{update}{delete}',
                'buttons' => [
                    'print' => function ($url, $model, $key) {
                        return Html::a('<i class="icon-print"></i>', ['/admin/projectscalc/agreements/pdf', 'id' => $model->id], [
                                    'title' => Yii::t('yii', 'VIEW'),
                                    'class' => 'btn btn-sm btn-info linkTarget',
                                    'target' => '_blank'
                        ]);
                    },
                    'pdf' => function ($url, $model, $key) {
                        return Html::a('<i class="icon-file-doc"></i>', ['/admin/projectscalc/agreements/doc', 'id' => $model->id], [
                                    'title' => Yii::t('yii', 'VIEW'),
                                    'class' => 'btn btn-sm btn-info linkTarget',
                                    'target' => '_blank'
                        ]);
                    }
                ]
            ],
            'DEFAULT_COLUMNS' => [
                ['class' => 'panix\engine\grid\columns\CheckboxColumn'],
            ],
        ];
    }

    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return '{{%agreements}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules2() {
        return array(
            //array('redaction_id, date, customer_firstname, customer_lastname, customer_middlename, customer_passport, customer_address, customer_phone, programming_days, layouts_days, calc_id, customer_text, customer_is', 'required'),
            //array('customer_text, customer_name', 'type', 'type' => 'string'),
            array('redaction_id, date, programming_days, layouts_days, calc_id, customer_is', 'required'),
            array('date_create', 'date', 'format' => 'yyyy-MM-dd HH:mm:ss'),
            array('date', 'date', 'format' => 'yyyy-MM-dd'),
            array('layouts_days, programming_days, customer_is', 'numerical', 'integerOnly' => true),
            array('price', 'numerical'),
        );
    }

    public function rules() {
        return [
            [['customer_name', 'customer_text'], 'string'],
            [['programming_days', 'layouts_days'], 'integer'],
            [['customer_name', 'customer_text', 'layouts_days', 'programming_days'], 'required'],
        ];
    }

    public function getRedaction() {
        return $this->hasOne(AgreementsRedaction::className(), ['id' => 'redaction_id']);
    }

    public function getCalc() {
        return $this->hasMany(ProjectsCalc::className(), ['object_id' => 'id']);
    }

    /**
     * @return array relational rules.
     */
    public function relations2() {
        return array(
            'redaction' => array(self::BELONGS_TO, 'AgreementsRedaction', 'redaction_id'),
            'calc' => array(self::BELONGS_TO, 'ProjectsCalc', 'id'),
        );
    }

    /**
     * @return array
     */
    public function behaviors2() {
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

    public function renderAgreement() {
        $bank = ProjectHelper::privatBank();
        if ($this->date) {
            $date = date('d', strtotime($this->date)) . ' ' . Yii::t('app', date('F', strtotime($this->date)), 4) . ' ' . date('Y', strtotime($this->date));
        } else {
            $date = '"___"_________ ' . date('Y', strtotime($this->date_create));
        }
        $replace = array(
            "{agreement_id}" => $this->id,
            "{current_year}" => date('Y', strtotime($this->date_create)),
            "{performer}" => $this->redaction->performer, //Исполнитель
            "{customer_fullname}" => $this->customer_name, //Отчество Заказчика
            "{customer_text}" => $this->customer_text, //Отчество Заказчика
            //"{customer_firstname}" => $this->customer_firstname, //Имя Заказчика
            //"{customer_lastname}" => $this->customer_lastname, //Фамилия Заказчика
            // "{customer_middlename}" => $this->customer_middlename, //Отчество Заказчика
            //"{customer_passport}" => $this->customer_passport, //Номер паспорта Заказчика
            //"{customer_address}" => $this->customer_address, //Адрес Заказчика
            //"{customer_phone}" => $this->customer_phone, //Телефон Заказчика
            //"{customer_middlename_cut}" => mb_substr($this->customer_middlename, 0, 1),
            //"{customer_firstname_cut}" => mb_substr($this->customer_firstname, 0, 1),
            "{layouts_days}" => $this->layouts_days,
            "{programming_days}" => $this->programming_days,
            "{date}" => $date,
            //"{price}" => round($this->price * $bank['UAH'], 0) . ' грн.',
            //"{price_text}" => ProjectHelper::num2str(round($this->price * $bank['UAH'], 0))
            "{price}" => ProjectHelper::priceFormat(round($this->price * $bank['UAH'], -2)) . ' грн.',
            "{price_text}" => ProjectHelper::num2str(round($this->price * $bank['UAH'], -2)),
            "{price_original}" => ProjectHelper::priceFormat(round($this->price * $bank['UAH'], 0)) . ' грн.',
            "{price_original_text}" => ProjectHelper::num2str(round($this->price * $bank['UAH'], 0))
        );


        return \panix\engine\CMS::textReplace($this->redaction->text, $replace);
    }

}