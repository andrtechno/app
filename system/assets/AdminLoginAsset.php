<?php

namespace app\system\assets;

use yii\web\AssetBundle;

class AdminLoginAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'web/themes/admin/assets/css/corner-icons.css',
        'web/themes/admin/assets/css/bootstrap-theme.css',
        'web/themes/admin/assets/css/dashboard.css',
        'web/themes/admin/assets/css/login.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
