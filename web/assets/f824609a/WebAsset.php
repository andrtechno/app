<?php

namespace panix\mod\comments\assets;

use yii\web\AssetBundle;

class WebAsset extends AssetBundle {

    public $sourcePath = '@comments/assets';
   // public $sourcePath = '@vendor/panix/mod-cart/assets';
    public $jsOptions = array(
        'position' => \yii\web\View::POS_BEGIN
    );
    public $css = [
        'css/comments.css',
    ];

}
