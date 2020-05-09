<?php
use panix\engine\Html;

$config = Yii::$app->settings->get('contacts');
?>

<footer id="footer">

    <div class="container">
        <div class="row no-gutters">
            <div class="col-xl-3 col-lg-3 col-sm-6 col-md-6 mb-4 mb-lg-0 text-center text-md-left">
                <div class="footer-contact">
                    <?php if (isset($config->phone)) { ?>
                        <?= Html::tel($config->phone[0]['number'], ['class' => 'phone h3 font-weight-normal']); ?>
                    <?php } ?>
                    <div>Бесплатно со всех номеров</div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-6 col-md-6 d-flex align-items-center mb-4 mb-lg-0">
                <div class="footer-schedule text-left m-auto">
                    Пн-Пт 9:00 - 20:00
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-6 col-md-6 d-flex align-items-center mb-4 mb-lg-0">

                <div class="social-list m-auto">
                    <a target="_blank" rel="nofollow" href="#" title=""
                       class="btn btn-outline-secondary btn-round"><i
                                class="icon-instagram"></i></a>
                    <a target="_blank" rel="nofollow" href="#" title=""
                       class="btn btn-outline-secondary btn-round"><i
                                class="icon-facebook"></i></a>
                    <a target="_blank" rel="nofollow" href="#" title=""
                       class="btn btn-outline-secondary btn-round"><i
                                class="icon-google-plus"></i></a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-6 col-md-6 d-flex align-items-center">
                {copyright}
            </div>

        </div>
    </div>
</footer>

