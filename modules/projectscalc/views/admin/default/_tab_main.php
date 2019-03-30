<?php

use panix\ext\tinymce\TinyMce;
use app\modules\projectscalc\components\ProjectHelper;

echo $form->field($model, 'title')->textInput(['maxlength' => 255]);
echo $form->field($model, 'type_id')->dropdownlist(ProjectHelper::siteTypeList());
echo $form->field($model, 'price_layouts')->textInput(['maxlength' => 255]);
echo $form->field($model, 'price_prototype')->textInput(['maxlength' => 255]);
echo $form->field($model, 'price_makeup')->textInput(['maxlength' => 255]);


echo $form->field($model, 'full_text')->widget(TinyMce::className(), [
    'options' => ['rows' => 6],
]);
?>