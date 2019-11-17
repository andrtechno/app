
<?php

echo \panix\engine\jui\DatePicker::widget([
    'name' => 'from_date',
    'value' => 'dsa',
    //'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',
]);
?>
<div class="spinner-my">
    <?php
    /* echo \yii\jui\Spinner::widget([
         'name' => 'asddsa',
         'attribute' => 'country',
         'clientOptions' => ['step' => 2],
         'options' => ['class' => 'test']
     ]);*/
    ?>
</div>

<?php
 echo \yii\jui\Spinner::widget([
     'name' => 'asddsa',
     'attribute' => 'country',
     'clientOptions' => ['step' => 2],
     'options' => ['class' => 'test']
 ]);
?>

<?php
echo \yii\jui\Slider::widget([
    'clientOptions' => [
        'min' => 1,
        'max' => 10,
    ],
]);
?>
<div style="height: 150px">
<?php
echo \yii\jui\Slider::widget([
    'clientOptions' => [
        'min' => 1,
        'max' => 10,
        'orientation'=>'vertical'
    ],
]);
?>
</div>
<?php
/*
\yii\jui\Dialog::begin([
    'clientOptions' => [
        'modal' => true,
    ],
]);

echo 'Dialog contents here...';

\yii\jui\Dialog::end();
