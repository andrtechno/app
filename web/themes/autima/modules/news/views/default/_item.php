<?php
use panix\engine\Html;

/**
 * @var panix\mod\news\models\News|\panix\engine\behaviors\UploadFileBehavior $model
 */

$image = $model->getImageUrl('image', '400x400',[],true);
?>

<div class="single_blog clearfix">
    <?php if($image){ ?>
    <div class="blog_thumb">

        <?= Html::a(Html::img($image), $model->getUrl()); ?>
    </div>
    <?php } ?>
    <div class="blog_content">
        <div><?= Html::a($model->name, $model->getUrl(), ['class' => 'h3']); ?></div>
        <div class="blog_desc">
            <?= $model->isText('short_description'); ?>
        </div>
    </div>
</div>