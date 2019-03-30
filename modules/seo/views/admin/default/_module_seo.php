<?php

use app\modules\seo\models\SeoUrl;
use panix\engine\Html;
use panix\ext\taginput\TagInput;

if ($model->isNewRecord) {
    $modelseo = new SeoUrl;
} else {
    $modelseo = SeoUrl::find()->where(['url' => Yii::$app->urlManager->createUrl($model->getUrl())])->one();
    if (!$modelseo) {
        $modelseo = new SeoUrl;
    }
}
?>

<div class="form-group row">
    <div class="col-sm-4"><?= Html::activeLabel($modelseo, 'title', ['class' => 'control-label']); ?></div>
    <div class="col-sm-8">
        <?= Html::activeTextInput($modelseo, 'title', ['class' => 'form-control']); ?>
        <?= Html::error($modelseo, 'title'); ?>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-4"><?= Html::activeLabel($modelseo, 'description', ['class' => 'control-label']); ?></div>
    <div class="col-sm-8">
        <?= Html::activeTextarea($modelseo, 'description', ['class' => 'form-control']); ?>
        <?= Html::error($modelseo, 'description'); ?>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-4"><?= Html::activeLabel($modelseo, 'keywords', ['class' => 'control-label']); ?></div>
    <div class="col-sm-8">
        <?=
        TagInput::widget([
            'model' => $modelseo,
            'attribute' => 'keywords'
        ]);
        ?>

        <div class="help-block"><?= Yii::t('seo/default', 'KEYWORDS_HINT'); ?></div>
        <?= Html::error($modelseo, 'keywords'); ?>
    </div>
</div>
