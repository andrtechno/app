<?php

namespace app\modules\shop;

use Yii;
use panix\mod\shop\Module as ShopModule;
use yii\base\BootstrapInterface;

class Module extends ShopModule implements BootstrapInterface
{


    public $controllerNamespace = '\panix\mod\shop\controllers';

    public function bootstrap($app)
    {
        $app->i18n->translations[$this->id . '/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@vendor/panix/mod-shop/messages',
            'fileMap' => $app->getTranslationsFileMap($this->id, '@vendor/panix/mod-shop/messages')
        ];


        parent::bootstrap($app);

    }

    public function init()
    {

        parent::init();
        $this->setViewPath('@vendor/panix/mod-shop/views');


       $this->setBasePath(Yii::getAlias('@vendor/panix/mod-shop'));
    }
}
