<?php
/**
 *
 * @author Pixelion CMS <dev@pixelion.com.ua>
 * @link http://www.pixelion.com.ua/
 */
namespace panix\mod\shop\assets\admin;


use panix\engine\web\AssetBundle;

class ProductAsset extends AssetBundle
{
    public $sourcePath = '@vendor/panix/mod-shop/assets/admin';

    public $js = [
        'js/products.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
