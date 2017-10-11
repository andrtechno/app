<?php

namespace app\modules\portfolio;

use Yii;
use panix\engine\WebModule;

class Module extends WebModule {


    public $routes = [
        'product/<seo_alias>' => 'shop/default/view',
    ];
    public function init(){
        $this->setIcon('images');
        parent::init();
    }
    public function getAdminMenu() {
        return [
            'modules' => [
                'items' => [
                    [
                        'label' => Yii::t('portfolio/admin', 'portfolio'),
                        "url" => ['/admin/portfolio'],
                        'icon' => 'images'
                    ],
                    [
                        'label' => Yii::t('app', 'SETTINGS'),
                        "url" => ['/admin/portfolio/settings'],
                        'icon' => 'settings'
                    ]
                ],
            ],
        ];
    }

    public function getAdminSidebar2() {

        $mod = new \panix\engine\widgets\nav\Nav;
        $items = $mod->findMenu($this->id);
        return $items['items'];
    }

    public function getInfo() {
        return [
            'label' => Yii::t('portfolio/default', 'MODULE_NAME'),
            'author' => 'andrew.panix@gmail.com',
            'version' => '1.0',
            'icon' => $this->icon,
            'description' => Yii::t('portfolio/default', 'MODULE_DESC'),
            'url' => ['/admin/portfolio'],
        ];
    }

}
