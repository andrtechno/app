<?php

namespace app\modules\install;

use yii\base\BootstrapInterface;
use panix\engine\WebModule;

class Module extends WebModule implements BootstrapInterface {

    public $routes = [

    ];

    public function bootstrap($app)
    {
        $app->urlManager->addRules(
            [
                'install' => 'install/default/index',
            ],
            true
        );
    }


}
