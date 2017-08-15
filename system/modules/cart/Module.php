<?php

/**
 * @author Andrew S. <andrew.panix@gmail.com>
 * @version 0.1
 */

namespace app\system\modules\cart;

use Yii;
use panix\engine\WebModule;

//use yii\base\BootstrapInterface;


class Module extends WebModule { // implements BootstrapInterface/

    public $alias = "@cart";
    //public $controllerNamespace = 'panix\cart\controllers';
    public $routes = [
        'cart' => 'cart/default/index',
        'cart/add' => 'cart/default/add',
    ];

    public function init() {
        $this->setAliases([
            $this->alias => __DIR__,
        ]);
        parent::init();
    }

    public function getInfo() {
        return [
            'name' => Yii::t('cart/default', 'MODULE_NAME'),
            'author' => 'andrew.panix@gmail.com',
            'version' => '1.0',
            'icon' => 'icon-cart',
            'description' => Yii::t('cart/default', 'MODULE_DESC'),
            'url' => ['/admin/cart'],
        ];
    }

    public function getNav() {
        return [
            [
                'label' => 'Продукция',
                "url" => ['/admin/cart/products'],
                'icon' => 'icon-cart'
            ],
            [
                'label' => 'Категории',
                "url" => ['/admin/cart/categories'],
                'icon' => 'fa-folder-open'
            ],
            [
                'label' => 'Настройки',
                "url" => ['/admin/cart/settings'],
                'icon' => 'icon-settings'
            ]
        ];
    }

    protected function getDefaultModelClasses() {
        return [
            //  'Pages' => 'panix\shop\models\Pages',
            'ShopProductSearch' => 'app\system\modules\shop\models\ShopProductSearch',
            'ShopManufacturer' => 'app\system\modules\shop\models\ShopManufacturer',
            'ShopProduct' => 'app\system\modules\shop\models\ShopProduct',
            'ShopCategory' => 'panix\shop\models\ShopCategory',
        ];
    }

}
