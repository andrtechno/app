<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-9">

        <?php
        Yii::app()->tpl->openWidget(array(
            'title' => $this->pageName,
        ));
//echo $model->getForm();
        ?>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'redaction-form',
            'htmlOptions' => array('class' => 'form-horizontal')
        ));
        ?>

        <?php // echo $form->errorSummary($model); ?>


        <div class="form-group">
            <div class="col-xs-12">
                <?php echo $form->labelEx($model, 'text', array('class' => 'sr-only')); ?>

                <?php
                $this->widget('ext.tinymce.TinymceArea', array(
                    'model' => $model,
                    'attribute' => 'text',
                ))
                ?>
                <?php echo $form->error($model, 'text'); ?>
            </div>
        </div>

        <div class="form-group text-center">
            <div class="col-xs-12">
                <?= Html::submitButton(Yii::t('app', 'SAVE'), array('class' => 'btn btn-success')); ?> 
            </div>
        </div>
        <?php $this->endWidget(); ?>
        <?php
        Yii::app()->tpl->closeWidget();
        ?>
    </div>

    <script>

        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <div class="col-xs-12 col-sm-12 col-md-3">


        <?php
        Yii::app()->tpl->openWidget(array(
            'title' => 'Документация',
            'htmlOptions' => array('class' => '', 'id' => 'content_manual_block')
        ));

        Yii::app()->clientScript->registerScriptFile($this->baseAssetsUrl . '/js/clipboard.min.js', CClientScript::POS_HEAD);
        ?>
        <div id="content_manual">
            <div class="form-horizontal">


                <?php
                foreach ($this->tpl_keys as $k => $code) {
                    Yii::app()->clientScript->registerScript("clipboard{$k}", "common.clipboard('#clipboard{$k}')");
                    ?>

                    <div class="row form-group">
                        <div class="col-sm-12 col-md-12" data-toggle="tooltip" data-placement="left" title="<?= Yii::t('ProjectsCalcModule.OffersRedactionManual', $code) ?>"><code id="clipboard<?= $k ?>" data-clipboard-text="<?= $code ?>" style="cursor: pointer;"><?= $code ?></code></div>

                    </div>
                <?php } ?>

            </div>
        </div>
        <?php
        Yii::app()->tpl->closeWidget();
        ?>
    </div>
</div>