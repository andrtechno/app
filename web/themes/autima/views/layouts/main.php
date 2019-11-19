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
            <div class="single_slider d-flex align-items-center"
                 data-bgimg="<?= $this->context->assetUrl; ?>/images/slider4.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content">
                                <h2>HP Racer Skutex</h2>
                                <h1>Feel The Greatest Oil Power With Best One Oil</h1>
                                <a class="button" href="shop.html">shopping now</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="single_slider d-flex align-items-center"
                 data-bgimg="<?= $this->context->assetUrl; ?>/images/slider5.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content">
                                <h2>Special Offer</h2>
                                <h1>Get &250 In Total Discount On A New Set Of Tries</h1>
                                <a class="button" href="shop.html">shopping now</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="single_slider d-flex align-items-center"
                 data-bgimg="<?= $this->context->assetUrl; ?>/images/slider6.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content">
                                <h2>Over 15,000</h2>
                                <h1>Remanufactured Low Milage Used Engines For Sale</h1>
                                <a class="button" href="shop.html">shopping now</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <div class="container">
        <?= $this->render('@theme/views/layouts/partials/_breadcrumbs'); ?>
        <?= $content ?>

        <?php echo \panix\mod\shop\widgets\brands\BrandsWidget::widget([]); ?>
    </div>
</div>
<?= $this->render('partials/_subscribe'); ?>
<?= $this->render('partials/_footer'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
