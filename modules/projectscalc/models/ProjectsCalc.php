<?php

namespace app\modules\projectscalc\models;

use app\modules\projectscalc\components\ProjectHelper;
use panix\engine\behaviors\TranslateBehavior;
use app\modules\projectscalc\models\translate\ProjectsCalcTranslate;

class ProjectsCalc extends \panix\engine\db\ActiveRecord {

    const MODULE_ID = 'projectscalc';
    const route = '/admin/projectscalc/default';

    public function setCategories(array $categories) {
        $dontDelete = array();


        foreach ($categories as $c) {
            $count = ProjectsModules::model()->countByAttributes(array(
                'mod_id' => $c,
                'project_id' => $this->id,
            ));

            if ($count == 0) {
                $record = new ProjectsModules;
                $record->mod_id = (int) $c;
                $record->project_id = $this->id;
                $record->save(false, false, false);
            }

            $dontDelete[] = $c;
        }


        // Delete not used relations
        if (sizeof($dontDelete) > 0) {
            $cr = new CDbCriteria;
            $cr->addNotInCondition('mod_id', $dontDelete);

            ProjectsModules::model()->deleteAllByAttributes(array(
                'project_id' => $this->id,
                    ), $cr);
        } else {
            // Delete all relations
            ProjectsModules::model()->deleteAllByAttributes(array(
                'project_id' => $this->id,
            ));
        }
    }

    public function getForm() {
        Yii::import('ext.bootstrap.selectinput.SelectInput');
        Yii::app()->controller->widget('ext.tinymce.TinymceWidget');

        return array(
            'attributes' => array(
                'id' => __CLASS__,
                'class' => 'form-horizontal',
            ),
            'showErrorSummary' => true,
            'elements' => array(
                'content' => array(
                    'type' => 'form',
                    'title' => self::t('TAB_CONTENT'),
                    'elements' => array(
                        'title' => array('type' => 'text'),
                        'type_id' => array(
                            'type' => 'SelectInput',
                            'data' => ProjectHelper::siteTypeList()
                        ),
                        'price_makeup' => array('type' => 'text'),
                        'price_prototype' => array('type' => 'text'),
                        'price_layouts' => array('type' => 'text'),
                        'full_text' => array(
                            'type' => 'textarea',
                            'class' => 'editor'
                        ),
                    ),
                ),
            ),
            'buttons' => array(
                'submit' => array(
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'label' => $this->isNewRecord ? Yii::t('app', 'CREATE', 0) : Yii::t('app', 'SAVE')
                )
            )
        );
    }

    public function getGridColumns() {
        return [
            [
                'attribute' => 'title',
                //'type' => 'raw',
                'contentOptions' => array('class' => 'text-left'),
            // 'value' => '$data->title',
            ],
            [
                'attribute' => 'total_price',
                // 'type' => 'html',
                'contentOptions' => array('class' => 'text-center'),
            // 'value' => '$data->total_price',
            ],
            [
                'attribute' => 'user_id',
                //'type' => 'raw',
                //'value' => 'CMS::userLink($data->user)',
                'contentOptions' => array('class' => 'text-center')
            ],
            [
                'attribute' => 'date_create',
                'format' => 'raw',
                'filter' => \yii\jui\DatePicker::widget([
                    'model' => new ProjectsCalc(),
                    'attribute' => 'date_create',
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => ['class' => 'form-control']
                ]),
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    return Yii::$app->formatter->asDatetime($model->date_create, 'php:d D Y H:i:s');
                }
            ],
            [
                'attribute' => 'date_update',
            //'value' => 'CMS::date($data->date_update)',
            ],
            'DEFAULT_CONTROL' => [
                'class' => 'panix\engine\grid\columns\ActionColumn',
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
        return '{{%projects_calc}}';
    }

    public function beforeSave($insert) {
        $total = 0;
        $bank = ProjectHelper::privatBank();
        if ($this->price_layouts > 0)
            $total += $this->price_layouts;
        if ($this->price_makeup > 0)
            $total += $this->price_makeup;
        if ($this->price_prototype > 0)
            $total += $this->price_prototype;

        if ($bank['UAH']) {
            $this->course = $bank['UAH'];
        }

        foreach ($this->modules as $obj) {

            $total += $obj->price;
        }
        $this->total_price = $total;
        return parent::beforeSave($insert);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules2() {
        return array(
            array('full_text, total_price', 'type', 'type' => 'string'),
            array('title, full_text', 'length', 'min' => 3),
            array('title, type_id', 'required'),
            array('date_create, date_update', 'date', 'format' => 'yyyy-MM-dd HH:mm:ss'),
            array('price_makeup, price_layouts, price_prototype', 'numerical'),
            array('title', 'length', 'max' => 140),
            array('id, user_id, title, full_text, date_update, date_create', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations2() {
        return array(
            'translate' => array(self::HAS_ONE, $this->translateModelName, 'object_id'),
            'mods' => array(self::HAS_MANY, 'ProjectsModulesTranslate', 'project_id'),
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'modulesList' => array(self::HAS_MANY, 'ProjectsModules', 'project_id'),
            'modules' => array(self::HAS_MANY, 'ModulesList', array('mod_id' => 'id'), 'through' => 'modulesList'),
        );
    }

    public function transactions() {
        return [
            self::SCENARIO_DEFAULT => self::OP_INSERT | self::OP_UPDATE,
        ];
    }

    public function getTranslations() {
        return $this->hasMany(ProjectsCalcTranslate::className(), ['object_id' => 'id']);
    }

    public function behaviors() {
        return \yii\helpers\ArrayHelper::merge([
                    'translate' => [
                        'class' => TranslateBehavior::className(),
                        'translationAttributes' => [
                            'title',
                            'full_text',
                        ]
                    ],
                        ], parent::behaviors());
    }

}
