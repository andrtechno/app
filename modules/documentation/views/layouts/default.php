<?php $this->renderPartial('//layouts/inc/_cs'); ?>
<!DOCTYPE html>
<html lang="<?=Yii::app()->language?>">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php if (Yii::app()->hasModule('seo')) { ?>
            <?php Yii::app()->seo->run(Yii::app()->language); ?>
        <?php } else { ?>
            <title><?= Html::encode($this->pageTitle) ?></title>
        <?php } ?>
    </head>
    <body class="page-<?= Yii::app()->controller->module->id ?>">
        <?php $this->renderPartial('//layouts/inc/_header'); ?>

        <div class="container container-page manual-page">
            <div class="row">
                <div class="col-md-3">

                    <?php
                    $result = array();



             













                    //  echo Yii::app()->getModule('manual')->recursive($result);
                    ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">Документация</div>
                        <div class="panel-body">


                            <?php
                              
                    $this->widget('mod.documentation.widgets.categories.CategoriesWidget', array(
          
                    ));

                            ?>
                        </div>
                    </div>
                    <?php
   
                    Yii::app()->blocks->get('fly', 2);
                    ?>
                </div>
                <div class="col-md-9">

                    <?php
                    $this->widget('Breadcrumbs', array(
                        'homeLink' => '<li>' . Html::link(Yii::t('zii', 'Home'), array('/main/default/index')) . '</li>',
                        'links' => $this->breadcrumbs,
                        'htmlOptions' => array('class' => 'breadcrumb'),
                        'tagName' => 'ul',
                        'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                        'inactiveLinkTemplate' => '<li class="active"><span>{label}</span></li>',
                        'separator' => false
                    ));
                    ?>





                    <?= $content ?>
                </div>

            </div>
        </div>


        <?php $this->renderPartial('//layouts/inc/_footer', array()); ?>

    </body>
</html>
