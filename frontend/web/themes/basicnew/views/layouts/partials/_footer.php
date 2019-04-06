<?php
use panix\engine\Html;
?>

<footer id="footer">

    <div class="container">
        <div class="row no-gutters">
            <div class="col-xl-3 col-lg-3 col-sm-6 col-md-6 text-center text-lg-left">
                <div class="footer-contact">
                    <?= Html::tel('+38 (063) 489-26-95', array('class' => 'phone')); ?>
                    <div>Бесплатно со всех номеров</div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-6 col-md-6 text-center">
                <div class="footer-schedule text-left">
                    Пн-Пт 9:00 - 20:00
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-6 col-md-6 text-center">
                <ul class="social-list">
                    <li class="">
                        <a target="_blank" rel="nofollow" href="#" title="" class="icon-google-plus"><i class=""></i></a>
                    </li>
                    <li class="">
                        <a target="_blank" rel="nofollow" href="#" title=""><i class="icon-facebook"></i></a>
                    </li>
                    <li class="">
                        <a target="_blank" rel="nofollow" href="#" title=""><i class="icon-instagram"></i></a>
                    </li>
                </ul>
                <?php echo \panix\mod\shop\widgets\search\SearchWidget::widget([]); ?>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-6 col-md-6 text-center text-lg-right">{copyright} <?= Yii::$app->pageGen() ?></div>

        </div>
    </div>
</footer>

