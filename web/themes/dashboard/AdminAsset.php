<?php

namespace app\web\themes\dashboard;

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


    public $js = [
        'js/jquery.cookie.js',
        'js/dashboard.js',
    ];

    public $depends = [
        'panix\engine\assets\CommonAsset',
        'panix\engine\assets\ClipboardAsset',
        'app\web\themes\dashboard\AdminCountersAsset',
    ];

    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets';
        parent::init();
    }
}
