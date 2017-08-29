<?php

namespace app\system\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle {

    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'web/themes/admin/assets/css/corner-icons.css',
        'web/themes/admin/assets/css/bootstrap-theme.css',
        'web/themes/admin/assets/css/dashboard.css',
        'web/themes/admin/assets/css/breadcrumbs.css',
    ];
    public $js = [
        'web/themes/admin/assets/js/translitter.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
