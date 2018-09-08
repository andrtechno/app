<?php
use panix\engine\Html;
?>
<footer id="footer">
    <?php
  //  if ($this->beginCache('tpl_footer', ['duration' => 0])) {  //3600*30
        ?>


        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 contacts">
                        <h4>Свяжитесь с нами</h4>

                        <div class="module-body">
                            <ul class="list-unstyled">
                                <li class="media">
                                    <i class="icon-location"></i>
                                    г. Одесса, ул. М. Арнаутская 36

                                </li>

                                <li class="media">
                                    <i class="icon-phone"></i>
                                    <?= Html::tel('+38 (063) 489-26-95',array('class'=>'phone')); ?>

                                </li>

                                <li class="media">
                                    <i class="icon-envelope"></i>
                                    <span><a href="mailto:info@pixelion.com.ua">info@pixelion.com.ua</a></span>

                                </li>

                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3">

                        <h4>Меню</h4>


                        <div>
                            <ul class='list-unstyled'>
                                <li><?= Html::a('dsa', ['/']); ?></li>
                                <li><?= Html::a('dsa', ['/']); ?></li>
                                <li><?= Html::a('dsa', ['/']); ?></li>
                                <li><?= Html::a('dsa', ['/']); ?></li>
                                <li><?= Html::a('dsa', ['/']); ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">

                        <h4>Мы принимаем</h4>


                        <ul class="footer-payments">
                            <li><i class="icon-cash-money" title="Наличные"></i></li>
                            <li><i class="icon-privat24" title="Приват24"></i></li>
                            <li><i class="icon-paypal" title="PayPal"></i></li>
                            <li><i class="icon-webmoney" title="WebMoney"></i></li>
                            <li><i class="icon-visa" title="Visa"></i></li>
                            <li><i class="icon-mastercard" title="MasterCard"></i></li>
                        </ul>

                    </div>
                    <div class="col-md-3">
                        <h4>Поиск</h4>
                        <div class="module-body">
                            <?php echo \panix\mod\shop\widgets\search\SearchWidget::widget([]); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
       // $this->endCache();
   // }
    ?>
    <div class="copyright-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <ul class="social-list">
                        <li class="">
                            <a target="_blank" rel="nofollow" href="#" title=""><i class="icon-vk"></i></a>
                        </li>
                        <li class="">
                            <a target="_blank" rel="nofollow" href="#" title=""><i class="icon-facebook"></i></a>
                        </li>
                        <li class="">
                            <a target="_blank" rel="nofollow" href="#" title=""><i class="icon-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <?= Yii::$app->pageGen() ?>
                </div>
                <div class="col-md-4 text-right">
                    {copyright}
                </div>
            </div>
        </div>
    </div>
</footer>
