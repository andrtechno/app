<?php

namespace app\modules\projectscalc\models;


use Yii;
use yii\helpers\ArrayHelper;
use panix\engine\behaviors\TranslateBehavior;
use app\modules\projectscalc\models\translate\AgreementsRedactionTranslate;
use app\modules\projectscalc\models\search\AgreementsRedactionSearch;
use panix\engine\jui\DatePicker;

class AgreementsRedaction extends \panix\engine\db\ActiveRecord
{

    const MODULE_ID = 'projectscalc';
    const route = '/admin/projectscalc/agreementsredaction';

    public function getGridColumns()
    {
        return [
            [
                'attribute' => 'id',
                'format' => 'raw',
                'contentOptions' => array('class' => 'text-left'),
                'value' => function ($model) {
                    return $model->getAgreementName();
                }
            ],
            [
                'attribute' => 'date_create',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => new AgreementsRedactionSearch(),
                    'attribute' => 'date_create',
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => ['class' => 'form-control']
                ]),
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return Yii::$app->formatter->asDatetime($model->date_create, 'php:d D Y H:i:s');
                }
            ],
            [
                'attribute' => 'date_update',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => new AgreementsRedactionSearch(),
                    'attribute' => 'date_update',
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => ['class' => 'form-control']
                ]),
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return Yii::$app->formatter->asDatetime($model->date_update, 'php:d D Y H:i:s');
                }
            ],
            'DEFAULT_CONTROL' => [
                'class' => 'panix\engine\grid\columns\ActionColumn',
            ],
            'DEFAULT_COLUMNS' => [
                ['class' => 'panix\engine\grid\columns\CheckboxColumn'],
            ],
        ];
    }

    public function getAgreementName()
    {
        return 'Редакция договора №' . $this->id;
    }

    public function getTranslations()
    {
        return $this->hasMany(AgreementsRedactionTranslate::className(), ['object_id' => 'id']);
    }

    /**
     * @return string the associated database table name
     */
    public static function tableName()
    {
        return '{{%agreements__redaction}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return [
            [['text', 'performer', 'performer_text'], 'string'],
            [['text', 'performer', 'performer_text'], 'required'],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_INSERT | self::OP_UPDATE,
        ];
    }

    public function behaviors()
    {
        return ArrayHelper::merge([
            'translate' => [
                'class' => TranslateBehavior::className(),
                'translationAttributes' => [
                    'text'
                ]
            ],
        ], parent::behaviors());
    }

}
