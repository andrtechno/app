<?php

$this->widget('ext.adminList.GridView', array(
    'id' => 'seo-grid',
    'name' => $this->pageName,
    'dataProvider' => $model->search(),
    'filter' => $model,
    'autoColumns' => false,
    'columns' => array(
           array('class' => 'CheckBoxColumn'),
        'url',
        array(
            'class' => 'ButtonColumn',
            'template' => '{update}{delete}',
        ),

    ),
));
?>
