<?php

namespace panix\mod\shop\assets;

use panix\engine\web\AssetBundle;

/**
 * Class WebAsset
 * @package panix\mod\shop\assets
 */
class WebAsset extends AssetBundle
{

    public $sourcePath = '@vendor/panix/mod-shop/assets';
    /*
      public $js = [
      'js/relatedProductsTab.js',
      'js/products.js',
      // 'js/products.index.js',
      ]; */

    public $js = [
        'js/switchCurrency.js',
    ];
    public $css = [
       // 'css/ecommerce.css',
    ];
    public $depends = [
        'panix\mod\cart\assets\CartAsset',
        'panix\mod\wishlist\assets\WishlistAsset',
    ];

}
