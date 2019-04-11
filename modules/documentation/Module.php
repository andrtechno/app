<?php

namespace app\modules\documentation;

use Yii;
use panix\engine\Html;
use panix\engine\WebModule;

class Module extends WebModule
{

    public $tegRoute = 'documentation/default/index';

    public $routes = [
        /*'documentation/tag/<tag:.*?>' => 'documentation/default/index',*/
        ['class' => 'app\modules\documentation\components\DocumentationUrlRule'],
        //'documentation' => 'documentation/default/index',
    ];


    public function getAdminMenu()
    {
        return [
            'modules' => [
                'items' => [
                    [
                        'label' => 'docs',
                        'url' => ['/admin/documentation'],
                        'icon' => Html::icon('icon'),
                    ]
                ]
            ]
        ];
    }

    public function getAdminSidebar2()
    {
        $items = $this->getAdminMenu();
        return $items['modules']['items'][0]['items'];
    }

    public function getInfo()
    {
        return [
            'label' => Yii::t('documentation/default', 'MODULE_NAME'),
            'author' => 'andrew.panix@gmail.com',
            'version' => '1.0',
            'icon' => 'icon-documentation',
            'description' => Yii::t('documentation/default', 'MODULE_DESC'),
            'url' => ['/admin/documentation'],
        ];
    }
}
