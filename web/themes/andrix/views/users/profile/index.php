
<?php

$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs' => $tabs, 
    'options' => array(
        'collapsible' => true,
        "activate" => 'js:function(event, ui){
             window.location.hash = ui.newTab.find("a").attr("href");
             $(document).scrollTop(0);
             }'
    ),
    'htmlOptions' => array(
        'class' => 'dsasad'
    )
));
?>









