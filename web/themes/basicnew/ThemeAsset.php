<?php

namespace app\web\themes\basicnew;

use panix\engine\web\AssetBundle;

/**
 * Class ThemeAsset
 * @package app\web\themes\basicnew
 */
class ThemeAsset extends AssetBundle
{

    private $_theme;

    public function init()
    {
        $this->_theme = \Yii::$app->settings->get('app', 'theme');
        $this->sourcePath = __DIR__ . "/assets";
        parent::init();
    }

    public $js = [
        'swiper/js/swiper.min.js',
    ];

    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Roboto+Slab:400,700&amp;subset=cyrillic',
        'css/app.css',
        'css/style.css',
        'swiper/css/swiper.min.css',
    ];

    public $depends = [
        'panix\engine\assets\JqueryCookieAsset',
        'panix\engine\assets\TouchPunchAsset',
        'panix\engine\assets\CommonAsset',
        'panix\mod\shop\bundles\WebAsset',
        'panix\mod\comments\WebAsset',
        'panix\mod\cart\CartAsset',
        'panix\mod\wishlist\WishlistAsset',
    ];

}
