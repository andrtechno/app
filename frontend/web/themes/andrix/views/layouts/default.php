<?php $this->renderPartial('//layouts/inc/_cs'); ?>
<!DOCTYPE html>
<html lang="<?= Yii::app()->language ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::app()->charset ?>"/>
        <?php if (Yii::app()->hasModule('seo')) { ?>
            <?php Yii::app()->seo->run(); ?>
        <?php } else { ?>
            <title><?= Html::encode($this->pageTitle) ?></title>
        <?php } ?>

    </head>
    <body class="page-<?= Yii::app()->controller->module->id ?>">
        <?php $this->renderPartial('//layouts/inc/_header'); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-3"><?php Yii::app()->blocks->get('left'); ?></div>
                <div class="col-md-6">
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
                <div class="col-md-3"><?php Yii::app()->blocks->get('right'); ?></div>
            </div>
        </div>
        <?php $this->renderPartial('//layouts/inc/_footer'); ?>
    </body>
</html>
