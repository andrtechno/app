<?php

use panix\engine\Html;
use yii\widgets\Breadcrumbs;


\app\web\themes\autima\ThemeAsset::register($this);

/*$c = Yii::$app->settings->get('shop');


$this->registerJs("
        var price_penny = " . $c->price_penny . ";
        var price_thousand = " . $c->price_thousand . ";
        var price_decimal = " . $c->price_decimal . ";
     ", yii\web\View::POS_HEAD, 'numberformat');*/

//add
//Yii::$app->authManager->assign(Yii::$app->authManager->createRole('Manager'),2);

//remove
//Yii::$app->authManager->revoke(Yii::$app->authManager->createRole('Manager'),2);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?= $this->render('partials/_header'); ?>


    <!--slider area start-->
    <section class="slider_section slider_two mb-50">
        <div class="slider_area owl-carousel">
            <?php

            $banners = \panix\mod\banner\models\Banner::find()->published()->all();
            foreach ($banners as $banner){
                /** @var \panix\mod\banner\models\Banner $banner */
            ?>
            <div class="single_slider d-flex align-items-center"
                 data-bgimg="<?= $banner->getImageUrl('image'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content">
                                <h2>HP Racer Skutex</h2>
                                <h1><?= $banner->content; ?></h1>
                                <?php if($banner->url){ ?>
                                    <?= Html::a($banner->url_name,$banner->url,['class'=>'button']); ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>



    <div class="container">
        <?= $this->render('@theme/views/layouts/partials/_breadcrumbs'); ?>
        <?= $content ?>

        <?php echo \panix\mod\shop\widgets\brands\BrandsWidget::widget([]); ?>
    </div>
</div>
<?= $this->render('partials/_footer'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
