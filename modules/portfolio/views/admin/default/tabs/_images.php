<?php

use panix\engine\Html;
?>
<?= \panix\ext\fancybox\Fancybox::widget(['target' => 'a.attachment-zoom']); ?>

<?= $form->field($model, 'file[]')->fileInput(['multiple' => true]); ?>

<?php
$images = $model->getImages();

?>


<?php
$script = <<< JS
$('.attachment-delete').on('click', function(e) {
        var id = $(this).attr('data-id');
    $.ajax({
       url: $(this).attr('href'),
       type:'POST',
       data: {id: id},
       success: function(data) {
                                            if(data.status == "success"){
                                                common.notify(data.message,"success");
                                                $("#AttachmentsImages"+id).hide().remove();
                                                common.removeLoader();
                                            }
       }
    });
        return false;
});
        
        
        
        $('.copper').on('click', function(e) {
      //  var id = $(this).attr('data-id');
    $.ajax({
       url: $(this).attr('href'),
       type:'POST',
      // data: {id: id},
       success: function(data) {
        $('#test').html(data);
       }
    });
        return false;
});
JS;
$this->registerJs($script); //$position
?>

<div class="col-sm-12">
    <div class="attachments">
        <?php
        foreach ($images as $img) {
            $coverClass = ($img->isMain) ? 'bg-success' : '';
            ?>


            <div class="attachment-item-big thumbnail <?= $coverClass ?>" id="AttachmentsImages<?= $img->id ?>">
                <?php
                if ($img->isMain) {
                    echo '<i class="icon-check iscover" style=""></i>';
                }
                ?>

                <?= Html::a(Html::img($img->getUrl('300x')), $img->getUrl()); ?>


                <div class="caption">

                    <p><span class="label label-default" title="sdasda">asdsad</span></p>
                    <p>dsasad</p>


                    <div class="btn-group btn-group-sm">
                        <?= Html::a(Html::icon('resize'), $img->getUrl(), array('class' => 'btn btn-default attachment-zoom', 'data-fancybox' => 'gallery')); ?>
                        <?= Html::a(Html::icon('settings'), ['/images/edit-crop', 'id' => $img->id], array('class' => 'btn btn-default copper')); ?>
                        <?= Html::a(Html::icon('delete'), ['/images/default/delete', 'id' => $img->id], array('class' => 'btn btn-danger attachment-delete', 'data-id' => $img->id)); ?>


                    </div>
                </div>

                <div class="input-group">
                    <span class="input-group-addon">
                        <?=
                        Html::radio('AttachmentsMainId', $img->isMain, array(
                            'value' => $img->id,
                            'class' => 'check',
                            'data-toggle' => "tooltip",
                            'title' => Yii::t('app', 'IS_MAIN'),
                            'id' => 'main_image_' . $img->id
                        ));
                        ?>
                    </span>
                    <?= Html::input('text', 'attachment_image_titles[' . $img->id . ']', $img->name, array('class' => 'form-control', 'placeholder' => $img->getAttributeLabel('name'))); ?>
                </div>


            </div>
        <?php } ?>
    </div>
</div>
