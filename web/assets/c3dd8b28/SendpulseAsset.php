<?php

/**
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 */

namespace panix\mod\sendpulse\assets;

use panix\engine\web\AssetBundle;
use yii\web\View;
use Yii;

class SendpulseAsset extends AssetBundle {

    public $sourcePath = __DIR__;

    public $js = [
        '//cdn.sendpulse.com/js/push/3e9c33d0f25795d8e0a72d77af9e38c6_0.js'
    ];

    public function init()
    {
        parent::init();
        $this->jsOptions=[
            'position' => View::POS_HEAD,
            'charset'=>Yii::$app->charset,
            'async'=>'async'
        ];

    }
}
