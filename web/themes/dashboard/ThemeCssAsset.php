<?php

namespace app\web\themes\dashboard;

use panix\engine\web\AssetBundle;

/**
 * Class ThemeCssAsset
 * @package app\backend\themes\dashboard\assets
 */
class ThemeCssAsset extends AssetBundle
{

    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets';
        parent::init();
    }



    public $depends = [
        'yii\bootstrap4\BootstrapPluginAsset',
    ];

}
