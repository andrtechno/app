<?php

$this->widget('ext.adminList.GridView', array(
    'dataProvider' => $model->search(),
    'enableHeader' => true,
    'name' => $this->pageName,
    'filter' => $model,
    'autoColumns' => false,
    'columns' => array(
        'url_from',
        'url_to',
        array(
            'class' => 'ButtonColumn',
            'template' => '{switch}{update}{delete}',
        ),
    )
));

