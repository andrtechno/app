<?php
use panix\engine\Html;
use yii\helpers\Url;
use panix\engine\CMS;
use panix\mod\shop\models\Category;

$this->registerJs("
    $(window).on('load', function () {
        var preloader = $('.loaderArea'),
            loader = preloader.find('.loader');
        loader.fadeOut();
        preloader.delay(350).fadeOut('slow');
    });

", \yii\web\View::POS_END, 'preloader-js');

$config = Yii::$app->settings->get('contacts');

?>

<div class="loaderArea d-none">
    <div class="loader">
        <div class="cssload-inner cssload-one"></div>
        <div class="cssload-inner cssload-two"></div>
        <div class="cssload-inner cssload-three"></div>
    </div>
</div>


<div class="alert alert-info d-none" id="alert-demo" style="margin: 1rem">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h5 class="alert-heading">Добро пожаловать!</h5>
    Это демонстрационный сайт, вся информация на сайте вымышленная, предоставлена исключительно для ознакомление с
    функционало сайта.

</div>
<header>
    <div id="header-top">
        <div class="container">
            <nav class="navbar-expand">
                <div class="navbar-collapse">
                    <ul class="nav">
                        <li class="nav-item">
                            <?= Html::a(Yii::t('compare/default', 'Доставка'), ['/compare'], ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item">
                            <?= Html::a(Yii::t('compare/default', 'Возврат'), ['/compare'], ['class' => 'nav-link']) ?>
                        </li>
                        <?php if (Yii::$app->hasModule('compare')) {
                            $count = Html::tag('span', \panix\mod\compare\components\CompareProducts::countSession(), ['class' => 'badge badge-secondary', 'id' => 'countCompare']);
                            ?>
                            <li class="nav-item">
                                <?= Html::a('<span class="d-none d-md-inline">' . Yii::t('compare/default', 'MODULE_NAME') . '</span> ' . $count, ['/compare'], ['class' => 'top-compare nav-link']) ?>
                            </li>
                        <?php } ?>

                        <?php if (Yii::$app->hasModule('wishlist')) {
                            $count = Html::tag('span', (new \panix\mod\wishlist\components\WishListComponent)->count(), ['class' => 'badge badge-secondary', 'id' => 'countWishlist']);
                            ?>
                            <li class="nav-item">
                                <?= Html::a('<span class="d-none d-md-inline">' . Yii::t('wishlist/default', 'WISHLIST') . '</span> ' . $count, ['/wishlist'], ['class' => 'top-wishlist nav-link']) ?>
                            </li>
                        <?php } ?>

                    </ul>
                    <ul class="nav ml-auto">

                        <?php if (count(Yii::$app->languageManager->getLanguages()) > 1) { ?>
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    <span class="d-none d-md-inline">Язык</span>
                                    <strong><?= Html::img('/uploads/language/' . Yii::$app->languageManager->active->flag_name, ['alt' => Yii::$app->languageManager->active->name]) ?></strong></a>
                                <div class="dropdown-menu">
                                    <?php

                                    foreach (Yii::$app->languageManager->getLanguages() as $lang) {

                                        $classLi = ($lang->code == Yii::$app->language) ? $lang->code . ' active' : $lang->code;
                                        $link = ($lang->is_default) ? CMS::currentUrl() : '/' . $lang->code . CMS::currentUrl();
                                        //Html::link(Html::image('/uploads/language/' . $lang->flag_name, $lang->name), $link, array('title' => $lang->name));

                                        echo Html::a(Html::img('/uploads/language/' . $lang->flag_name, ['alt' => $lang->name]) . ' ' . $lang->name, $link, ['class' => 'dropdown-item']);


                                    }
                                    ?>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if (count(Yii::$app->currency->currencies) > 1) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <span class="d-none d-md-inline">Валюта</span>
                                <strong><?= Yii::$app->currency->active['iso'] ?></strong>
                            </a>
                            <div class="dropdown-menu">
                                <?php

                                foreach (Yii::$app->currency->currencies as $currency) {
                                    echo Html::a($currency['iso'].$currency['symbol'], ['/shop/ajax/currency', 'id' => $currency['id']], [
                                        'class' => Yii::$app->currency->active['id'] === $currency['id'] ? 'dropdown-item active' : 'dropdown-item',
                                        'id' => 'sw' . $currency['id'],
                                        'onClick' => 'switchCurrency(' . $currency['id'] . '); return false;'
                                    ]);
                                }
                                ?>
                            </div>
                        </li>
                        <?php } ?>

                        <?php if (Yii::$app->user->isGuest) { ?>
                            <li class="nav-item">
                                <?= Html::a(Html::icon('user') . ' ' . Yii::t('user/default', 'LOGIN'), ['/user/login'], ['class' => 'nav-link']); ?>
                            </li>
                            <li class="nav-item">
                                <?= Html::a(Yii::t('user/default', 'REGISTER'), ['/user/register'], ['class' => 'nav-link']); ?>
                            </li>
                        <?php } else { ?>
                            <?php

                            $userOrderCount = Yii::$app->getModule('cart')->countByUser;

                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false"><?= Yii::$app->user->username; ?>
                                </a>
                                <div class="dropdown-menu">
                                    <?= Html::a(Html::icon('user') . ' ' . Yii::t('user/default', 'PROFILE'), ['/user/profile'], ['class' => 'dropdown-item']); ?>
                                    <?= Html::a(Html::icon('shopcart') . ' ' . Yii::t('cart/default', 'MY_ORDERS') . ' <span class="badge badge-success">' . $userOrderCount . '</span>', ['/cart/orders'], ['class' => 'dropdown-item']); ?>

                                    <?php
                                    if (Yii::$app->user->can('admin')) {
                                        echo '<div class="dropdown-divider"></div>';
                                        echo Html::a(Html::icon('tools') . ' ' . Yii::t('admin/default', 'MODULE_NAME'), ['/admin'], ['class' => 'dropdown-item']);
                                        echo '<div class="dropdown-divider"></div>';
                                    }
                                    ?>
                                    <?= Html::a(Html::icon('logout') . ' ' . Yii::t('user/default', 'LOGOUT'), ['/user/logout'], ['class' => 'dropdown-item']); ?>

                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>

    </div>
    <div class="container" id="header-center">
        <div class="row">
            <div class="col-lg-3 col-md-6 d-flex align-items-center">
                <a class="navbar-brand ml-auto mr-auto mb-3 mb-md-0" href="/"></a>
            </div>
            <div class="col-lg-2 col-md-6 d-flex align-items-center">
                <div class="header-phones ml-auto mr-auto mb-3 mb-md-0">
                    <?php if (isset($config->phone)) { ?>
                        <?php foreach ($config->phone as $phone) { ?>
                            <?= Html::tel($phone['number'], ['class' => 'mb-2 mt-2 phone h5 ' . CMS::slug(CMS::phoneOperator($phone['number']))]); ?>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex align-items-center">
                <?php echo \panix\mod\shop\widgets\search\SearchWidget::widget([]); ?>
            </div>
            <div class="col-lg-3 col-md-6 d-flex align-items-center">
                <div class="m-auto">
                    <?php echo \panix\mod\cart\widgets\cart\CartWidget::widget(['skin' => 'dropdown']); ?>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container megamenu">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                    aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <?php


            $categories = Category::find()->tree(1);


            ?>
            <div class="collapse navbar-collapse mr-auto" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown megamenu-down">
                        <a class="nav-link dropdown-toggle btn btn-secondary" href="#" id="dropdown08"
                           data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">Каталог товаров</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown08">
                            <div class="container pr-0 pl-0">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="nav flex-column nav-pills" id="pills-tab" role="tablist"
                                             aria-orientation="vertical">
                                            <?php foreach ($categories as $id => $data) { ?>
                                                <?= Html::a($data['title'] . ' (' . $data['totalCount'] . ')', '#pills-' . $data['key'], [
                                                    'class' => 'nav-link ' . (($id == 0) ? 'active' : ''),
                                                    'id' => 'pills-tab-' . $data['key'],
                                                    'data-toggle' => 'pill',
                                                    'aria-controls' => 'pills-' . $data['key'],
                                                    'aria-selected' => ($id == 0) ? 'true' : 'false',
                                                ]); ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tab-content" id="pills-tabContent">
                                            <?php foreach ($categories as $index => $data) { ?>
                                                <?php $class = ($index == 0) ? ' show active' : ''; ?>
                                                <div class="tab-pane fade <?= $class; ?>"
                                                     id="pills-<?= $data['key']; ?>" role="tabpanel"
                                                     aria-labelledby="pills-tab-<?= $data['key']; ?>">

                                                    <?php if (isset($data['children'])) { ?>
                                                        <?php foreach ($data['children'] as $item) { ?>
                                                            <?= Html::a($item['title'] . ' (' . $item['totalCount'] . ')', $item['url'], [
                                                                'class' => 'dropdown-item',
                                                            ]); ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </li>
                    <li class="nav-item active">
                        <?= Html::a(Yii::t('compare/default', 'Доставка и оплата'), ['/compare'], ['class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a(Yii::t('shop/default', 'MANUFACTURER'), ['/manufacturer'], ['class' => 'nav-link active']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a(Yii::t('compare/default', 'Контакты'), ['/contacts'], ['class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item dropdown megamenu-down">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown07"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown07">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h6 class="dropdown-header">Dropdown header</h6>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 class="dropdown-header">Dropdown header</h6>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 class="dropdown-header">Dropdown header</h6>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="navbar-right">
                <?php echo \panix\mod\shop\widgets\search\SearchWidget::widget(['skin' => 'navbar']); ?>
            </div>
        </div>
    </nav>

</header>
