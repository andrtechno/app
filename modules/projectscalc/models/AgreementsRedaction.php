<?php

namespace app\modules\projectscalc\models;

use Yii;
use panix\engine\behaviors\TranslateBehavior;
use app\modules\projectscalc\models\translate\AgreementsRedactionTranslate;

class AgreementsRedaction extends \panix\engine\db\ActiveRecord {

    const MODULE_ID = 'projectscalc';
    const route = '/admin/projectscalc/agreementsredaction';

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
                'performer' => array(
                    'type' => 'text',
                ),
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
        return [
            [
                'name' => 'id',
                'type' => 'raw',
                'htmlOptions' => array('class' => 'text-left'),
                'value' => '$data->getAgreementName()',
            ],
            [
                'name' => 'date_create',
                'value' => 'CMS::date($data->date_create)',
            ],
            [
                'name' => 'date_update',
                'value' => 'CMS::date($data->date_update)',
            ],
            'DEFAULT_CONTROL' => [
                'class' => 'panix\engine\grid\columns\ActionColumn',
            ],
            'DEFAULT_COLUMNS' => [
                ['class' => 'panix\engine\grid\columns\CheckboxColumn'],
            ],
        ];
    }

    public function getAgreementName() {
        return 'Редакция договора №' . $this->id;
    }

    public function getTranslations() {
        return $this->hasMany(AgreementsRedactionTranslate::className(), ['object_id' => 'id']);
    }

    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return '{{%agreements_redaction}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return [
            [['text', 'performer'], 'string'],
            [['text', 'performer'], 'required'],
        ];
    }

    public function transactions() {
        return [
            self::SCENARIO_DEFAULT => self::OP_INSERT | self::OP_UPDATE,
        ];
    }

    public function behaviors() {
        return \yii\helpers\ArrayHelper::merge([
                    'translate' => [
                        'class' => TranslateBehavior::className(),
                        'translationAttributes' => [
                            'text'
                        ]
                    ],
                        ], parent::behaviors());
    }

}
