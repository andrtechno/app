<?php

namespace app\modules\projectscalc\models;

use Yii;
use yii\bootstrap\Html;
use panix\engine\behaviors\TranslateBehavior;
use app\modules\projectscalc\models\translate\ModulesListTranslate;

class ModulesList extends \panix\engine\db\ActiveRecord {

    const MODULE_ID = 'projectscalc';
    const route = '/admin/projectscalc/modules';

    public function getForm() {
        Yii::app()->controller->widget('ext.tinymce.TinymceWidget');
        Yii::import('ext.bootstrap.selectinput.SelectInput');
        return new CMSForm(array(
            'attributes' => array(
                'id' => __CLASS__,
                'class' => 'form-horizontal',
            ),
            'showErrorSummary' => true,
            'elements' => array(
                'title' => array(
                    'type' => 'text',
                ),
                'type_id' => array(
                    'type' => 'SelectInput',
                    'data' => self::getTypeList()
                ),
                'documentation_id' => array(
                    'type' => 'SelectInput',
                    'data' => Documentation::flatTree(),
                    'htmlOptions' => array('empty' => '---')
                // 'data' => Html::listData(Documentation::model()->excludeRoot()->findAll(), 'id', 'name')
                ),
                'price' => array(
                    'type' => 'text',
                ),
                'full_text' => array(
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
        return [
            'title' => [
                'attribute' => 'title',
                'format' => 'raw',
                'contentOptions' => array('class' => 'text-left'),
            ],
            'price' => [
                // 'class' => 'EditableColumn',
                'attribute' => 'price',
                'format' => 'raw',
                'contentOptions' => array('class' => 'text-center'),
            //'value' => '$data->price',
            ],
            'type_id' => [
                'attribute' => 'type_id',
                'format' => 'raw',
                'contentOptions' => array('class' => 'text-center'),
            'filter' => self::getTypeList(),
            // 'value' => '($data->type_id==1) ? Yii::t("app", "Модуль") : Yii::t("app", "Дополнение")'
            ],
            'DEFAULT_CONTROL' => [
                'class' => 'panix\engine\grid\columns\ActionColumn',
                'template' => '{print}{update}{delete}',
                'buttons' => [
                    'print' => function ($url, $model, $key) {
                        return Html::a('<i class="icon-print"></i>', ['/admin/projectscalc/agreements/pdf', 'id' => $model->id], [
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
        return '{{%projects_calc_modules}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules2() {
        return array(
            array('title, full_text', 'type', 'type' => 'string'),
            array('title', 'length', 'min' => 3, 'max' => 140),
            array('title, price, type_id', 'required'),
            array('documentation_id', 'numerical', 'integerOnly' => true),
            array('id, type_id, title, full_text, documentation_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations2() {
        return array(
            'translate' => array(self::HAS_ONE, $this->translateModelName, 'object_id'),
        );
    }

    public function getTranslations() {
        return $this->hasMany(ModulesListTranslate::className(), ['object_id' => 'id']);
    }

    public function behaviors() {
        return \yii\helpers\ArrayHelper::merge([
                    'translate' => [
                        'class' => TranslateBehavior::className(),
                        'translationAttributes' => [
                            'title',
                            'full_text'
                        ]
                    ],
                        ], parent::behaviors());
    }

    public static function getTypeList() {
        return array(
            1 => 'Модуль',
            2 => 'Дополнение',
        );
    }

}
