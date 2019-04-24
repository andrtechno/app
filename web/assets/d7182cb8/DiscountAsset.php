<?php

namespace panix\mod\discounts\assets;

use yii\web\AssetBundle;

class DiscountAsset extends AssetBundle {

    public $sourcePath = __DIR__.'/admin';
   // public $sourcePath = __DIR__.'@vendor/panix/mod-discounts/assets/admin';
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $js = [
        'default.update.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
