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

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-5">
            <a id="main-image" style="max-height: 400px" class="d-flex align-items-center"
               href="<?= $model->getMainImage()->url ?>"
               data-fancybox="gallery">
                <img class="img-fluid m-auto" src="<?= $model->getMainImage('400x400')->url ?>" alt=""/>
            </a>

            <?php \panix\ext\owlcarousel\OwlCarouselWidget::begin([
                'containerOptions' => ['class' => 'owl-carousel-small'],
                'options' => [
                    'nav' => true,
                    'margin' => 5,
                    'responsiveClass' => true,
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
                echo Html::a(Html::img($image->getUrl('100x100'), [
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

            <?php \panix\ext\owlcarousel\OwlCarouselWidget::end(); ?>


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
                        <?= Html::encode(($this->h1) ? $this->h1 : $model->name); ?>
                    </h1>
                </div>


                <?php

                /**
                 * @var $prev \panix\mod\shop\models\Product
                 * @var $next \panix\mod\shop\models\Product
                 */
                if ($prev = $model->getPrev(['switch'=>1, 'main_category_id' => $model->main_category_id])->one()) {
                    echo Html::a(Html::icon('arrow-left'), $prev->getUrl(), ['title' => $prev->name]);
                }
                if ($next = $model->getNext(['switch'=>1, 'main_category_id' => $model->main_category_id])->one()) {
                    echo Html::a(Html::icon('arrow-right'), $next->getUrl(), ['title' => $next->name]);
                }
                ?>

                <?php if (Yii::$app->hasModule('discounts') && $model->hasDiscount) { ?>
                    <?= panix\mod\discounts\widgets\countdown\Countdown::widget(['model' => $model]) ?>
                <?php } ?>
                <?= $model->beginCartForm(); ?>
                <?php
                echo \panix\engine\widgets\like\LikeWidget::widget([
                    'model' => $model
                ]);
                ?>
                <div class="info-container mt-3">
                    <div class="row">
                        <div class="col-sm-3 mb-2">
                            <?php //$this->widget('ext.rating.StarRating', array('model' => $model)); ?>
                            rating
                        </div>
                        <div class="col-sm-9 mb-2">
                            <div class="reviews">
                                <a href="#w1-tab1" data-tabid="#comments"
                                   data-toggle="tab">(<?= Yii::t('app/default', 'REVIEWS', ['n' => $model->commentsCount]) ?>
                                    )</a>
                            </div>
                        </div>

                        <?php if ($model->sku) { ?>
                            <div class="col-sm-3 mb-2"><?= $model->getAttributeLabel('sku') ?>:</div>
                            <div class="col-sm-9 mb-2"><?= Html::encode($model->sku); ?></div>
                        <?php } ?>
                        <?php if ($model->manufacturer_id) { ?>
                            <?php /*Yii::app()->clientScript->registerScript('popover.manufacturer', "$('.manufacturer-popover').popover({
                                    html: true,
                                    trigger: 'focus',
                                    content: function () {
                                        return $('#manufacturer-image').html();
                                        }
                                    });"); */ ?>
                            <div id="manufacturer-image" class="d-none">
                                <?php //echo Html::img($model->manufacturer->getImageUrl('image','300x300'), array('alt'=>$model->manufacturer->name,'class' => 'img-fluid')) ?>
                                <?php
                                if (!empty($model->manufacturer->description)) {
                                    echo $model->manufacturer->description;
                                }
                                echo Html::a(Html::encode($model->manufacturer->name), $model->manufacturer->getUrl(), ['class' => "btn btn-link"]);
                                ?>
                            </div>
                            <div class="col-sm-3 mb-2"><?= $model->getAttributeLabel('manufacturer_id') ?>:</div>
                            <div class="col-sm-9 mb-2"><?= Html::a(Html::encode($model->manufacturer->name), 'javascript:void(0)', ['title' => $model->getAttributeLabel('manufacturer_id'), 'class' => "manufacturer-popover"]); ?></div>
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
                    <?php
                    echo $this->render('_configurations', ['model' => $model]);
                    ?>
                </div>
                <div class="price-container info-container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="price-box">

                                <?php if (Yii::$app->hasModule('discounts') && $model->hasDiscount) { ?>
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
                                                    <sub><?= Yii::$app->currency->active['symbol']; ?>


                                                        /<?= $model->units[$model->unit]; ?></sub>

                                                    </span>


                                                при заказе от <?= $price->from; ?> <?= $model->units[$model->unit]; ?>
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
                    <?php if ($model->isAvailable) { ?>
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
                                    'options' => ['class' => 'cart-spinner', 'product_id' => $model->id],
                                ]);

                                ?>
                            </div>

                            <div class="col-sm-8">
                                <?php


                                if (Yii::$app->hasModule('cart')) {
                                    //  $this->widget('mod.cart.widgets.buyOneClick.BuyOneClickWidget', array('pk' => $model->id));
                                    // Yii::import('mod.cart.CartModule');
                                    // CartModule::registerAssets();
                                    echo panix\mod\cart\widgets\buyOneClick\BuyOneClickWidget::widget(['pk' => $model->id]);
                                    echo Html::a(Yii::t('cart/default', 'BUY'), 'javascript:cart.add(' . $model->id . ')', ['class' => 'btn btn-primary']);
                                }


                                ?>
                            </div>
                        </div>
                    <?php } else {
                        \panix\mod\shop\bundles\NotifyAsset::register($this);
                        echo Html::a(Yii::t('shop/default', 'NOT_AVAILABLE'), 'javascript:notify(' . $model->id . ');', ['class' => 'btn btn-link']);
                    } ?>
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

<?= $this->render('_kit', ['model' => $model]); ?>


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
                        'label' => Yii::t('shop/default', 'SPECIFICATION'),
                        'content' => $this->render('tabs/_attributes', ['model' => $model]),
                        'options' => ['id' => 'attributes'],
                    ];
                }
                if (Yii::$app->hasModule('comments')) {
                    $tabs[] = [
                        'label' => Yii::t('app/default', 'REVIEWS', ['n' => $model->commentsCount]),
                        'content' => $this->render('tabs/_comments', ['model' => $model]),
                        'options' => ['id' => 'comments'],
                    ];
                    /* $tabs[] = [
                         'label' => Yii::t('app/default', 'REVIEWS', ['n' => $model->commentsCount]),
                         //'url' => ['/shop/product/comments', 'slug' => $model->slug,'tab'=>'comments'],
                         'content' => 'empty',
                         'options' => ['id' => 'comments','data-url'=>\yii\helpers\Url::to(['/shop/product/comments', 'slug' => $model->slug,'tab'=>'comments'])],
                     ];*/
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


                echo \panix\engine\bootstrap\Tabs::widget(['items' => $tabs, 'navType' => 'nav-pills justify-content-center']);
                ?>
            </div>
        </div>
    </div>
</div>

<?php

$this->registerJs("
$('.reviews a').click(function(){
    $($(this).data('tabid')).tab('show');
    // $(this).tab('show');
});
");

/*
$this->registerJs("
$(document).on('click', '.nav .nav-link', function(e){
    e.preventDefault();
    var self = $(this);
    $.get(
        self.parent().data('url'),
        {
            what: self.attr('data-value')
        },
        function(data){
            $('#w1-tab2').html(data);
        }
    );
    $(this).tab('show');
    return false;
});
");*/

//$this->widget('mod.shop.widgets.sessionView.SessionViewWidget',array('current_id'=>$model->id));
?>


