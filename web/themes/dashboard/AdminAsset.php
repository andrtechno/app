<?php

namespace app\web\themes\dashboard;

use panix\engine\web\AssetBundle;

/**
 * Class AdminAsset
 * @package app\web\themes\dashboard
 */
class AdminAsset extends AssetBundle
{

    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=cyrillic',
        'css/dashboard.css',
        'css/breadcrumbs.css',
        'css/dark.css',
    ];

    public $js = [
        'js/jquery.cookie.js',
        'js/dashboard.js',
    ];

    public $depends = [
        'panix\ext\fancybox\FancyboxAsset',
        'panix\engine\assets\CommonAsset',
        'panix\engine\assets\ClipboardAsset',
        'app\web\themes\dashboard\AdminCountersAsset',
    ];

    public $cssOptions = ['data-theme' => 1];

    public function init()
    {

        $this->sourcePath = __DIR__ . '/assets';
        parent::init();
    }
}
