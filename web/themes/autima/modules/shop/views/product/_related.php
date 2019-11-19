<?php
use panix\ext\owlcarousel\OwlCarouselWidget;


?>
<?php if ($model->relatedProducts) { ?>
    <!--product area start-->
    <section class="product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span><?= Yii::t('shop/default', 'RELATED_PRODUCTS'); ?></h2>
                    </div>


                    <?php
                    OwlCarouselWidget::begin([
                        'containerOptions' => [
                            // 'id' => 'container-id',
                            'class' => 'product_carousel'
                        ],
                        'options' => [
                            'autoplay' => false,
                            'autoplayTimeout' => 3000,
                            'items' => 4,
                            'loop' => false,
                            'margin' => 20,
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
                    foreach ($model->relatedProducts as $data) {
                        echo $this->render('@theme/modules/shop/views/catalog/_view_grid', [
                            'model' => $data
                        ]);
                    }

                    OwlCarouselWidget::end();
                    ?>

                </div>
            </div>

        </div>
    </section>
    <!--product area end-->
<?php } ?>
