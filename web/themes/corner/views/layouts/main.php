<?php

use panix\engine\Html;
use yii\widgets\Breadcrumbs;
use app\system\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>

        <?php $this->head() ?>


    </head>
    <body>

        <?php $this->beginBody() ?>
        <div class="wrap">

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
       
                    <div id="nav-collapse" class="collapse navbar-collapse">
                        <ul class="navbar-nav navbar-right nav">
                            <li><?= Html::a(Yii::t('app', 'HOME'), ['/']) ?></li>
                            <li><?= Html::a('About', ['/page/about']) ?></li>
                            <li><?= Html::a('Contact', ['/contacts']) ?></li>
                            <li><?= Html::a('User', ['/user']) ?></li>
                            <?php if (Yii::$app->user->isGuest) { ?>
                                <li><?= Html::a('Login', ['/user/login']) ?></li>
                            <?php } else { //,['username'=>Yii::$app->user->displayName]  ?>
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

            <?php if (isset($this->context->breadcrumbs)) { ?>

                <?php
                echo Breadcrumbs::widget([
                    'links' => $this->context->breadcrumbs,
                    'options' => ['class' => 'breadcrumbs pull-left']
                ]);
                ?>
            <?php } ?>

            <?php
            /* NavBar::begin([
              'brandLabel' => 'CORNER CMS',
              'brandUrl' => Yii::$app->homeUrl,
              'options' => [
              'class' => 'navbar-inverse navbar-fixed-top',
              ],
              ]);
              echo Nav::widget([
              'options' => ['class' => 'navbar-nav navbar-right'],
              'items' => [
              ['label' => Yii::t('app','HOME'), 'url' => ['/site/index']],
              ['label' => 'About', 'url' => ['/site/about']],
              ['label' => 'Contact', 'url' => ['/site/contact']],
              ['label' => 'User', 'url' => ['/user']],
              Yii::$app->user->isGuest ?
              ['label' => 'Login', 'url' => ['/user/login']] :
              ['label' => 'Logout (' . Yii::$app->user->displayName . ')',
              'url' => ['/user/logout'],
              'linkOptions' => ['data-method' => 'post']],
              ],
              ]);


              NavBar::end(); */
            ?>

            <div class="container">
                <?php if (isset($this->context->breadcrumbs)) { ?>

                    <?php
                    echo Breadcrumbs::widget([
                        'links' => $this->context->breadcrumbs,
                    ]);
                    ?>
                <?php } ?>

                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="text-center"><?= Yii::$app->powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
