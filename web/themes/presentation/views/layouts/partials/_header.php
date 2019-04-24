<?php

use panix\engine\Html;
use yii\helpers\Url;
?>
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
        <a class="navbar-brand" href="/"><?= Yii::$app->name?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><?= Html::a(Yii::t('app', 'HOME'), ['/'],['class'=>'nav-link']) ?></li>
                <li class="nav-item"><?= Html::a('File list', ['/presentation'],['class'=>'nav-link']) ?></li>
            </ul>
            <form type="GET" action="<?=Url::to('/presentation/search')?>" class="form-inline mt-2 mt-md-0">
                <?= Html::a('Upload file', ['/presentation/upload'],['class'=>'btn btn-primary mr-sm-2']) ?>
                <input class="form-control mr-sm-2" name="PresentationSearch[text]" type="text" placeholder="Example pixelion" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        </div>
    </nav>
</header>
