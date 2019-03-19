
<?php
if (Yii::app()->request->isAjaxRequest) {
    $cs = Yii::app()->getClientScript();
    //      $cs->registerCoreScript('jquery');
    $cs->scriptMap = array(
        //  'jquery.yiigridview.js'=>false,
        'jquery.js' => false,
        'jquery.min.js' => false,
            // 'editgridcolums.js'=>false,
            //      'jquery.ba-bbq.js'=>false,
            // 'jquery.ba-bbq.min.js'=>false,
            // 'jquery.history.js'=>false,
            //'jquery.jgrowl.js'=>false,
    );
}

$contact = Yii::app()->settings->get('contacts');
?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <?php if ($contact['phone']) { ?>
            <div><?= Yii::t('ContactsModule.ConfigContactForm', 'PHONE') ?>: <?= $contact['phone'] ?></div>
        <?php } ?>
            <?php if ($contact['form_emails']) { ?>
            <div> <?= $contact['form_emails'] ?></div>
        <?php } ?>
        <?php if ($contact['skype']) { ?>
            <div><?= Yii::t('ContactsModule.ConfigContactForm', 'SKYPE') ?>: <?= $contact['skype'] ?></div>
        <?php } ?>
        <?php if ($contact['address']) { ?>
            <div><?= Yii::t('ContactsModule.ConfigContactForm', 'ADDRESS') ?>: <?= $contact['address'] ?></div>
        <?php } ?>
        <hr/>
    </div>

    <div class="col-sm-12">
        <div class="text-center">
            <h4><?= Yii::t('ContactsModule.default', 'FB_FORM_NAME') ?></h4>
        </div>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'contact_form',
            'enableAjaxValidation' => false, // Disabled to prevent ajax calls for every field update
            'enableClientValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'errorCssClass' => 'has-error',
                'successCssClass' => 'has-success',
                'afterValidate' => 'js:function(form,data,hasError){
                        if(!hasError){
                                $.ajax({
                                        "type":"POST",
                                        "url":"' . CHtml::normalizeUrl(array("/contacts")) . '",
                                        "data":form.serialize(),
                                        "success":function(data){$("#test").html(data);},
                                        
                                        });
                                }
                        }'
            ),
            'htmlOptions' => array('name' => 'contact_form', 'class' => 'form-horizontal')
        ));

        //if ($model->hasErrors())
           // Yii::app()->tpl->alert('danger', Html::errorSummary($model));

        if (Yii::app()->user->hasFlash('success')) {
            Yii::app()->tpl->alert('success', Yii::app()->user->getFlash('success'));
        }
        ?>
        <div class="form-group">
            <?= $form->labelEx($model, 'name', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-9">
                <?= $form->textField($model, 'name', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('name'))); ?>
                <?= $form->error($model, 'name'); ?>
            </div>

        </div>
        <div class="form-group">
            <?= $form->labelEx($model, 'phone', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-9">
                <?= $form->textField($model, 'phone', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('phone'))); ?>
                <?= $form->error($model, 'phone'); ?>
            </div>

        </div>
        <div class="form-group">
            <?= $form->labelEx($model, 'email', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-9">
                <?= $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('email'))); ?>
                <?= $form->error($model, 'email'); ?>
            </div>

        </div>
        <div class="form-group">
            <?= $form->labelEx($model, 'msg', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-9">
                <?= $form->textArea($model, 'msg', array('class' => 'form-control', 'rows' => '5', 'placeholder' => $model->getAttributeLabel('msg'))); ?>
                <?= $form->error($model, 'msg'); ?>
            </div>

        </div>




        <?php if (Yii::app()->settings->get('contacts', 'enable_captcha')) { ?>
            <div class="form-group row">
                <div class="col-sm-3">
                    <?= $form->labelEx($model, 'verifyCode', array('class' => '')) ?>
                </div>
                <div class="col-sm-4">
                    <?php
                    $this->widget('CCaptcha', array(
                        'imageOptions' => array('class' => 'captcha'),
                        'clickableImage' => true,
                        'showRefreshButton' => false,
                    ))
                    ?>

                </div>
                <div class="col-sm-5">   
                    <?= $form->textField($model, 'verifyCode', array('class' => 'form-control')) ?>
                    <?= $form->error($model, 'verifyCode', array(), false, false) ?>
                </div>
            </div>
        <?php } ?>
        <div class="form-group">

            <div class="col-sm-9 col-sm-offset-3 text-left">
                <?php
                echo CHtml::ajaxSubmitButton(Yii::t('app', 'SEND_MSG'), CHtml::normalizeUrl(array('/contacts')), array(
                    'dataType' => 'html',
                    'type' => 'POST',
                    'success' => 'function(data) {
                common.removeLoader();
                $("#myModal .modal-body").html(data);
                    }',
                    'beforeSend' => 'function(){                        
                common.addLoader("loading");
                      }'
                        ), array('id' => 'mybtn', 'class' => 'btn btn-success'));
                ?>
            </div>

        </div>

        <?php $this->endWidget(); ?>
    </div>



</div>

