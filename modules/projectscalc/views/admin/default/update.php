<?php
Yii::app()->tpl->openWidget(array(
    'title' => $this->pageName,
));
echo $form->tabs();
Yii::app()->tpl->closeWidget();

?>





