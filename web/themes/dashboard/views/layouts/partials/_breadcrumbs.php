<?php

use panix\engine\widgets\Breadcrumbs;

if (isset($this->params['breadcrumbs'])) {
    echo Breadcrumbs::widget([
        'homeLink' => [
            'label' => Yii::t('yii', 'Home'),
            'url' => ['/admin']
        ],
        'scheme' => false,
        'links' => $this->params['breadcrumbs'],
        'options' => ['class' => 'breadcrumbs float-left']
    ]);
}