<?php

namespace panix\mod\shop\assets;

class WebAsset extends \yii\web\AssetBundle {

       public $sourcePath = '@vendor/panix/mod-shop/assets';
    /*  public $jsOptions = array(
      'position' => \yii\web\View::POS_HEAD
      );
      public $js = [
      'js/relatedProductsTab.js',
      'js/products.js',
      // 'js/products.index.js',
      ]; */

    public $css = [
        'css/ecommerce.css',
    ];
    public $depends = [
        'panix\mod\cart\CartAsset',
        'panix\mod\wishlist\WishlistAsset',
    ];

}
