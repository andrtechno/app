
<?php


echo panix\mod\shop\components\AttributesRender::widget([
    'model' => $model,
    'list' => '_attributes_list',
    'htmlOptions' => array(
        'class' => 'attributes'
    ),
]);
?>