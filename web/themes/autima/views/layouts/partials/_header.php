<?php
use panix\engine\Html;
use yii\helpers\Url;
use panix\engine\CMS;
use panix\mod\shop\models\Category;

$this->registerJs("

", \yii\web\View::POS_END, 'preloader-js');

$config = Yii::$app->settings->get('contacts');

$pages = \panix\mod\pages\models\Pages::find()->published()->all();

?>


<!--header area start-->
<header class="header_area header_padding">
    <!--header top start-->
    <div class="header_top top_two">
        <div class="container">
            <div class="top_inner">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="follow_us">
                            <label>Follow Us:</label>
                            <ul class="follow_link">
                                <li><a href="#"><i class="icon-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-google-plus"></i></a></li>
                                <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="top_right text-right">
                            <ul>


                                <?php if (Yii::$app->user->isGuest) { ?>
                                    <li class="top_links">
                                        <?= Html::a(Html::icon('user') . ' ' . Yii::t('user/default', 'LOGIN'), ['/user/login'], ['class' => '']); ?>
                                    </li>
                                    <li class="top_links">
                                        <?= Html::a(Yii::t('user/default', 'REGISTER'), ['/user/register'], ['class' => '']); ?>
                                    </li>
                                <?php } else { ?>
                                    <?php

                                    $userOrderCount = Yii::$app->getModule('cart')->countByUser;

                                    ?>
                                    <li class="top_links">
                                        <i class="icon-user"></i> <?= Yii::$app->user->username; ?>

                                        <ul class="dropdown_links">
                                            <li><?= Html::a(Html::icon('user') . ' ' . Yii::t('user/default', 'PROFILE'), ['/user/profile'], ['class' => '']); ?></li>
                                            <li><?= Html::a(Html::icon('shopcart') . ' ' . Yii::t('cart/default', 'MY_ORDERS') . ' <span class="badge badge-success">' . $userOrderCount . '</span>', ['/cart/orders'], ['class' => '']); ?></li>

                                            <?php
                                            if (Yii::$app->user->can('admin')) {
                                                echo '<li>';
                                                echo Html::a(Html::icon('tools') . ' ' . Yii::t('admin/default', 'MODULE_NAME'), ['/admin'], ['class' => '']);
                                                echo '</li>';
                                            }
                                            ?>
                                            <li><?= Html::a(Html::icon('logout') . ' ' . Yii::t('user/default', 'LOGOUT'), ['/user/logout'], ['class' => '']); ?></li>

                                        </ul>
                                    </li>
                                <?php } ?>

                                <li class="language">
                                    <?php if (count(Yii::$app->languageManager->getLanguages()) > 1) { ?>

                                        <a href="#" class="">
                                            <span class="d-none d-md-inline">Язык</span>
                                            <strong><?= Html::img('/uploads/language/' . Yii::$app->languageManager->active->flag_name, ['alt' => Yii::$app->languageManager->active->name]) ?></strong></a>
                                        <ul class="dropdown_language">
                                            <?php

                                            foreach (Yii::$app->languageManager->getLanguages() as $lang) {

                                                $classLi = ($lang->code == Yii::$app->language) ? $lang->code . ' active' : $lang->code;
                                                $link = ($lang->is_default) ? CMS::currentUrl() : '/' . $lang->code . CMS::currentUrl();
                                                //Html::link(Html::image('/uploads/language/' . $lang->flag_name, $lang->name), $link, array('title' => $lang->name));
                                                echo '<li>';
                                                echo Html::a(Html::img('/uploads/language/' . $lang->flag_name, ['alt' => $lang->name]) . ' ' . $lang->name, $link, ['class' => 'dropdown-item']);
                                                echo '</li>';

                                            }
                                            ?>
                                        </ul>

                                    <?php } ?>
                                </li>
                                <?php if (count(Yii::$app->currency->currencies) > 1) { ?>
                                    <li class="currency">

                                        <a class="" href="#">
                                            <span class="d-none d-md-inline">Валюта</span>
                                            <strong><?= Yii::$app->currency->active['iso'] ?></strong>
                                            <i class="icon-arrow-down"></i>
                                        </a>
                                        <ul class="dropdown_currency">
                                            <?php

                                            foreach (Yii::$app->currency->currencies as $currency) {
                                                echo '<li>';
                                                echo Html::a($currency['iso'], ['/shop/ajax/currency', 'id' => $currency['id']], [
                                                    'class' => Yii::$app->currency->active['id'] === $currency['id'] ? '' : '',
                                                    'id' => 'sw' . $currency['id'],
                                                    'onClick' => 'switchCurrency(' . $currency['id'] . '); return false;'
                                                ]);
                                                echo '</li>';
                                            }
                                            ?>
                                        </ul>

                                    </li>
                                <?php } ?>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header top start-->


    <!--header middel start-->
    <div class="header_middle middle_two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6">
                    <div class="logo">
                        <?= Html::a(Html::img($this->context->assetUrl . '/images/logo.png', ['alt' => Yii::$app->settings->get('app', 'sitename')]), ['/']); ?>

                    </div>
                </div>
                <div class="col-lg-9 col-md-6">
                    <div class="middel_right">
                        <div class="search-container search_two">
                            <?php echo \panix\mod\shop\widgets\search\SearchWidget::widget(['skin' => '@app/widgets/search/default']); ?>
                        </div>
                        <div class="middel_right_info">
                            <?php if (Yii::$app->hasModule('wishlist')) {
                                $count = (new \panix\mod\wishlist\components\WishListComponent)->count();
                                ?>
                                <div class="header_wishlist">
                                    <?= Html::a(Html::icon('heart') . '' . Yii::t('wishlist/default', 'WISHLIST'), ['/wishlist'], ['class' => '']) ?>

                                    <span class="wishlist_quantity" id="countWishlist"><?= $count; ?></span>
                                </div>

                            <?php } ?>


                            <?php echo \panix\mod\cart\widgets\cart\CartWidget::widget(['skin' => '@app/widgets/cart/dropdown']); ?>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->


    <!--header bottom satrt-->
    <div class="header_bottom bottom_two sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="header_bottom_container">
                        <div class="categories_menu">
                            <div class="categories_title">
                                <h2 class="categori_toggle">Каталог продукции</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>


                                    <?php
                                    //$categories = Category::find()->excludeRoot()->all();
                                    $categories = Category::findOne(1);
                                    $children = $categories->children()->published()->all();
                                    if ($children) {
                                    ?>

                                    <?php foreach ($children as $category) { ?>
                                        <?php
                                        $children = $category->children()->published()->all();
                                        if ($children) {
                                            ?>
                                            <li class="menu_item_children categorie_list">
                                                <?php echo Html::a($category->name . ' ' . Html::icon('arrow-right'), '#', []); ?>
                                                <ul class="categories_mega_menu">
                                                    <?php foreach ($children as $category) { ?>
                                                        <li class="menu_item_children">
                                                            <?php echo Html::a($category->name, $category->getUrl(), []); ?>
                                                            <?php
                                                            $children = $category->children()->published()->all();
                                                            if ($children) {
                                                                ?>
                                                                <ul class="categorie_sub_menu">
                                                                    <?php foreach ($children as $category) { ?>
                                                                        <li><?php echo Html::a($category->name, $category->getUrl(), []); ?></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            <?php } ?>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } else { ?>
                                            <li class="menu_item_children categorie_list">
                                                <?php echo Html::a($category->name, $category->getUrl(), []); ?>

                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="main_menu">
                            <nav>
                                <ul>

                                    <?php foreach($pages as $page){ ?>
                                        <li><?= Html::a($page->name, $page->getUrl()); ?></li>
                                    <?php } ?>
                                    <!--<li><?= Html::a(Yii::t('shop/default', 'MANUFACTURER'), ['/manufacturer']); ?></li>-->
                                    <li><?= Html::a(Yii::t('contacts/default', 'MODULE_NAME'), ['/contacts']); ?></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--header bottom end-->


</header>
<!--header area end-->
<!--Offcanvas menu area start-->
<div class="off_canvars_overlay"></div>
<div class="Offcanvas_menu canvas_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <span>MENU</span>
                    <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                </div>
                <div class="Offcanvas_menu_wrapper">

                    <div class="canvas_close">
                        <a href="#"><i class="icon-delete"></i></a>
                    </div>


                    <div class="top_right text-right">
                        <ul>
                            <li class="top_links"><a href="#"><i class="icon-user"></i> My Account<i
                                            class="ion-ios-arrow-down"></i></a>
                                <ul class="dropdown_links">
                                    <li><a href="checkout.html">Checkout </a></li>
                                    <li><a href="my-account.html">My Account </a></li>
                                    <li><a href="cart.html">Shopping Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                </ul>
                            </li>
                            <li class="language">

                                <?php if (count(Yii::$app->languageManager->getLanguages()) > 1) { ?>

                                    <a href="#" class="">
                                        <span class="d-none d-md-inline">Язык</span>
                                        <strong><?= Html::img('/uploads/language/' . Yii::$app->languageManager->active->flag_name, ['alt' => Yii::$app->languageManager->active->name]) ?></strong></a>
                                    <ul class="dropdown_language">
                                        <?php

                                        foreach (Yii::$app->languageManager->getLanguages() as $lang) {

                                            $classLi = ($lang->code == Yii::$app->language) ? $lang->code . ' active' : $lang->code;
                                            $link = ($lang->is_default) ? CMS::currentUrl() : '/' . $lang->code . CMS::currentUrl();
                                            //Html::link(Html::image('/uploads/language/' . $lang->flag_name, $lang->name), $link, array('title' => $lang->name));
                                            echo '<li>';
                                            echo Html::a(Html::img('/uploads/language/' . $lang->flag_name, ['alt' => $lang->name]) . ' ' . $lang->name, $link, ['class' => 'dropdown-item']);
                                            echo '</li>';

                                        }
                                        ?>
                                    </ul>

                                <?php } ?>

                            </li>
                            <li class="currency"><a href="#">$ USD<i class="ion-ios-arrow-down"></i></a>
                                <ul class="dropdown_currency">
                                    <li><a href="#">EUR – Euro</a></li>
                                    <li><a href="#">GBP – British Pound</a></li>
                                    <li><a href="#">INR – India Rupee</a></li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                    <div class="Offcanvas_follow">
                        <label>Follow Us:</label>
                        <ul class="follow_link">
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-google-plus"></i></a></li>
                            <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                        </ul>
                    </div>
                    <div class="search-container">
                        <?php echo \panix\mod\shop\widgets\search\SearchWidget::widget(['skin' => '@app/widgets/search/default']); ?>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <?php foreach($pages as $page){ ?>
                                <li class="menu-item-has-children"><?= Html::a($page->name, $page->getUrl()); ?></li>
                            <?php } ?>
                            <!--<li class="menu-item-has-children"><?= Html::a(Yii::t('shop/default', 'MANUFACTURER'), ['/manufacturer']); ?></li>-->
                            <li class="menu-item-has-children"><?= Html::a(Yii::t('contacts/default', 'MODULE_NAME'), ['/contacts']); ?></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--Offcanvas menu area end-->