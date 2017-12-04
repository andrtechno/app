<?php

namespace app\modules\projectscalc;

use Yii;

class Module extends \panix\engine\WebModule {

    public function getAdminMenu() {

        return array(
            'modules' => array(
                'items' => array(
                    array(
                        'label' => Yii::t('projectscalc/default', 'MODULE_NAME'),
                        'url' => ['/admin/projectscalc'],
                        'icon' => 'calculator',
                        'items' => array(
                            array(
                                'label' => Yii::t('projectscalc/default', 'MODULE_NAME'),
                                'url' => ['/admin/projectscalc'],
                                'icon' => 'calculator',
                            ),
                            array(
                                'label' => 'Договора',
                                'url' => ['/admin/projectscalc/agreements'],
                                'icon' => 'contract',
                            ),
                            array(
                                'label' => 'Предложения',
                                'url' => ['/admin/projectscalc/offers'],
                                'icon' => 'offer',
                            ),
                        )
                    ),
                ),
            ),
        );
    }

    public function getAdminSidebar() {
        $items = $this->getAdminMenu();
        return $items['modules']['items'][0]['items'];
    }

    public function getInfo() {
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
