<?php

namespace app\modules\projectscalc\models;

use Yii;
use panix\engine\CMS;
use panix\engine\Html;
use app\modules\projectscalc\components\ProjectHelper;
use app\modules\projectscalc\models\OffersRedaction;

class Offers extends \panix\engine\db\ActiveRecord {

    const MODULE_ID = 'projectscalc';
    const route = '/admin/projectscalc/offers';

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
        return [
            [
                'attribute' => 'id',
                //'header'=>'name',
               // 'format' => 'raw',
                'contentOptions' => array('class' => 'text-left'),
                //'value' => '$data->gridName',
            ],
            [
                'attribute' => 'date_create',
                //'value' => 'CMS::date($data->date_create)',
            ],
            [
                'attribute' => 'date_update',
                //'value' => 'CMS::date($data->date_update)',
            ],
            'DEFAULT_CONTROL' => [
                'class' => 'panix\engine\grid\columns\ActionColumn',
                'template' => '{print}{update}{delete}',
                'buttons' => [
                    'print' => function ($url, $model, $key) {
                        return Html::a('<i class="icon-print"></i>', ['/admin/projectscalc/offer/pdf', 'id' => $model->id], [
                                    'title' => Yii::t('yii', 'VIEW'),
                                    'class' => 'btn btn-sm btn-info linkTarget',
                                    'target' => '_blank'
                        ]);
                    },
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
        return '{{%offers}}';
    }

    public function getGridName(){
        return Yii::t('projectscalc/default','OFFER_NAME',array('client'=>$this->calc->title));
    }
    /**
     * @return array validation rules for model attributes.
     */
    public function rules2() {
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
    public function relations2() {
        return array(
            'redaction' => array(self::BELONGS_TO, 'OffersRedaction', 'id'),
            'calc' => array(self::BELONGS_TO, 'ProjectsCalc', 'id'),
        );
    }
    public function getRedaction() {
        return $this->hasOne(OffersRedaction::className(), ['id' => 'redaction_id']);
    }

    public function getCalc() {
        return $this->hasMany(ProjectsCalc::className(), ['object_id' => 'id']);
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
