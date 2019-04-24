<?php

/**
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 */

namespace panix\mod\forum\assets;

use panix\engine\web\AssetBundle;

class ForumAsset extends AssetBundle {

    public $sourcePath = __DIR__;

    public $css = [
        'css/forum.css'
    ];
    public $depends = [
        'yii\jui\JuiAsset',
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
