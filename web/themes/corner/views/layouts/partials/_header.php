<?php

use panix\engine\Html;
?>
<nav class="navbar-inverse navbar-fixed-top navbar" role="navigation" id="nav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">CORNER CMS</a>
        </div>

        <?php
        echo \panix\mod\cart\widgets\cart\CartWidget::widget([]);
        ?>
        
        <div id="nav-collapse" class="collapse navbar-collapse">
            <ul class="navbar-nav navbar-right nav">
                <li><?= Html::a(Yii::t('app', 'HOME'), ['/']) ?></li>
                <li><?= Html::a('About', ['/page/about']) ?></li>
                <li><?= Html::a('Contact', ['/contacts']) ?></li>
                <li><?= Html::a('User', ['/user']) ?></li>
                <?php if (Yii::$app->user->isGuest) { ?>
                    <li><?= Html::a('Login', ['/user/login']) ?></li>
                <?php } else { //,['username'=>Yii::$app->user->displayName]    ?>
                    <li class="dropdown">
                        <?= Html::a(Yii::$app->user->displayName . ' <span class="caret"></span>', '#', ['data-toggle' => 'dropdown', 'class' => 'dropdown-toggle']) ?>
                        <ul class="dropdown-menu">


                            <li><?= Html::aIconL('icon-user', Yii::t('app', 'PROFILE'), ['/user/account']) ?></li>
                            <li><?= Html::aIconL('icon-logout', Yii::t('app', 'LOGOUT'), ['/user/logout'], ['data-method' => "post"]) ?></li>
                            <?php if (Yii::$app->user->can('admin')) { ?>
                                <li class="divider"></li>
                                <li><?= Html::aIconL('icon-tools', Yii::t('app', 'ADMIN_PANEL'), ['/admin']) ?></li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>