<?php

namespace app\engine;

use Yii;

class View extends \panix\mod\plugins\components\View
{

    public function copyright()
    {
        if (!Yii::$app->request->isAjax || !Yii::$app->request->isPjax) {
            $this->registerCss('
                //#shopium24 span.cr-logo{display:inline-block;font-size:17px;padding: 0 0 0 45px;position:relative;font-family:Pixelion,Montserrat;font-weight:normal;line-height: 40px;}
                //#shopium24 span.cr-logo:after{font-weight:normal;content:"\f002";left:0;top:0;position:absolute;font-size:37px;font-family:Pixelion;}
                ', [], 'pixelion');
        }
        return '<a href="//shopium24.com/" id="shopium24" target="_blank"><span>Сайт работает на платформе</span> &mdash; <span class="cr-logo">SHOPIUM24</span></a>';
    }

}