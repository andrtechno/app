<?php $this->renderPartial('//layouts/inc/_cs'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::app()->charset ?>"/>
        <title><?= Html::encode($this->pageTitle) ?></title>
    </head>
    <body>
        <?php $this->renderPartial('//layouts/inc/_nav'); ?>
        <div class="container">
            <?php
            $this->widget('Breadcrumbs', array(
                'homeLink' => '<li>' . Html::link(Yii::t('zii', 'Home'), array('/')) . '</li>',
                'links' => $this->breadcrumbs,
                'htmlOptions' => array('class' => 'breadcrumb'),
                'tagName' => 'ul',
                'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                'inactiveLinkTemplate' => '<li class="active">{label}</li>',
                'separator' => false
            ));
            ?>
            <?= $content ?>
        </div>
        
        <?php $this->renderPartial('//layouts/inc/_footer'); ?>
    </body>
</html>
