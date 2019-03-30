<?php

namespace app\modules\projectscalc;

use panix\engine\WebModule;
use Yii;

class Module extends WebModule
{

    public function getAdminMenu()
    {

        return [
            'modules' => [
                'items' => [
                    [
                        'label' => Yii::t('projectscalc/default', 'MODULE_NAME'),
                        //'url' => ['/admin/projectscalc'],
                        'icon' => 'calculator',
                        'items' => [
                            [
                                'label' => Yii::t('projectscalc/default', 'MODULE_NAME'),
                                'url' => ['/admin/projectscalc'],
                                'icon' => 'calculator',
                            ],
                            [
                                'label' => 'Договора',
                                'url' => ['/admin/projectscalc/agreements'],
                                'icon' => 'contract',
                            ],
                            [
                                'label' => 'Предложения',
                                'url' => ['/admin/projectscalc/offers'],
                                'icon' => 'partner',
                            ],
                        ]
                    ]
                ]
            ]
        ];
    }

    public function getAdminSidebar()
    {
        $items = $this->getAdminMenu();
        return $items['modules']['items'][0]['items'];
    }

    public function getInfo()
    {
        return [
            'label' => Yii::t('projectscalc/default', 'MODULE_NAME'),
            'author' => 'andrew.panix@gmail.com',
            'version' => '1.0',
            'icon' => 'icon-edit',
            'description' => Yii::t('projectscalc/default', 'MODULE_DESC'),
            'url' => ['/admin/projectscalc'],
        ];
    }

}
