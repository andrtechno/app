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

                <div class="col-md-6">
                    <?= Yii::$app->pageGen() ?>
                </div>
                <div class="col-md-4 text-right">
                    {copyright1}
                </div>
            </div>
        </div>
    </div>
</footer>
