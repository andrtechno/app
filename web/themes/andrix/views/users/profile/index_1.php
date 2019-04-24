

<div class="row">
    <div class="col-md-3">
        <?php $this->renderPartial('_nav'); ?>
    </div>
    <div class="col-md-9">
        <?php $this->renderPartial('_profile', array('user' => $user,'changePasswordForm'=>$changePasswordForm)); ?>
        <?php //$this->renderPartial('_changepass', array('changePasswordForm'=>$changePasswordForm)); ?>

    </div>
</div>

<?php

$this->widget('zii.widgets.jui.CJuiTabs',array(
    'tabs'=>array(

        'Профиль'=>array(
            'content'=>$this->renderPartial('_profile',array('user' => $user,'changePasswordForm'=>$changePasswordForm),true),
            'id'=>'tab2'
            ),
                'Изменить пароль'=>array(
            'content'=>$this->renderPartial('_changepass',array('user' => $user,'changePasswordForm'=>$changePasswordForm),true),
            'id'=>'tab3'
            ),
        // panel 3 contains the content rendered by a partial view
        'AjaxTab'=>array('ajax'=>$ajaxUrl),
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
    'htmlOptions'=>array(
        'class'=>'dsasad'
    )
));

?>
<script language="JavaScript">/*
    function webcam(){
        $('body').append('<div id="window-webcam"><div id="webcam" style="width:320px; height:240px;float:left"></div><div id="webcam_result"></div></div>');
        $('#window-webcam').dialog({
            modal: true,
            resizable: false,
            width:'50%',
            height:300,
            open:function(){
                Webcam.attach('#webcam');
                 Webcam.on('error', function(err) {
       $.jGrowl(err);
       $(this).append('<a href="javascript:Webcam.attach(\'#webcam\');">подключится сново</a>');
    });
       Webcam.on('live', function() {
        $.jGrowl('Камера успешно подключена и говтова к работе.');
    });
            },
            close: function (event, ui) {
                $(this).remove();
                Webcam.reset(); //завершаем работу веб-камеры.
            },
            buttons:[{
                    text:'Сделать снимок',
                    click:function(){
                        Webcam.snap( function(data_uri) {
                            $('#webcam_result').html('<img src="'+data_uri+'"/>');
                        });
                    }
                },
                {
                    text:'Сохранить и завершить работу',
                    click:function(){
                        var data_uri = $('#webcam_result img').attr('src');
                        Webcam.upload( data_uri, '/myscript.php', function(code, text) {
                            if(code==200){
                                $.jGrowl('Изображение успешно сохранено!');
                                Webcam.reset(); //завершаем работу веб-камеры.
                                $('#window-webcam').remove(); //удаляем диалоговое окно.
                            }else{
                                $.jGrowl('Ошибка '+code);
                            }
                        });
                    }
                },
                {
                    text:'Отмена',
                    click:function(){
                        $(this).dialog('close');
                    }
                }]
                        
        });
    }*/
</script>




<div id="login-form1"></div>
<?php
/*$this->widget('zii.widgets.jui.CJuiTabs', array(
    'id' => 'tabs',
    'tabs' => $tabs,
    // additional javascript options for the tabs plugin
    'options' => array(
        'collapsible' => true,
        'heightStyle' => "content",
        //'hide'=> array('effect'=> "fade", 'duration'=> 1000),
        //   'active'=>array(2),
        'beforeLoad' => 'js:function(event, ui){
            ui.panel.html("Загрузка...");
        }',
        'show' => 'js:function(event, ui){
            window.location.hash = ui.panel.id;
            //$("form").attr("action","/' . $this->route . '"+"#"+ui.panel.id);
        }'
    ),
));*/
?>



