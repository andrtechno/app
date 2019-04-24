<?php
use panix\engine\Html;
use \panix\mod\admin\widgets\sidebar\BackendNav;
//use panix\engine\widgets\langSwitcher\LangSwitcher;
use panix\engine\CMS;

?>
<nav class="navbar navbar-expand-lg fixed-top bg-dark">

    <a class="navbar-brand" href="/admin"><span class="d-none d-md-block"><?= strtoupper(Yii::$app->name); ?></span></a>

    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <div id="navbar" class="collapse navbar-collapse mr-auto">
        <?=
        BackendNav::widget([
            'options' => ['class' => 'nav navbar-nav mr-auto'],
        ]);
        ?>
    </div>


    <?php


    $langManager = Yii::$app->languageManager;
    $languages = $langManager->getLanguages();
    $currentDataArray = [];
    foreach ($languages as $l) {
        $currentDataArray[$l->code] = $l->name;
    }

    $current = $currentDataArray[Yii::$app->language];

    $langItems = [];
    if (count($languages) > 0) {
        foreach ($languages as $lang) {

            $link = ($lang->is_default) ? CMS::currentUrl() : '/' . $lang->code . CMS::currentUrl();

            $langItems[] = [
                'label' => Html::img($lang->getFlagUrl(), ['alt' => $lang->name]) . ' ' . $lang->name,
                'url' => $link,
                'options' => ['class' => ($langManager->active->id == $lang->id) ? 'active' : '']
            ];
        }
    }

    /*foreach ($languages as $lang) {

        $link = ($lang->is_default) ? CMS::currentUrl() : '/' . $lang->code . CMS::currentUrl();
        $class = ($langManager->active->id == $lang->id) ? 'active' : '';
        $temp = [];
        $temp['label'] = $lang->name;
        $temp['url'] = $link;
        $temp['options']=['class'=>$class];
        array_push($items, $temp);
    }*/


    // print_r($langItems);die;

    echo \panix\engine\bootstrap\Nav::widget([
        'encodeLabels' => false,
        'items' => [
            [
                'label' => Html::icon('user') . ' ' . Yii::$app->user->displayName,
                'url' => ['/site/index']
            ],
            [
                'label' => Html::icon('notification'),
                'url' => '#',
                'items' => [
                    [
                        'label' => 'asdasd',
                    ],
                    [
                        'label' => 'asdasd22',
                    ],
                    [
                        'label' => 'asdasd22',
                    ],

                ]
            ],
            [
                'label' => Html::icon('home'),
                'url' => '/',
                'options' => ['class' => "d-none d-md-block"]
            ],
            [
                'label' => Html::icon('locked'),
                'url' => ['/user/logout'],
                'options' => ['data-method' => "post"]
            ],
            [
                'label' => Html::img('/uploads/language/' . $langManager->active->code . '.png', ['alt' => '']),
                'url' => '#',
                'items' => $langItems,
                'dropdownOptions' => ['class' => 'dropdown-menu-right'],
            ],
        ],
        'options' => ['class' => 'navbar-right'],
    ]);
    ?>


</nav>
