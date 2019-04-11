<?php

namespace app\backend\web\themes\dashboard\assets;

use panix\engine\web\AssetBundle;

/**
 * Class AdminAsset
 * @package app\backend\themes\dashboard\assets
 */
class AdminAsset extends AssetBundle
{

    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=cyrillic',
        'css/dashboard.css',
        'css/breadcrumbs.css',
        'css/dark.css',
        // 'css/ui.css',
    ];

    public $depends = [
        'panix\engine\assets\CommonAsset',
        'panix\engine\assets\ClipboardAsset',
        'app\backend\web\themes\dashboard\assets\AdminCountersAsset',
    ];

    public function init()
    {
        $this->sourcePath = \Yii::$app->view->theme->basePath . '/assets';
        parent::init();
    }
}
