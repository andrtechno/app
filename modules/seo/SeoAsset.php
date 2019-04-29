<?php

namespace app\modules\seo;

class SeoAsset extends \yii\web\AssetBundle {

    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
    public $sourcePath = __DIR__.'/assets';
    public $js = [
        'js/seo.js',
    ];

    public $depends = [
        'yii\jui\JuiAsset',
    ];

}
