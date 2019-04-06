<?php
use panix\engine\Html;


/**
 * @var $model \panix\mod\shop\models\Product
 */
$config = Yii::$app->settings->get('shop');
/*
$this->widget('ext.fancybox.Fancybox', array(
    'target' => '[data-fancybox=gallery]',

    'config' => array(
        'padding' => 0,
        'transitionIn' => 'none',
        'transitionOut' => 'none',
        'titlePosition' => 'over',
        'thumbs' => array(
            'autoStart' => true
        ),
        'buttons' => array(
            //"zoom",
            "share",
            "slideShow",
            //"fullScreen",
            //"download",
            "thumbs",
            "close"
        ),
        'infobar' => false,
        'preventCaptionOverlap' => true,
        'protect' => true,
    )
));*/
?>
<?php
/*Yii::app()->clientScript->registerScript('product-gallery', "
    $(function () {
        $('.thumb').click(function () {
            $('.thumb').removeClass('active');
            $(this).addClass('active');
            var src_bg = $(this).attr('href');
            var src_middle = $(this).attr('data-img');

            //set params main image
            $('#main-image').attr('href', src_bg);
            $('#main-image img').attr('src', src_middle);

            return false;
        });
    });
", CClientScript::POS_END);*/
?>

<div class="container">


    <div class="row">
        <div class="col-sm-6 col-md-5">


            <a id="main-image" href="<?= $model->getMainImage()->url ?>"
               data-fancybox="gallery">
                <img class="img-fluid" src="<?= $model->getMainImage('400x400')->url ?>" alt=""/>
            </a>


            <?php
            if (isset($model->attachments)) { ?>


                <?php

                $defaultOptions = array(
                    'navText' => array('<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>'),
                    'responsiveClass' => false,
                    'margin' => 0,
                    //'stagePadding'=>15,
                    'responsive' => array(
                        0 => array(
                            'items' => 1,
                            'nav' => false,
                            'dots' => true,
                            'center' => true,
                            'loop' => true,
                        ),
                        480 => array(
                            'items' => 2,
                            'nav' => false,
                            'dots' => true
                        ),
                        768 => array(
                            'items' => 2,
                            'nav' => false,
                            'dots' => true
                        ),
                        992 => array(
                            'items' => 2,
                            'nav' => false,
                            'dots' => true
                        ),
                        1200 => array(
                            'items' => 4,
                            'nav' => true,
                            'loop' => false,
                            'mouseDrag' => false,
                        )
                    )
                );
               // $config = CJavaScript::encode($defaultOptions);
               // $cs = Yii::app()->clientScript;
               // $cs->registerCoreScript('owl.carousel');
               // $cs->registerScript('owl-products-smile', "$('#owl-products-smile').owlCarousel($config);", CClientScript::POS_END);
                ?>


                <div id="owl-products-smile" class="owl-products-smile owl-carousel">
                    <?php foreach ($model->attachments as $k => $image) { ?>


                        <a href="<?= $image->getImageUrl() ?>"
                           data-fancybox="gallery"
                           data-caption="<?php echo Html::encode($model->name); ?>"
                           data-img="<?= $image->getImageUrl('400x400') ?>"
                           class="thumb">
                            <img class="img-fluid"
                                 src="<?= $image->getImageUrl('100x100') ?>"
                                 alt=""/>
                        </a>

                    <?php } ?>
                </div>
            <?php } ?>


        </div>


        <div class='col-sm-6 col-md-7 product-info-block'>
            <div class="product-info">
                <h1 class="name heading-gradient">

                    <?php if (Yii::$app->seo->h1) { ?>
                        <?= Yii::$app->seo->h1; ?>
                    <?php } else { ?>
                        <?= Html::encode($model->name); ?>
                    <?php } ?>
                </h1>
                <?php
                //if ($prev = $model->getNextOrPrev('prev')) {
                //  echo Html::a('prev ' . $prev->name, $prev->getUrl(), ['class' => 'btn btn-default']);
                //}
                //if ($next = $model->getNextOrPrev('next')) {
                //  echo Html::a($next->name . ' next', $next->getUrl(), ['class' => 'btn btn-default']);
                //}


                if ($prev = $model->objectPrev) {
                    echo Html::a('prev ' . $prev->name, $prev->getUrl(), ['class' => 'btn btn-default']);
                }
                if ($next = $model->objectNext) {
                    echo Html::a($next->name . ' next', $next->getUrl(), ['class' => 'btn btn-default']);
                }

                ?>

                <?php echo panix\mod\discounts\widgets\countdown\Countdown::widget(['model' => $model]) ?>
                <div class="m-t-20">
                    <div class="row">
                        <div class="col-sm-3">
                            <?php //$this->widget('ext.rating.StarRating', array('model' => $model)); ?>

                        </div>
                        <div class="col-sm-8">
                            <div class="reviews">
                                <a href="<?= \yii\helpers\Url::to($model->getUrl()); ?>#comments_tab" class="">(<?= Yii::t('app', 'REVIEWS', ['n'=>$model->commentsCount]) ?>)</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

                    echo $model->beginCartForm();
                    ?>
                    <div class="stock-container info-container mt-3">
                        <?php
                        echo $this->render('_configurations', array('model' => $model));
                        ?>
                        <div class="row">

                            <?php if ($model->sku) { ?>
                                <div class="col-sm-3 mb-2"><?= $model->getAttributeLabel('sku') ?>:</div>
                                <div class="col-sm-9 mb-2"><?= Html::encode($model->sku); ?></div>
                            <?php } ?>
                            <?php if ($model->manufacturer) { ?>
                                <?php /*Yii::app()->clientScript->registerScript('popover.manufacturer', "$('.manufacturer-popover').popover({
                                    html: true,
                                    trigger: 'focus',
                                    content: function () {
                                        return $('#manufacturer-image').html();
                                        }
                                    });"); */?>
                                <div id="manufacturer-image" class="d-none">
                                    <?php //echo Html::img($model->manufacturer->getImageUrl('image','300x300'), array('alt'=>$model->manufacturer->name,'class' => 'img-fluid')) ?>
                                    <?php
                                    if (!empty($model->manufacturer->description)) {
                                        echo $model->manufacturer->description;
                                    }
                                    echo Html::a(Html::encode($model->manufacturer->name), $model->manufacturer->getUrl(), array('class' => "btn btn-link"));
                                    ?>
                                </div>
                                <div class="col-sm-3 mb-2"><?= $model->getAttributeLabel('manufacturer_id') ?>:</div>
                                <div class="col-sm-9 mb-2"><?= Html::a(Html::encode($model->manufacturer->name), 'javascript:void(0)', array('title' => $model->getAttributeLabel('manufacturer_id'), 'class' => "manufacturer-popover")); ?></div>
                            <?php } ?>
                            <div class="col-sm-3 mb-2">Наличие:</div>
                            <div class="col-sm-9 mb-2">
                                <?php if ($model->availability == 1) { ?>
                                    <span class="text-success"><?= $model::getAvailabilityItems()[$model->availability]; ?></span>
                                <?php } elseif ($model->availability == 3) { ?>
                                    <span class="text-warning"><?= $model::getAvailabilityItems()[$model->availability] ?></span>
                                <?php } else { ?>
                                    <span class="text-danger"><?= $model::getAvailabilityItems()[$model->availability] ?></span>
                                <?php } ?>
                            </div>
                        </div>

                    </div>

                    <div class="description-container">

                      text
                    </div>

                    <div class="price-container info-container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="price-box">
                                    <span class="price price-lg text-success"><span
                                            id="productPrice"><?= Yii::$app->currency->number_format($model->getFrontPrice()); ?></span> <sub><?= Yii::$app->currency->active->symbol; ?></sub></span>
                                    <?php
                                    if (Yii::$app->hasModule('discounts')) {
                                        if ($model->appliedDiscount) {
                                            ?>
                                            <span class="price-strike"><?= Yii::$app->currency->number_format(Yii::$app->currency->convert($model->originalPrice)) ?> <?= Yii::$app->currency->active->symbol ?></span>

                                            <?php
                                        }
                                    }
                                    ?>

                                    <?php if($model->prices){ ?>
                                        <a class="btn btn-sm btn-link" data-toggle="collapse" href="#prices" role="button" aria-expanded="false" aria-controls="prices">
                                            Показать все оптовые цены
                                        </a>
                                        <div class="collapse" id="prices">
                                            <?php foreach($model->prices as $price){ ?>

                                                <div>
                                                <span class="price price-sm text-success">
                                                    <span><?= Yii::$app->currency->number_format(Yii::$app->currency->convert($price->value,$model->currency_id)); ?></span>
                                                    <sub><?= Yii::$app->currency->active->symbol; ?>/<?= $model->units[$model->unit]; ?></sub>
                                                    </span>
                                                    при заказе от <?= $price->order_from; ?> <?= $model->units[$model->unit]; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="favorite-button">
                                    <?php
                                    if (Yii::$app->hasModule('compare')) {
                                       // $this->widget('mod.compare.widgets.CompareWidget', array('pk' => $model->id));
                                    }
                                    echo '<br/>';
                                    if (Yii::$app->hasModule('wishlist') && !Yii::$app->user->isGuest) {
                                       // $this->widget('mod.wishlist.widgets.WishlistWidget', array('pk' => $model->id));
                                    }
                                    ?>
                                </div>
                            </div>

                        </div><!-- /.row -->
                    </div><!-- /.price-container -->

                    <div class="quantity-container info-container">
                        <div class="row">

                            <div class="col-sm-4">
                                <?php
                                echo yii\jui\Spinner::widget([
                                    'name' => "quantity",
                                    'value' => 1,
                                    'clientOptions' => [
                                        'numberFormat' => "n",
                                        //'icons'=>['down'=> "icon-arrow-up", 'up'=> "custom-up-icon"],
                                        'max' => 999
                                    ],
                                    'options' => ['class' => 'cart-spinner'],
                                ]);
                                ?>
                            </div>

                            <div class="col-sm-8">
                                <?php
                                if (Yii::$app->hasModule('cart')) {
                                    if ($model->isAvailable) {
                                        //  $this->widget('mod.cart.widgets.buyOneClick.BuyOneClickWidget', array('pk' => $model->id));
                                        // Yii::import('mod.cart.CartModule');
                                        // CartModule::registerAssets();
                                        echo panix\mod\cart\widgets\buyOneClick\BuyOneClickWidget::widget(['pk'=>$model->id]);
                                        echo Html::a(Yii::t('cart/default', 'BUY'), 'javascript:cart.add(' . $model->id . ')', array('class' => 'btn btn-primary'));
                                    } else {
                                        echo Html::a(Yii::t('app', 'NOT_AVAILABLE'), 'javascript:cart.notifier(' . $model->id . ');', array('class' => 'btn btn-link'));
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>


                    <?php
                    /*$this->widget('ext.share.ShareWidget', array(
                        'model' => $model,
                        'image' => $model->getMainImageUrl('original'),
                        'title' => $model->name
                    ));*/
                    ?>
                    <?php echo $model->endCartForm(); ?>



                <div class="row product-info-ext-title">
                    <div class="col-12 col-md-4">
                        <div class="product-info-ext product-info-ext__payment">Удобные варианты оплаты</div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="product-info-ext product-info-ext__delivery">Отправка по всей стране</div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="product-info-ext product-info-ext__guarantee">Гарантия от магазина</div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
<div class="line-title"></div>
<div class="container">
    <div class="product-tabs">
        <div class="row">
            <div class="col-sm-12">


                <?php
                $tabs = [];
                if (!empty($model->full_description)) {
                    $tabs[] = [
                        'label' => $model->getAttributeLabel('full_description'),
                        'content' => $model->full_description,
                        //   'active' => true,
                        'options' => ['id' => 'description'],
                    ];
                }
                if ($model->eavAttributes) {
                    $tabs[] = [
                        'label' => 'Характеристики',
                        'content' => $this->render('tabs/_attributes', ['model' => $model]),
                        'options' => ['id' => 'attributes'],
                    ];
                }
                if (Yii::$app->hasModule('comments')) {
                    $tabs[] = [
                        'label' => Yii::t('app', 'REVIEWS', ['n' => $model->commentsCount]),
                        'content' => $this->render('tabs/_comments', ['model' => $model]),
                        'options' => ['id' => 'comments'],
                    ];
                }
                if ($model->relatedProducts) {
                    $tabs[] = [
                        'label' => 'Связи',
                        'content' => $this->render('tabs/_related', ['model' => $model]),
                        'options' => ['id' => 'related'],
                    ];
                }
                if ($model->video) {
                    $tabs[] = [
                        'label' => 'Видео',
                        'content' => $this->render('tabs/_video', ['model' => $model]),
                        'options' => ['id' => 'video'],
                    ];
                }


                echo \panix\engine\bootstrap\Tabs::widget(['items' => $tabs,'navType'=>'nav-pills justify-content-center']);
                ?>
            </div>


        </div>
    </div>


</div>



<?php
//$this->widget('mod.shop.widgets.sessionView.SessionViewWidget',array('current_id'=>$model->id));
?>


