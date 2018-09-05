<?php

use panix\engine\Html;
?>

<div id="header">
    <div class="header-top">
        <div class="container">
            <ul class="nav nav-pills pull-right">

                <li><?= Html::a(Yii::t('app', 'HOME'), ['/']) ?></li>
                <?php if (Yii::$app->user->isGuest) { ?>
                    <li><?= Html::a('Login', ['/user/login']) ?></li>
                <?php } else { ?>
                    <li class="dropdown">
                        <?= Html::a(Yii::$app->user->displayName . ' <span class="caret"></span>', '#', ['data-toggle' => 'dropdown', 'class' => 'dropdown-toggle']) ?>
                        <ul class="dropdown-menu">
                            <li><?= Html::aIconL('icon-user', Yii::t('app', 'PROFILE'), ['/user/account']) ?></li>
                            <li><?= Html::aIconL('icon-exit', Yii::t('app', 'LOGOUT'), ['/user/logout'], ['data-method' => "post"]) ?></li>
                            <?php if (Yii::$app->user->can('admin')) { ?>
                                <li class="divider"></li>
                                <li><?= Html::aIconL('icon-tools', Yii::t('app', 'ADMIN_PANEL'), ['/admin']) ?></li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
            <div class="clearfix"></div>
        </div>

    </div>
    <div class="header-center container">
        <div class="row">
            <div class="col-sm-3"><?= Html::a(Yii::$app->name, '/', ['class' => 'logo']); ?></div>
            <div class="col-sm-4"><?php echo \panix\mod\shop\widgets\search\SearchWidget::widget([]); ?></div>
            <div class="col-sm-3">+3 (077) 777-77-77<br/>+3 (077) 777-77-77</div>
            <div class="col-sm-2"><?php echo \panix\mod\cart\widgets\cart\CartWidget::widget(['skin'=>'dropdown']); ?></div>
        </div>
    </div>
    <div class="header-menu">



        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/"><?= Yii::$app->name?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample07">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><?= Html::a(Yii::t('app', 'HOME'), ['/'],['class'=>'nav-link']) ?></li>
                        <li class="nav-item"><?= Html::a('About', ['/page/about'],['class'=>'nav-link']) ?></li>
                        <li class="nav-item"><?= Html::a('Contact', ['/contacts'],['class'=>'nav-link']) ?></li>
                        <li class="nav-item"><?= Html::a('User', ['/user'],['class'=>'nav-link']) ?></li>
                        <li class="nav-item"><?= Html::a('Shop', ['/shop'],['class'=>'nav-link']) ?></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown07">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>


                            </div>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-md-0">
                        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                    </form>
                </div>
            </div>
        </nav>

    </div>
</div>


