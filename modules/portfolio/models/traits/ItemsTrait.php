<?php

namespace app\modules\portfolio\models\traits;

use Yii;
use app\modules\portfolio\models\search\ItemsSearch;

trait ItemsTrait {

    public function getGridColumns() {
        $columns = [];


        $columns[] = [
            'attribute' => 'image',
            'format' => 'raw',
            'contentOptions' => ['class' => 'text-center image'],
            'value' => function($model) {
        return $model->renderGridImage('50x50');
    },
        ];
        $columns[] = 'name';

        $columns[] = [
            'attribute' => 'date_create',
            'format' => 'raw',
            'filter' => \yii\jui\DatePicker::widget([
                'model' => new ItemsSearch(),
                'attribute' => 'date_create',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control']
            ]),
            'contentOptions' => ['class' => 'text-center'],
            'value' => function($model) {
        return Yii::$app->formatter->asDatetime($model->date_create, 'php:d D Y H:i:s');
    }
        ];
        $columns[] = [
            'attribute' => 'date_update',
            'format' => 'raw',
            'filter' => \yii\jui\DatePicker::widget([
                'model' => new ItemsSearch(),
                'attribute' => 'date_update',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control']
            ]),
            'contentOptions' => ['class' => 'text-center'],
            'value' => function($model) {
        return Yii::$app->formatter->asDatetime($model->date_update, 'php:d D Y H:i:s');
    }
        ];


        $columns['DEFAULT_CONTROL'] = [
            'class' => 'panix\engine\grid\columns\ActionColumn',
        ];
        $columns['DEFAULT_COLUMNS'] = [
            [
                'class' => \panix\engine\grid\sortable\Column::className(),
                'url' => ['/admin/shop/default/sortable']
            ],
            ['class' => 'panix\engine\grid\columns\CheckboxColumn'],
        ];

        return $columns;
    }

}
