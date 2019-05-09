<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Registration Wizard Complete';

//echo $event->sender->menu->run();

echo Html::beginTag('div', ['class' => 'section']);
echo Html::tag('h2', 'Profile');
echo DetailView::widget([
    'model' => $data['license'][0],
    'attributes' => [
        'license_key',

    ]
]);
echo Html::endTag('div');

echo Html::beginTag('div', ['class' => 'section']);
echo Html::tag('h2', 'Address');
echo DetailView::widget([
    'model' => $data['db'][0],
    'attributes' => [
        'db_prefix',

    ]
]);
echo Html::endTag('div');


echo Html::a('Choose Another Demo', '/wizard');
