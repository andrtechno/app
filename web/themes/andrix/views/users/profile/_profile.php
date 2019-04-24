
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'user-profile-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal')
        ));
// echo CHtml::image($user->avatarPath, $user->username, array("width" => "50",'id'=>'user_avatar'))

if ($user->hasErrors())
    echo Html::errorSummary($user, '<i class="fa fa-warning fa-3x"></i>', null, array('class' => 'errorSummary alert alert-danger'));

//Yii::app()->tpl->alert('danger', CHtml::errorSummary($user));
?>

<div class="form-group">
    <div class="col-sm-4"><?= $form->labelEx($user, 'username', array('class' => 'control-label')); ?></div>
    <div class="col-sm-8">
        <?= $form->textField($user, 'username', array('class' => 'form-control')); ?>
        <?= $form->error($user, 'username'); ?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-4"><?= $form->labelEx($user, 'phone', array('class' => 'control-label')); ?></div>
    <div class="col-sm-8">
        <?= $form->textField($user, 'phone', array('class' => 'form-control')); ?>
        <?= $form->error($user, 'phone'); ?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-4"><?= $form->labelEx($user, 'address', array('class' => 'control-label')); ?></div>
    <div class="col-sm-8">
        <?= $form->textField($user, 'address', array('class' => 'form-control')); ?>
        <?= $form->error($user, 'address'); ?>
    </div>
</div>
<?php if (Yii::app()->hasModule('delivery')) { ?>
    <div class="form-group">
        <div class="col-sm-4"><?= $form->labelEx($user, 'subscribe', array('class' => 'control-label')); ?></div>
        <div class="col-sm-8"><?= $form->checkBox($user, 'subscribe', array('class' => '')); ?></div>
    </div>
<?php } ?>
<div class="form-group">
    <div class="col-sm-4"><?= $form->labelEx($user, 'gender', array('class' => 'control-label')); ?></div>
    <div class="col-sm-8">
        <?= $form->dropDownList($user, 'gender', $user->getSelectGender(), array('class' => 'form-control')); ?>

        <?= $form->error($user, 'gender'); ?>
    </div>
</div>
<?php
if (Yii::app()->settings->get('users', 'change_theme')) {
    $themesNames = Yii::app()->themeManager->themeNames;

    $themes = array_combine($themesNames, $themesNames);
    if (count($themesNames) > 1) {
        unset($themes[Yii::app()->settings->get('core', 'theme')]);
    }
    ?>
    <div class="form-group">
        <div class="col-sm-4"><?= $form->label($user, 'theme', array('class' => 'control-label')); ?></div>
        <div class="col-sm-8"><?= $form->dropDownList($user, 'theme', $themes, array('class' => 'form-control', 'empty' => 'По умолчание')); ?></div>
    </div>
<?php } ?>
<?php if (Yii::app()->settings->get('users', 'upload_avatar')) { ?>
    <div class="form-group">
        <div class="col-sm-4"><?= $form->labelEx($user, 'avatar', array('class' => 'control-label')); ?></div>
        <div class="col-sm-8">
            <?php
            $this->widget('ext.bootstrap.fileinput.Fileinput', array(
                'model' => $user,
                'attribute' => 'avatar',
                'options' => array(
                    'showUpload' => false,
                    'showPreview' => true,
                    'overwriteInitial' => true,
                    'showRemove'=>false,
                    'maxFileSize' => 1500,
                    'showClose' => false,
                    'showCaption' => false,
                    'browseLabel' => '',
                    //'removeLabel' => '',
                    'browseIcon' => '<i class="flaticon-folder-open"></i>',
                    //'removeIcon' => '<i class="flaticon-delete"></i>',
                    'elErrorContainer' => '#kv-avatar-errors',
                    'msgErrorClass' => 'alert alert-danger',
                    'defaultPreviewContent' => '<img src="' . $user->avatarUrl() . '" alt="">',
                    'layoutTemplates' => "{main2: '{preview}  {remove} {browse}'}",
                    'allowedFileExtensions' => array("jpg", "png", "gif"),
                    'initialPreviewConfig' => array(
                        'width' => '120px',
                    ),
                    'previewSettings' => array(
                        'image' => array('width' => "auto", 'height' => "auto"),
                    )
                ),
            ))
            ?>

        </div>
    </div>

<?php } ?>
<div class="text-center">
    <?= Html::submitButton(Yii::t('app', 'SAVE'), array('class' => 'btn btn-primary')); ?>
</div>

<?php $this->endWidget(); ?>

<div class="col-md-4">


    <div class="btn-group" style="display: none">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            Загрузить <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu" style="display: none">
            <li><a href="#"><?= Yii::t('UsersModule.default', 'LOAD_AVA_PC') ?></a></li>
            <li><a href="#"><?= Yii::t('UsersModule.default', 'LOAD_AVA_GAL') ?></a></li>
            <li><?php $this->widget('mod.users.widgets.webcam.Webcam'); ?></li>
        </ul>
    </div>
</div>




<script>
    $(function () {
        $(document).on('change', '.btn-file :file', function () {
            var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });
        $('.btn-file :file').on('fileselect', function (event, numFiles, label) {
            console.log(numFiles);
            console.log(label);
        });
    });
</script>









<script type="text/javascript">

    function get_user_avatars(coll) {

        $('body').append('<div id="dialog"></div>');
        $('#dialog').dialog({
            modal: true,
            resizable: false,
            width: '50%',
            open: function () {
                var that = this;
                $.ajax({
                    type: "POST",
                    data: {collection: coll},
                    url: '/users/profile/getAvatars',
                    success: function (result) {
                        $(that).html(result);
                    }
                });

            },
            close: function (event, ui) {
                $(this).remove();
            },
            buttons: [{
                    text: common.message.save,
                    click: function () {

                        var that = this;

                        var image = $('#selected_avatar').val();
                        $.ajax({
                            type: "POST",
                            data: {img: image},
                            url: '/users/profile/saveAvatar',
                            success: function (result) {
                                console.log(image);
                                $('#user_avatar').attr('src', image);
                                $.jGrowl('Аватар успешно установлен.', {themeState: 'none'});
                                $(that).dialog('close');
                            }
                        });

                    }
                }, {
                    text: common.message.cancel,
                    click: function () {
                        $(this).dialog('close');
                    }
                }]

        });
    }
</script>