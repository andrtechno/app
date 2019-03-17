<?php
use panix\engine\bootstrap\Nav;

$menu = isset(Yii::$app->controller->addonsMenu) ? Yii::$app->controller->addonsMenu : false;

if ($menu) { ?>
    <div class="breadcrumbs-nav float-right" style="margin-right: 1rem">
        <?php
        echo Nav::widget([
            'encodeLabels' => false,
            'items' => $menu,
            'options' => ['class' => 'navbar-right'],
        ]);
        ?>
    </div>
<?php } ?> 