<?php

namespace app\web\themes\andrix\assets;

use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle {

    private $_theme;

    public function init() {
        $this->_theme = \Yii::$app->settings->get('app', 'theme');
        $this->sourcePath = "@webroot/themes/{$this->_theme}/assets";
        parent::init();
    }

    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $css = [
        'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic',
        'css/ie10-viewport-bug-workaround.css',
        'css/style.css',
        'css/orange.css',
    ];
    public $js = [
        'js/particles.min.js',
        'js/jquery.easing-1.3.min.js',
        'js/jcf.js',
        'js/jcf.scrollable.js',
        'js/jcf.select.js',
        'js/ie10-viewport-bug-workaround.js',
        'js/owl.carousel.min.js',
        'js/owlcarousel_setting.js',
        'js/parallax-1.1.3.js',
        'js/parallax_setting.js',
        'js/masonry.min.js',
        'js/masonry.filter.js',
        'js/masonry_setting.js',
        'js/custom.js'
    ];
    public $depends = [
        'panix\engine\assets\CommonAsset',
        'panix\mod\shop\assets\WebAsset',
        'panix\mod\comments\assets\WebAsset',
    ];

}
