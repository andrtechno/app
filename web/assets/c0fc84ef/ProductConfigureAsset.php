<?php

namespace panix\mod\shop\assets;

use panix\engine\web\AssetBundle;

/**
 * Class WebAsset
 * @package panix\mod\shop\assets
 */
class ProductConfigureAsset extends AssetBundle
{

    public $sourcePath = '@vendor/panix/mod-shop/assets';

    public $js = [
        'js/product.view.configurations.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
