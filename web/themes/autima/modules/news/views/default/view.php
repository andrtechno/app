<?php
use panix\engine\widgets\Pjax;
use panix\engine\Html;

/**
 * @var \panix\mod\news\models\News|\panix\engine\behaviors\UploadFileBehavior $model
 */

$image = $model->getImageUrl('image', '1000x1000', [], true);
Pjax::begin();
?>

    <div class="mce-content-body">

    </div>


    <div class="blog_details_wrapper">
        <?php if ($image) { ?>
            <div class="blog_thumb">

                <?= Html::a(Html::img($image), $model->getUrl()); ?>
            </div>
        <?php } ?>

        <div class="blog_content">
            <h1 class="post_title"><?= ($this->h1) ? $this->h1 : $model->isString('name'); ?></h1>
            <div class="post_content">
                <?= $model->isText('full_description'); ?>
            </div>
        </div>
    </div>


<?php Pjax::end(); ?>

<?php
if(Yii::$app->settings->get('news','comments')){
    echo panix\mod\comments\widgets\comment\CommentWidget::widget(['model' => $model]);
}
?>