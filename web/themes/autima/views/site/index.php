<?php
use panix\ext\owlcarousel\OwlCarouselWidget;
use panix\mod\shop\models\Product;

?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="shipping_area mb-50">
                <div class="shipping_inner">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <i class="icon-user" style="font-size:55px;color:#ffd54c;"></i>
                        </div>
                        <div class="shipping_content">
                            <p>Компетентные консультации от специалистов.</p>
                        </div>
                    </div>
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <i class="icon-delivery" style="font-size:55px;color:#ffd54c;"></i>
                        </div>
                        <div class="shipping_content">
                            <p>Доставка товара любой транспортной компании</p>
                        </div>
                    </div>
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <i class="icon-partner" style="font-size:55px;color:#ffd54c;"></i>
                        </div>
                        <div class="shipping_content">
                            <p>Гарантия обмена товара в случае обнаружения брака.</p>
                        </div>
                    </div>
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <i class="icon-cash-money" style="font-size:55px;color:#ffd54c;"></i>
                        </div>
                        <div class="shipping_content">
                            <p>We ensure secure payment</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
//time() - (86400 * Yii::$app->settings->get('shop', 'label_expire_new')

$new = Product::find()->published();
if (Yii::$app->settings->get('shop', 'label_expire_new')) {
    $new->int2between(time(), time() - (86400 * Yii::$app->settings->get('shop', 'label_expire_new')));
} else {
    $new->int2between(-1, -1);
}
$newProducts = $new->all();


$discountProducts = Product::find()
    ->published()
    ->isNotEmpty('discount')
    ->all();
?>
<?php if ($newProducts || $discountProducts) { ?>
    <section class="product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span>Товары</span></h2>
                        <ul class="product_tab_button nav" role="tablist">
                            <?php if ($newProducts) { ?>
                                <li>
                                    <a class="active" data-toggle="tab" href="#new" role="tab" aria-controls="new"
                                       aria-selected="true">Новые</a>
                                </li>
                            <?php } ?>
                            <?php if ($discountProducts) { ?>
                                <li>
                                    <a data-toggle="tab" href="#discount" role="tab" aria-controls="discount"
                                       aria-selected="false">Скидки</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="tab-content">
                <?php if ($newProducts) { ?>
                    <div class="tab-pane fade show active" id="new" role="tabpanel">


                        <?php
                        OwlCarouselWidget::begin([
                            'containerTag' => 'div',
                            'containerOptions' => [
                                'class' => 'product_carousel'
                            ],
                            'options' => [
                                'margin' => 20,
                                'navText' => ['<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>'],
                                'autoplay' => true,
                                'autoplayTimeout' => 8000,
                                'items' => 5,
                                'loop' => false,
                                'nav' => true,
                                'responsiveClass' => true,
                                'responsive' => [
                                    0 => [
                                        'items' => 1,
                                        'nav' => false,
                                        'dots' => true,
                                        'center' => true,
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
                                        'items' => 5,
                                        'dots' => false
                                    ]
                                ]
                            ]
                        ]);
                        foreach ($newProducts as $index => $product) {
                            echo $this->render('@theme/modules/shop/views/catalog/_view_grid', ['model' => $product]);
                        }
                        OwlCarouselWidget::end();
                        ?>


                    </div>
                <?php } ?>
                <?php if ($discountProducts) { ?>
                    <div class="tab-pane fade" id="discount" role="tabpanel">

                        <?php
                        OwlCarouselWidget::begin([
                            'containerTag' => 'div',
                            'containerOptions' => [
                                'class' => 'product_carousel'
                            ],
                            'options' => [
                                'margin' => 20,
                                'navText' => ['<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>'],
                                'autoplay' => true,
                                'autoplayTimeout' => 8000,
                                'items' => 5,
                                'loop' => false,
                                'nav' => true,
                                'responsiveClass' => true,
                                'responsive' => [
                                    0 => [
                                        'items' => 1,
                                        'nav' => false,
                                        'dots' => true,
                                        'center' => true,
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
                                        'items' => 5,
                                        'dots' => false
                                    ]
                                ]
                            ]
                        ]);
                        foreach ($discountProducts as $index => $product) {
                            echo $this->render('@theme/modules/shop/views/catalog/_view_grid', ['model' => $product]);
                        }
                        OwlCarouselWidget::end();
                        ?>

                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>
<?php
$views = Product::find()
    ->where(['id' => Yii::$app->session->get('views')])
    ->published()
    ->all();
if ($views) {
    ?>
    <section class="product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span>Вы интересовались</span></h2>
                    </div>


                    <?php


                    OwlCarouselWidget::begin([
                        'containerTag' => 'div',
                        'containerOptions' => [
                            'class' => 'product_carousel'
                        ],
                        'options' => [
                            'margin' => 20,
                            'navText' => ['<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>'],
                            'autoplay' => true,
                            'autoplayTimeout' => 8000,
                            'items' => 4,
                            'loop' => false,
                            'nav' => true,
                            'responsiveClass' => true,
                            'responsive' => [
                                0 => [
                                    'items' => 1,
                                    'nav' => false,
                                    'dots' => true,
                                    'center' => true,
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
                                    'items' => 5,
                                    'dots' => false
                                ]
                            ]
                        ]
                    ]);
                    ?>

                    <?php

                    foreach ($views as $data) {
                        echo $this->render('@theme/modules/shop/views/catalog/_view_grid', ['model' => $data]);

                    }
                    ?>


                    <?php OwlCarouselWidget::end(); ?>


                </div>
            </div>

        </div>
    </section>
<?php } ?>


