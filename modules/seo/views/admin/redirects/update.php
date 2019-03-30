<?php
Yii::app()->tpl->openWidget(array(
    'title' => $this->pageName,
));
echo $model->getForm();
Yii::app()->tpl->closeWidget();
?>





