<?php

namespace app\modules\seo\assets;

class SeoAsset extends \yii\web\AssetBundle {

    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
    public $sourcePath = '@app/modules/seo/assets';
    public $js = [
        'js/seo.js',
    ];

    public $depends = [
        'yii\jui\JuiAsset',
    ];

}
