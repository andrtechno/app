<?php
use panix\engine\Html;
use panix\engine\CMS;
$config = Yii::$app->settings->get('contacts');



?>
<!--call to action start-->
<section class="call_to_action d-none">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="call_action_inner">
                    <div class="call_text">
                        <h3>We Have <span>Recommendations</span> for You</h3>
                        <p>Take 30% off when you spend $150 or more with code Autima11</p>
                    </div>
                    <div class="discover_now">
                        <a href="#">discover now</a>
                    </div>
                    <div class="link_follow">
                        <ul>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-google-plus"></i></a></li>
                            <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--call to action end-->
<!--footer area start-->
<footer class="footer_widgets call_to_action p-0">
    <div class="container">
        <div class="footer_top">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container contact_us">
                        <div class="footer_logo">
                            <?= Html::a(Html::img($this->context->assetUrl . '/images/logo.png', ['alt' => Yii::$app->settings->get('app', 'sitename')]), ['/']); ?>
                        </div>
                        <div class="footer_contact">
                            <?php if (isset($config->address) && isset($config->address[Yii::$app->language])) { ?>
                                <p><i class="icon-location"></i> <?= $config->address[Yii::$app->language]; ?></p>
                            <?php } ?>
                            <?php if (isset($config->phone)) { ?>
                                <?php foreach ($config->phone as $phone) { ?>
                                    <p><i class="icon-phone"></i><?= Html::tel($phone['number'], ['class' => 'phone ' . CMS::slug(CMS::phoneOperator($phone['number']))]); ?> <?= $phone['name']; ?></p>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Мы доставляем</h3>
                        <div class="footer_menu">
                            <?php
                            $deliveries = \panix\mod\cart\models\Delivery::find()->all();
                            ?>
                            <ul>
                                <?php foreach ($deliveries as $data){ ?>
                                <li><?= $data->name; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Мы принимаем</h3>
                        <div class="footer_menu">
                            <?php
                            $payments = \panix\mod\cart\models\Payment::find()->all();
                            ?>
                            <ul>
                                <?php foreach ($payments as $data){ ?>
                                    <li><?= $data->name; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container">
                        <?= \panix\mod\delivery\widgets\subscribe\SubscribeWidget::widget(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="copyright_area">
                        <p>{copyright}</p>
                        <p><?= number_format(Yii::getLogger()->elapsedTime * 1000) . ' ms';; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->
