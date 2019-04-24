<?php
/**
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 */
namespace panix\mod\shop\assets\admin;


use panix\engine\web\AssetBundle;

class AttributeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/panix/mod-shop/assets/admin';

    public $js = [
        'js/attribute.options.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
