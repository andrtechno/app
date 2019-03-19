<?php
use panix\engine\Html;
use yii\helpers\Url;


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


                        <li class="nav-item"><?= Html::a(Yii::t('app', 'COMPARE', array('{c}' => 1)), array('/compare'), array('class' => 'top-compare nav-link')) ?></li>


                    </ul>
                    <ul class="nav ml-auto">


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Валюта: <b><?= Yii::$app->currency->active->iso ?></b>
                            </a>
                            <div class="dropdown-menu">
                                <?php
                                foreach (Yii::$app->currency->currencies as $currency) {
                                    //echo Html::a($currency->iso, '/shop/ajax/activateCurrency/' . $currency->id, array(
                                    //    'success' => 'js:function(){window.location.reload(true)}',
                                    //), array('id' => 'sw' . $currency->id, 'class' => Yii::$app->currency->active->id === $currency->id ? 'dropdown-item active' : 'dropdown-item'));


                                    echo Html::a($currency->iso, ['/shop/ajax/currency','id'=>$currency->id], [
                                        'class' => Yii::$app->currency->active->id === $currency->id ? 'dropdown-item active' : 'dropdown-item',
                                        'id' => 'sw' . $currency->id,
                                        'onClick'=>'switchCurrency('.$currency->id.'); return false;'
                                    ]);




                                }
                                ?>
                            </div>
                        </li>

                        <?php if (Yii::$app->user->isGuest) { ?>
                            <li class="nav-item">
                                <?= Html::a(Html::icon('icon-user') . ' ' . Yii::t('user/default', 'LOGIN'), ['/user/login'], ['class' => 'nav-link']); ?>

                            </li>
                            <li class="nav-item">
                                <?= Html::a(Yii::t('user/default', 'REGISTRATION'), ['/user/register'], ['class' => 'nav-link']); ?>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false"><?= Yii::$app->user->displayName; ?>
                                </a>
                                <div class="dropdown-menu">
                                    <?= Html::a(Html::icon('user') . ' ' . Yii::t('user/default', 'PROFILE'), ['/user/profile'], array('class' => 'dropdown-item')); ?>
                                    <?= Html::a(Html::icon('shopcart') . ' ' . Yii::t('app', 'MY_ORDERS') . ' <span class="badge badge-success">4</span>', Url::to(['/cart/orders']), array('class' => 'dropdown-item')); ?>

                                    <?php
                                    if (Yii::$app->user->can('admin')) {
                                        echo '<div class="dropdown-divider"></div>';
                                        echo Html::a(Html::icon('tools') . ' ' . Yii::t('app/admin', 'ADMIN_PANEL'), ['/admin'], array('class' => 'dropdown-item'));
                                        echo '<div class="dropdown-divider"></div>';
                                    }
                                    ?>
                                    <?= Html::a(Html::icon('logout') . ' ' . Yii::t('user/default', 'LOGOUT'), ['/user/logout'], ['class' => 'dropdown-item', 'data-method' => "post"]); ?>

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
                    <div><?= Html::tel('+38 (063) 489-26-95', array('class' => 'h6')); ?></div>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item"><?= Html::a('Shop', ['/shop'], ['class' => 'nav-link']) ?></li>

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

