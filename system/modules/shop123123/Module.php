<?php

namespace app\system\modules\shop;

use Yii;
use panix\engine\WebModule;

class Module extends WebModule {


    //public $routes = [
    //    'page/<url>' => 'pages/default/view',
    //];

    public function getNav() {
        return [
            [
                'label' => 'Станицы',
                "url" => ['/admin/shop'],
                'icon' => 'icon-shopcart'
            ],
            [
                'label' => Yii::t('shop/admin','CATEGORIES'),
                "url" => ['/admin/shop/category'],
                'icon' => 'icon-folder-open'
            ],
            [
                'label' => Yii::t('shop/admin','MANUFACTURER'),
                "url" => ['/admin/shop/manufacturer'],
                'icon' => 'icon-apple'
            ],
            [
                'label' => Yii::t('app','SETTINGS'),
                "url" => ['/admin/shop/settings'],
                'icon' => 'icon-settings'
            ]
        ];
    }

    public function getInfo() {
        return [
            'name' => Yii::t('shop/default', 'MODULE_NAME'),
            'author' => 'andrew.panix@gmail.com',
            'version' => '1.0',
            'icon' => 'icon-shopcart',
            'description' => Yii::t('shop/default', 'MODULE_DESC'),
            'url' => ['/admin/shop'],
        ];
    }

    protected function getDefaultModelClasses() {
        return [
            'ShopProduct' => 'app\system\modules\shop\models\ShopProduct',
            'ShopProductSearch' => 'app\system\modules\shop\models\search\ShopProductSearch',
            'ShopCategory' => 'app\system\modules\shop\models\ShopCategory',
            'ShopCategorySearch' => 'app\system\modules\shop\models\search\ShopCategorySearch',
            'ShopManufacturer' => 'app\system\modules\shop\models\ShopManufacturer',
            'ShopManufacturerSearch' => 'app\system\modules\shop\models\search\ShopManufacturerSearch',
        ];
    }

}
