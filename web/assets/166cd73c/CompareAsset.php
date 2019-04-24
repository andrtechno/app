<?php

namespace panix\mod\compare\assets;

use panix\engine\web\AssetBundle;

class CompareAsset extends AssetBundle {

    public $sourcePath = __DIR__;

    public $js = [
        'js/compare.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
