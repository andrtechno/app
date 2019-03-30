<?php

namespace app\modules\projectscalc\models;

use panix\engine\jui\DatePicker;
use Yii;
use panix\engine\CMS;
use panix\engine\Html;
use panix\engine\db\ActiveRecord;
use app\modules\projectscalc\components\ProjectHelper;
use app\modules\projectscalc\models\search\OffersSearch;

class Offers extends ActiveRecord {

    const MODULE_ID = 'projectscalc';
    const route = '/admin/projectscalc/offers';

    public function getGridColumns() {
        return [
            [
                'attribute' => 'id',
                'format' => 'raw',
                'contentOptions' => array('class' => 'text-left'),
                'value' => function($model){
                    return $model->getGridName();
                }
            ],
            [
                'attribute' => 'date_create',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => new OffersSearch(),
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
                    'model' => new OffersSearch(),
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
                'template' => '{pdf}{doc}{update}{delete}',
                'buttons' => [
                    'pdf' => function ($url, $model, $key) {
                        return Html::a('<i class="icon-print"></i>', $url, [
                                    'title' => Yii::t('yii', 'VIEW'),
                                    'class' => 'btn btn-sm btn-info linkTarget',
                                    'target' => '_blank'
                        ]);
                    },
                    'doc' => function ($url, $model, $key) {
                        return Html::a('<i class="icon-file-doc"></i>', $url, [
                            'title' => Yii::t('projectscalc/default', 'VIEW_DOC'),
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
        return '{{%offers}}';
    }

    public function getGridName(){
        return Yii::t('projectscalc/default','OFFER_NAME',['client'=>$this->calc->title]);
    }



    public function getRedaction() {
        return $this->hasOne(OffersRedaction::className(), ['id' => 'redaction_id']);
    }

    public function getCalc() {
        return $this->hasOne(ProjectsCalc::className(), ['id' => 'calc_id']);
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
            "{list}" => implode(', ', $calcs),
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
