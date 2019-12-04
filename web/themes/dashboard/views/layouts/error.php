<?php

use panix\engine\Html;
use app\web\themes\dashboard\AdminAsset;

AdminAsset::register($this);
$this->registerJs('
$(document).ready(function () {

    $(".panel-heading .grid-toggle").click(function (e) {
        e.preventDefault();
        $(this).find(\'i\').toggleClass("fa-chevron-down");
    });
    
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
    
    //$.widget.bridge(\'uibutton\', $.ui.button);
    //$.widget.bridge(\'uitooltip\', $.ui.tooltip);
    $(\'.fadeOut-time\').delay(2000).fadeOut(2000);
    $(\'.bootstrap-tooltip\').tooltip();
});
', \yii\web\View::POS_END);
if(!empty($this->context->view->title))
    $this->context->view->title .= ' '.Yii::t('app/admin', 'ADMIN_PANEL');
$sideBar = (method_exists($this->context->module, 'getAdminSidebar')) ? true : false;
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <title><?= $this->context->view->title; ?></title>
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>
    <body class="no-radius1">
    <?php $this->beginBody() ?>
    <div id="wrapper-tpl">
        <?php echo $this->render('partials/_navbar'); ?>

        <?php


        /*$apiKey = '48ac2da20027d4dc-e81fc2486fe80d0d-e99790255b8e5e0b';
        $webhookUrl = 'https://pixelion.com.ua/page/bot'; // for exmaple https://my.com/bot.php

        try {
            $client = new Client([ 'token' => $apiKey ]);
            $result = $client->setWebhook($webhookUrl);
            echo "Success!\n";
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage() ."\n";
        }*/

        ?>

        <?php
        $class = '';
        $class .= (!$sideBar) ? ' full-page' : '';
        if (isset($_COOKIE['wrapper'])) {
            $class .= ($_COOKIE['wrapper'] == 'true') ? ' active' : '';
        }
        ?>
        <div id="wrapper" class="<?= $class ?>">

            <?php if ($sideBar) { ?>
                <div id="sidebar-wrapper">
                    <li class="sidebar-header">

                        <b><?= Yii::$app->user->displayName ?></b>


                    </li>

                    <?php
                    /*echo \panix\mod\admin\widgets\sidebar\SideBar::widget([
                        'items' => array_merge([
                            [
                                'label' => '',
                                'url' => '#',
                                'icon' => 'menu',
                                'options' => ['class' => 'sidebar-nav', 'id' => 'menu-toggle']
                            ]
                        ], $this->context->module->getAdminSidebar())
                    ]);*/
                    ?>


                </div>
            <?php } ?>

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">

                    <div class="row">


                        <div class="col-lg-12 clearfix module-header">
                            <div class="float-left">
                                <h1 class="d-none d-md-block d-sm-block d-lg-block">
                                    <?php
                                    if (isset($this->context->icon)) {
                                        echo Html::icon($this->context->icon);
                                    } else {
                                        if (isset($this->context->module->info)) {
                                            echo Html::icon($this->context->module->info['icon']);
                                        }
                                    }
                                    ?>
                                    <?= Html::encode($this->context->pageName) ?>
                                </h1>
                            </div>

                            <div class="float-right">
                                <?php
                                if (!isset($this->context->buttons)) {
                                    echo Html::a(Yii::t('app', 'CREATE'), ['create'], ['title' => Yii::t('app', 'CREATE'), 'class' => 'btn btn-success']);
                                } else {
                                    if ($this->context->buttons == true) {
                                        if (is_array($this->context->buttons)) {

                                            if (count($this->context->buttons) > 1) {
                                                echo Html::beginTag('div', ['class' => 'btn-group']);
                                            }
                                            foreach ($this->context->buttons as $button) {
                                                if (isset($button['icon'])) {
                                                    $icon = '<i class="' . $button['icon'] . '"></i> ';
                                                } else {
                                                    $icon = '';
                                                }
                                                if (!isset($button['options']['class'])) {
                                                    $button['options']['class'] = ['btn btn-secondary'];
                                                }
                                                echo Html::a($icon . $button['label'], $button['url'], $button['options']);
                                            }
                                            if (count($this->context->buttons) > 1) {
                                                echo Html::endTag('div');
                                            }
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="container-breadcrumbs">
                            <?php echo $this->render('partials/_breadcrumbs', ['breadcrumbs' => $this->context->breadcrumbs]); ?>
                            <?php echo $this->render('partials/_addonsMenu'); ?>
                        </div>

                        <div class="container error-page">
                            <?php
                            if (Yii::$app->session->allFlashes) { ?>
                                <?php foreach (Yii::$app->session->allFlashes as $key => $message) {
                                    $key = ($key == 'error') ? 'danger' : $key;
                                    ?>
                                    <?php if (is_array($message)) { ?>
                                        <?php foreach ($message as $msg) { ?>
                                            <div class="alert alert-<?= $key ?> fadeOut2-time"><?= $msg ?></div>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <div class="alert alert-<?= $key ?> fadeOut2-time"><?= $message ?></div>
                                    <?php } ?>

                                <?php } ?>
                            <?php } ?>

                            <?= $content ?>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <footer class="footer">
            <p class="col-md-12 text-center">
                <?= Yii::$app->powered() ?> -
                <?= Yii::$app->version ?>
            </p>
        </footer>
        <?php echo \panix\engine\widgets\scrollTop\ScrollTop::widget(); ?>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>