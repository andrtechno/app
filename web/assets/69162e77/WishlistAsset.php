<?php

namespace panix\mod\wishlist\assets;

use panix\engine\web\AssetBundle;

class WishlistAsset extends AssetBundle
{

    public $sourcePath = __DIR__;

    public $js = [
        'js/wishlist.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
