<?php

use panix\engine\Html;
use app\web\themes\dashboard\AdminAsset;

$asset = AdminAsset::register($this);

$this->registerJs('
$(document).ready(function () {

    $(".panel-heading .grid-toggle").click(function (e) {
        e.preventDefault();
        $(this).find(\'i\').toggleClass("fa-chevron-down");
    });
    
    //$.widget.bridge(\'uibutton\', $.ui.button);
    //$.widget.bridge(\'uitooltip\', $.ui.tooltip);
    $(\'.fadeOut-time\').delay(2000).fadeOut(2000);
    $(\'.bootstrap-tooltip\').tooltip();
});
', \yii\web\View::POS_END);


$sideBar = (method_exists($this->context->module, 'getAdminSidebar')) ? true : false;

//CREATE user to role
//Yii::$app->getAuthManager()->assign(Yii::$app->getAuthManager()->getRole('admin'),6);

?>
<?php $this->beginPage(); ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo \Yii::$app->charset; ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <title><?= Yii::t('app/admin', 'ADMIN_PANEL'); ?></title>
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>
    <body class="no-radius1">
    <?php $this->beginBody() ?>
    <div id="wrapper-tpl">
        <?= $this->render('partials/_navbar'); ?>
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
                    <?php
                    echo \panix\mod\admin\widgets\sidebar\SiderbarNav::widget([
                        'encodeLabels' => false,
                        'items' => \yii\helpers\ArrayHelper::merge([
                            [
                                'label' => Html::icon('menu'),
                                'url' => '#',
                                // 'encode'=>false,
                                'linkOptions' => ['class' => 'sidebar-nav', 'id' => 'menu-toggle'],
                            ]
                        ], $this->context->module->getAdminSidebar()),
                        'options' => ['class' => 'flex-column'],
                    ]);
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
                                    if (method_exists($this->context, 'actionCreate')) {
                                        echo Html::a(Yii::t('app', 'CREATE'), ['create'], ['title' => Yii::t('app', 'CREATE'), 'class' => 'btn btn-success']);
                                    }
                                } else {
                                    if ($this->context->buttons == true) {
                                        if (is_array($this->context->buttons)) {

                                            if (count($this->context->buttons) > 1) {
                                                echo Html::beginTag('div', ['class' => 'btn-group']);
                                            }
                                            foreach ($this->context->buttons as $button) {
                                                if (isset($button['icon'])) {
                                                    $icon = Html::icon($button['icon']) . ' ';
                                                } else {
                                                    $icon = '';
                                                }
                                                if (!isset($button['options']['class'])) {
                                                    $button['options']['class'] = ['btn btn-secondary'];
                                                }
                                                if (!empty($icon))
                                                    $button['label'] = '<span class="d-none d-sm-inline">' . $button['label'] . '</span>';

                                                if (empty($icon))
                                                    $button['options']['title'] = $button['label'];

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
                            <?= $this->render('partials/_breadcrumbs', ['breadcrumbs' => $this->context->breadcrumbs]); ?>
                            <?= $this->render('partials/_addonsMenu'); ?>
                        </div>


                        <a href="#" onclick="changeCSS('<?= $asset->baseUrl;?>/css/dark.css');">dark</a>
                        <a href="#" onclick="changeCSS('<?= $asset->baseUrl;?>/css/light.css');">light</a>
                        <div class="col-12">

                            <?php

                           // echo '\\'.get_class(new \panix\mod\shop\models\Product);
                            /*$images = \panix\mod\images\models\Image::find()->all();
                            foreach ($images as $img){
                                $img->path = '@uploads/store/product';
                                $img->filePath = str_replace('Products/'.$img->object_id.'/','',$img->filePath);
                                $img->handler_class = '\\panix\\mod\\shop\\models\\Product';
                                $img->handler_hash = (new $img->handler_class)->getHash();
                                $img->save();
                            }*/








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

            <div class="col-md-12 text-center">
                <?= Yii::$app->powered() ?> &mdash; <?= Yii::$app->version ?>
            </div>
        </footer>
        <?php echo \panix\engine\widgets\scrollTop\ScrollTop::widget(); ?>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>