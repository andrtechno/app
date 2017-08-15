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
        //'//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
        'web/themes/admin/assets/css/corner-icons.css',
        'web/themes/admin/assets/css/bootstrap-theme.css',
        'web/themes/admin/assets/css/dashboard.css',
        'web/themes/admin/assets/css/breadcrumbs.css',

    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
