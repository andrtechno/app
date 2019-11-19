<?php
use panix\engine\Html;


/**
 * @var $model \panix\mod\shop\models\Product
 */
$config = Yii::$app->settings->get('shop');

$this->registerJs("
        $(document).on('click','.thumb',function (e) {
            $('.thumb').removeClass('active');
            $(this).addClass('active');
            var src_bg = $(this).attr('href');
            var src_middle = $(this).data('img');
            var cls = $(this).data('class');

            $('#main-image').removeClass('video');
            if(cls !== undefined){
                if(cls == 'video'){
                    $('#main-image').addClass('video');
                }
            }

            //set params main image
            $('#main-image').attr('href', src_bg);
            $('#main-image img').attr('src', src_middle);

            
            return false;
        });
");
echo \panix\ext\fancybox\Fancybox::widget([
    'target' => 'a[data-fancybox="gallery"]',
    'options' => [
        'onInit' => new \yii\web\JsExpression('function(){
            console.log("dsad");
        }')
    ]
]);
//echo Html::a('back',\yii\helpers\Url::previous());


?>
<!--product details start-->
<div class="product_details mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">


                    <a id="main-image" style="max-height: 400px" class="d-flex align-items-center"
                       href="<?= $model->getMainImage()->url ?>"
                       data-fancybox="gallery">
                        <img class="img-fluid m-auto" src="<?= $model->getMainImage('400x400')->url ?>" alt=""/>
                    </a>

                    <?php

                    echo \panix\ext\fancybox\Fancybox::widget([
                        'target' => 'a[data-fancybox="gallery"]',
                        'options' => [
                            'onInit' => new \yii\web\JsExpression('function(){
            console.log("dsad");
        }')
                        ]
                    ]);
                    ?>
                    <div class="single-zoom-thumb">
                        <?php
                        \panix\ext\owlcarousel\OwlCarouselWidget::begin([
                            'containerOptions' => [
                                'class' => 's-tab-zoom'
                            ],
                            'options' => [
                                'nav' => true,
                                'margin' => 5,
                                'responsiveClass' => true,
                                'navText' => ['<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>'],
                                'responsive' => [
                                    0 => [
                                        'items' => 1,
                                        'nav' => false,
                                        'dots' => true
                                    ],
                                    426 => [
                                        'items' => 2,
                                        'nav' => false
                                    ],
                                    768 => [
                                        'items' => 2,
                                        'nav' => false
                                    ],
                                    1024 => [
                                        'items' => 4,
                                        'nav' => true,
                                        'dots' => true
                                    ]
                                ]
                            ]
                        ]);
                        ?>
                        <?php
                        foreach ($model->getImages() as $k => $image) {
                            echo Html::a(Html::img($image->getUrl('150x150'), [
                                'alt' => $image->alt_title,
                                'class' => 'img-fluid img-thumbnail'
                            ]), $image->getUrl(), [
                                // 'data-fancybox' => 'gallery',
                                'data-caption' => Html::encode($model->name),
                                'data-img' => $image->getUrl('400x400'),
                                'class' => 'thumb'
                            ]);
                        }
                        if ($model->video) {
                            echo Html::a(Html::img($model->getVideoPreview(), [
                                'alt' => $model->name,
                                'class' => 'img-fluid img-thumbnail'
                            ]), $model->video, [
                                // 'data-fancybox' => 'gallery',
                                'data-caption' => Html::encode($model->name),
                                'data-class' => 'video',
                                'data-img' => $model->getVideoPreview('maxresdefault'),
                                'class' => 'thumb thumb-video'
                            ]);
                        }
                        ?>
                    </div>
                    <?php \panix\ext\owlcarousel\OwlCarouselWidget::end(); ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <?= $model->beginCartForm(); ?>

                    <h1><?= Html::encode(($this->h1) ? $this->h1 : $model->name); ?></h1>
                    <div class="product_nav">
                        <ul>
                            <?php

                            if ($prev = $model->getPrev()->one()) {
                                echo '<li class="prev">';
                                echo Html::a(Html::icon('arrow-left'), $prev->getUrl(), ['class' => '']);
                                echo '</li>';
                            }
                            if ($next = $model->getNext()->one()) {
                                echo '<li class="next">';
                                echo Html::a(Html::icon('arrow-right'), $next->getUrl(), ['class' => '']);
                                echo '</li>';
                            }

                            ?>

                        </ul>
                    </div>
                    <div class=" product_ratting">
                        <?php
                        echo \panix\engine\widgets\like\LikeWidget::widget([
                            'model' => $model
                        ]);
                        ?>
                        <ul>
                            <li class="review"><a href="#"> (customer review ) </a></li>
                        </ul>


                    </div>
                    <div class="price_box">
                        <span class="current_price">
                            <span id="productPrice"><?= Yii::$app->currency->number_format($model->getFrontPrice()); ?></span>
                        </span>
                        <span class="old_price">$80.00</span>

                    </div>

                    <div class="product_variant color">
                        <h3>Available Options</h3>
                        <label>color</label>
                        <ul>
                            <li class="color1"><a href="#"></a></li>
                            <li class="color2"><a href="#"></a></li>
                            <li class="color3"><a href="#"></a></li>
                            <li class="color4"><a href="#"></a></li>
                        </ul>
                    </div>

                    <?php if ($model->isAvailable) { ?>


                        <div class="product_variant quantity">
                            <label>quantity</label>
                            <?php

                            echo yii\jui\Spinner::widget([
                                'name' => "quantity",
                                'value' => 1,
                                'clientOptions' => [
                                    'numberFormat' => "n",
                                    //'icons'=>['down'=> "icon-arrow-up", 'up'=> "custom-up-icon"],
                                    'max' => 999
                                ],
                                'options' => [
                                    'class' => 'cart-spinner',
                                    'product_id' => $model->id
                                ],
                            ]);

                            ?>



                            <?php
                            if (Yii::$app->hasModule('cart')) {
                                echo panix\mod\cart\widgets\buyOneClick\BuyOneClickWidget::widget(['pk' => $model->id]);
                                echo Html::button(Yii::t('cart/default', 'BUY'), ['class' => 'button', 'onClick' => 'javascript:cart.add(' . $model->id . ')']);
                            }
                            ?>
                        </div>
                    <?php } else {
                        \panix\mod\shop\bundles\NotifyAsset::register($this);
                        echo Html::a(Yii::t('shop/default', 'NOT_AVAILABLE'), 'javascript:notify(' . $model->id . ');', array('class' => 'btn btn-link'));
                    } ?>


                    <div class=" product_d_action">
                        <ul>
                            <?php
                            if (Yii::$app->hasModule('compare')) {
                                echo '<li class="compare">';
                                echo \panix\mod\compare\widgets\CompareWidget::widget([
                                    'pk' => $model->id,
                                    'skin' => 'icon',
                                    'linkOptions' => ['class' => '']
                                ]);
                                echo '</li>';
                            }
                            if (Yii::$app->hasModule('wishlist') && !Yii::$app->user->isGuest) {
                                echo '<li class="wishlist">';
                                echo \panix\mod\wishlist\widgets\WishlistWidget::widget([
                                    'pk' => $model->id,
                                    'skin' => 'icon',
                                    'linkOptions' => ['class' => '']
                                ]);
                                echo '</li>';
                            }
                            ?>
                            <li><a href="#" title="Add to wishlist">+ Add to Wishlist</a></li>
                            <li><a href="#" title="Add to wishlist">+ Compare</a></li>
                        </ul>
                    </div>
                    <div class="product_meta">
                        <?php if ($model->sku) { ?>
                            <span><?= $model->getAttributeLabel('sku') ?>: <a
                                        href="#"><?= Html::encode($model->sku); ?></a></span>
                        <?php } ?>
                        <?php if ($model->manufacturer) { ?>
                            <span><?= $model->getAttributeLabel('manufacturer_id') ?>:
                                <?= Html::a(Html::encode($model->manufacturer->name), $model->manufacturer->getUrl(), ['title' => $model->getAttributeLabel('manufacturer_id'), 'class' => "manufacturer-popover"]); ?></span>
                        <?php } ?>
                    </div>
                    <?php
                    echo $this->render('_configurations', ['model' => $model]);
                    ?>

                    <?php if ($model->prices) { ?>
                        <a class="btn btn-sm btn-link" data-toggle="collapse" href="#prices" role="button"
                           aria-expanded="false" aria-controls="prices">
                            Показать все оптовые цены
                        </a>
                        <div class="collapse" id="prices">
                            <?php foreach ($model->prices as $price) { ?>

                                <div>
<span class="price price-sm text-success">
<span><?= Yii::$app->currency->number_format(Yii::$app->currency->convert($price->value, $model->currency_id)); ?></span>
<?= Yii::$app->currency->active['symbol']; ?>/<?= $model->units[$model->unit]; ?>
</span>
                                    при заказе от <?= $price->from; ?> <?= $model->units[$model->unit]; ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php echo $model->endCartForm(); ?>
                    <div class="priduct_social">
                        <ul>
                            <li><a class="facebook" href="#" title="facebook"><i class="icon-facebook"></i> Like</a>
                            </li>
                            <li><a class="twitter" href="#" title="twitter"><i class="icon-twitter"></i> tweet</a></li>
                            <li><a class="pinterest" href="#" title="pinterest"><i class="icon-pinterest"></i> save</a>
                            </li>
                            <li><a class="google-plus" href="#" title="google +"><i class="icon-google-plus"></i> share</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--product details end-->

<!--product info start-->
<div class="product_d_info">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist">
                            <?php if (!empty($model->full_description)) { ?>
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                       aria-selected="false"><?= $model->getAttributeLabel('full_description'); ?></a>
                                </li>
                            <?php } ?>

                            <li>
                                <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                   aria-selected="false"><?= Yii::t('shop/default', 'SPECIFICATION'); ?></a>
                            </li>
                            <?php if (Yii::$app->hasModule('comments')) { ?>
                                <li>
                                    <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                       aria-selected="false"><?= Yii::t('app', 'REVIEWS', ['n' => $model->commentsCount]); ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <?php $activePanel = (!empty($model->full_description)) ? '' : ' show active'; ?>
                        <?php if (!empty($model->full_description)) { ?>
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content"><?= $model->full_description; ?></div>
                            </div>
                        <?php } ?>


                        <?php if ($model->eavAttributes) { ?>
                            <div class="tab-pane fade<?= $activePanel; ?>" id="sheet" role="tabpanel">
                                <?php echo $this->render('tabs/_attributes', ['model' => $model]); ?>
                            </div>
                        <?php } ?>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="reviews_wrapper">
                                <?= $this->render('tabs/_comments', ['model' => $model]); ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->

<?php

echo $this->render('@theme/modules/shop/views/product/_related', ['model' => $model]);
?>


<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-5">
            <a id="main-image" style="max-height: 400px" class="d-flex align-items-center"
               href="<?= $model->getMainImage()->url ?>"
               data-fancybox="gallery">
                <img class="img-fluid m-auto" src="<?= $model->getMainImage('400x400')->url ?>" alt=""/>
            </a>

            <?php
            // $np = new \panix\mod\cart\widgets\delivery\novaposhta\api\NovaPoshtaApi('ec12098e557d0025887b4c93fc43c114');
            // $np->InternetDocument();

            // print_r($np);

            ?>

        </div>
        <div class='col-sm-6 col-md-7 product-info-block'>
            <div class="product-info">
                <span class="badge badge-light">Код товара: <strong><?= \panix\engine\CMS::idToNumber($model->id); ?></strong></span>
                <div class="heading-gradient">
                    <h1>

                    </h1>
                </div>

                <?php if (Yii::$app->hasModule('discounts') && $model->appliedDiscount) { ?>
                    <?= panix\mod\discounts\widgets\countdown\Countdown::widget(['model' => $model]) ?>
                <?php } ?>


                <div class="info-container mt-3">
                    <div class="row">
                        <div class="col-sm-3 mb-2">
                            <?php //$this->widget('ext.rating.StarRating', array('model' => $model)); ?>
                            rating
                        </div>
                        <div class="col-sm-9 mb-2">
                            <div class="reviews">
                                <a href="#w1-tab1" data-tabid="#comments"
                                   data-toggle="tab">(<?= Yii::t('app', 'REVIEWS', ['n' => $model->commentsCount]) ?>
                                    )</a>
                            </div>
                        </div>


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
                <div class="price-container info-container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="price-box">

                                <?php if (Yii::$app->hasModule('discounts') && $model->appliedDiscount) { ?>
                                    <div class=" mb-3">
                                    <span class="price price-discount">
                                        <del><?= Yii::$app->currency->number_format(Yii::$app->currency->convert($model->originalPrice, $model->currency_id)) ?></del> <sub><?= Yii::$app->currency->active['symbol'] ?></sub>
                                    </span>
                                        <span class="price discount-sum text-warning">-<?= $model->discountSum; ?></span>
                                    </div>

                                <?php } ?>
                                <div><span class="price price-lg">
                                        <span id="productPrice"><?= Yii::$app->currency->number_format($model->getFrontPrice()); ?></span> <sub><?= Yii::$app->currency->active['symbol']; ?></sub>
                                </span></div>

                            </div>
                        </div>


                    </div><!-- /.row -->
                </div><!-- /.price-container -->


            </div>
        </div>
    </div>
</div>

<?= $this->render('_kit', ['model' => $model]); ?>



<?php

$this->registerJs("
$('.reviews a').click(function(){
    $($(this).data('tabid')).tab('show');
    // $(this).tab('show');
});
");

?>


