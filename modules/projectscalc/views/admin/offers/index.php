<?php

$this->widget('ext.adminList.GridView', array(
    'dataProvider' => $model->search(),
    'enableHeader'=>true,
    'name'=>$this->pageName,
    'filter' => $model
));
