<?php

namespace app\modules\presentation;

use Yii;
use panix\engine\WebModule;

class Module extends WebModule
{

    public $icon = 'edit';
    public $routes = [
        'presentation' => 'presentation/default/index',
        'presentation/example' => 'presentation/default/example',

        'presentation/upload' => 'presentation/default/upload',
        'presentation/search' => 'presentation/default/search',
   ];

    public function afterUninstall()
    {
        //Удаляем таблицу модуля
        //Yii::$app->db->createCommand()->dropTable(Redirects::tableName());
        return parent::afterUninstall();
    }


    public function getAdminMenu()
    {
        return [
            'system' => [
                'items' => [
                    [
                        'label' => 'presentation',
                        'url' => ['/admin/presentation'],
                        'icon' => $this->icon,
                    ],
                ],
            ]
        ];
    }

}
