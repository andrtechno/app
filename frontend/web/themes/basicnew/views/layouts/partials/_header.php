<?php
use panix\engine\Html;
use yii\helpers\Url;
use panix\engine\CMS;

$this->registerJs("

    $(window).on('load', function () {
        var preloader = $('.loaderArea'),
            loader = preloader.find('.loader');
        loader.fadeOut();
        preloader.delay(350).fadeOut('slow');
    });

", \yii\web\View::POS_END, 'preloader-js');
?>


<!--ПРЕЛОАДЕР-->
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
                        <?php if (Yii::$app->hasModule('compare')) {
                            $count = Html::tag('span',\panix\mod\compare\components\CompareProducts::countSession(),['class'=>'badge badge-secondary','id'=>'countCompare']);
                            ?>
                            <li class="nav-item">
                                <?= Html::a('<span class="d-none d-md-inline">'.Yii::t('compare/default', 'COMPARE').'</span> '.$count, ['/compare'], ['class' => 'top-compare nav-link']) ?>
                            </li>
                        <?php } ?>

                        <?php if (Yii::$app->hasModule('wishlist')) {
                            $count = Html::tag('span',(new \panix\mod\wishlist\components\WishListComponent)->count(),['class'=>'badge badge-secondary','id'=>'countWishlist']);
                            ?>
                            <li class="nav-item">
                                <?= Html::a('<span class="d-none d-md-inline">'.Yii::t('wishlist/default', 'WISHLIST').'</span> '.$count, ['/wishlist'], ['class' => 'top-wishlist nav-link']) ?>
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
                                    Язык: <b><?= Yii::$app->languageManager->active->name ?></b></a>
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

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Валюта: <b><?= Yii::$app->currency->active->iso ?></b>
                            </a>
                            <div class="dropdown-menu">
                                <?php
                                foreach (Yii::$app->currency->currencies as $currency) {
                                    echo Html::a($currency->iso, ['/shop/ajax/currency', 'id' => $currency->id], [
                                        'class' => Yii::$app->currency->active->id === $currency->id ? 'dropdown-item active' : 'dropdown-item',
                                        'id' => 'sw' . $currency->id,
                                        'onClick' => 'switchCurrency(' . $currency->id . '); return false;'
                                    ]);
                                }
                                ?>
                            </div>
                        </li>

                        <?php if (Yii::$app->user->isGuest) { ?>
                            <li class="nav-item">
                                <?= Html::a(Html::icon('icon-user') . ' ' . Yii::t('app', 'LOG_IN'), ['/users/login'], ['class' => 'nav-link']); ?>

                            </li>
                            <li class="nav-item">
                                <?= Html::a(Yii::t('user/default', 'BTN_REGISTER'), array('/users/register'), ['class' => 'nav-link']); ?>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false"><?= Yii::$app->user->username; ?>
                                </a>
                                <div class="dropdown-menu">
                                    <?= Html::a(Html::icon('icon-user') . ' ' . Yii::t('app', 'PROFILE'), ['/users/profile'], array('class' => 'dropdown-item')); ?>
                                    <?= Html::a(Html::icon('icon-shopcart') . ' ' . Yii::t('app', 'MY_ORDERS') . ' <span class="badge badge-success">4</span>', ['/cart/orders'], ['class' => 'dropdown-item']); ?>

                                    <?php
                                    if (Yii::$app->user->can('admin')) {
                                        echo '<div class="dropdown-divider"></div>';
                                        echo Html::a(Html::icon('icon-tools') . ' ' . Yii::t('app', 'ADMIN_PANEL'), ['/admin'], ['class' => 'dropdown-item']);
                                        echo '<div class="dropdown-divider"></div>';
                                    }
                                    ?>
                                    <?= Html::a(Html::icon('icon-logout') . ' ' . Yii::t('app', 'LOGOUT'), ['/users/logout'], ['class' => 'dropdown-item']); ?>

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
            <div class="col-lg-3"><a class="navbar-brand" href="/"></a></div>
            <div class="col-lg-2 p-0">
                <div class="header-phones">
                    <div><?= Html::tel('+38 (063) 489-26-95', array('class' => 'h6')); ?></div>
                    <div><a href="tel:+38 (063) 489-26-95" class="h6">+38 (063) 489-26-95</a></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center">
                    <?php echo \panix\mod\shop\widgets\search\SearchWidget::widget([]); ?>
                </div>
            </div>
            <div class="col-lg-3">

                <?php echo \panix\mod\cart\widgets\cart\CartWidget::widget(['skin' => 'dropdown']); ?>


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

            <div class="collapse navbar-collapse " id="navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown megamenu-down">
                        <a class="nav-link dropdown-toggle btn btn-secondary" href="#" id="dropdown08"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Каталог</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown08">
                            <div class="container pr-0 pl-0">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                             aria-orientation="vertical">
                                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill"
                                               href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                               aria-selected="true">Home</a>
                                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                               href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                               aria-selected="false">Profile</a>
                                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill"
                                               href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                               aria-selected="false">Messages</a>
                                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill"
                                               href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                               aria-selected="false">Settings</a>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                                 aria-labelledby="v-pills-home-tab">1
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                                 aria-labelledby="v-pills-profile-tab">2
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                                 aria-labelledby="v-pills-messages-tab">3
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                                 aria-labelledby="v-pills-settings-tab">4
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
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
                <form class="form-inline my-2 my-md-0">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>

    </nav>

</header>
