<?php

namespace app\modules\projectscalc\models;

use Yii;
use panix\engine\behaviors\TranslateBehavior;
use app\modules\projectscalc\components\ProjectHelper;
use app\modules\projectscalc\models\translate\ProjectsCalcTranslate;
use app\modules\projectscalc\models\ModulesList;
use app\modules\projectscalc\models\ProjectsAddons;

class ProjectsCalc extends \panix\engine\db\ActiveRecord {

    const MODULE_ID = 'projectscalc';
    const route = '/admin/projectscalc/default';

    public function setAddons() {
        $dontDelete = [];
        if (Yii::$app->request->post('addons')) {
            foreach (Yii::$app->request->post('addons') as $key => $option) {
                $record = ProjectsAddons::findOne($key);

                if (!$record) {
                    $record = new ProjectsAddons();
                    $record->project_id = $this->id;
                    $record->name = $option['name'];
                    $record->price = $option['price'];
                } else {
                    $record->name = $option['name'];
                    $record->price = $option['price'];
                }
                $record->save(false);
                $dontDelete[] = $key;
                array_push($dontDelete, $record->id);
            }
        }

        if (sizeof($dontDelete)) {
            $optionsToDelete = ProjectsAddons::deleteAll(
                            ['AND', 'project_id=:id', ['NOT IN', 'id', $dontDelete]], [':id' => $this->id]);
        } else {
            $optionsToDelete = ProjectsAddons::deleteAll('project_id=:id', [':id' => $this->id]);
        }
        //if (!empty($optionsToDelete)) {
        //    foreach ($optionsToDelete as $o)
        //        $o->delete();
        // }
    }

    public function setCategories(array $categories) {
        $dontDelete = array();
        foreach ($categories as $c) {
            $count = ProjectsModules::find()
                    ->where(['mod_id' => $c, 'project_id' => $this->id])
                    ->count();
            if ($count == 0) {
                $record = new ProjectsModules;
                $record->mod_id = (int) $c;
                $record->project_id = $this->id;
                $record->save(false);
            }
            $dontDelete[] = $c;
        }

        // Delete not used relations
        if (sizeof($dontDelete) > 0) {
            ProjectsModules::deleteAll(
                    ['AND', 'project_id=:id', ['NOT IN', 'mod_id', $dontDelete]], [':id' => $this->id]);
        } else {
            // Delete all relations
            ProjectsModules::deleteAll('project_id=:id', [':id' => $this->id]);
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
        foreach ($this->addons as $addon) {
            $total += $addon->price;
        }
        $this->total_price = $total;
        return parent::beforeSave($insert);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return [
            [['title', 'type_id', 'price_makeup', 'price_layouts', 'price_prototype'], 'required'],
            [['full_text'], 'string'],
            [['price_makeup', 'price_layouts', 'price_prototype', 'type_id'], 'integer'],
        ];
    }

    /**
     * @return array relational rules.
     */
    public function relations2() {
        return array(
            //'translate' => array(self::HAS_ONE, $this->translateModelName, 'object_id'),
            'mods' => array(self::HAS_MANY, 'ProjectsModulesTranslate', 'project_id'),
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
                //'modulesList' => array(self::HAS_MANY, 'ProjectsModules', 'project_id'),
                // 'modules' => array(self::HAS_MANY, 'ModulesList', array('mod_id' => 'id'), 'through' => 'modulesList'),
        );
    }

    public function getModulesList() {
        return $this->hasMany(ProjectsModules::className(), ['project_id' => 'id']);
    }

    public function getModules() {
        return $this->hasMany(ModulesList::className(), ['id' => 'mod_id'])->via('modulesList');
    }

    public function getAddons() {
        return $this->hasMany(ProjectsAddons::className(), ['project_id' => 'id']);
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
