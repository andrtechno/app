<?php

namespace app\web\themes\autima;

use panix\engine\web\AssetBundle;

/**
 * Class ThemeAsset
 * @package app\web\themes\autima
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
        'slick/slick.min.js',
        //'js/lazy/jquery.lazy.min.js',
        'js/main.js',
        'swiper/js/swiper.min.js',
    ];

    public $css = [
        'slick/slick.css',
        //'//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Roboto+Slab:400,700&amp;subset=cyrillic',
        'css/app.css',
        'css/style.css',
        'css/tinymce.css',
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
        'panix\ext\owlcarousel\OwlCarouselAsset',
    ];

}
