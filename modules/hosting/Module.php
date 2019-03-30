<?php
namespace app\modules\hosting;
use Yii;
class Module extends \panix\engine\WebModule {

    public $icon ='seo-monitor';


    public function afterInstall() {
        Yii::$app->db->import($this->id);
        return parent::afterInstall();
    }

    public function afterUninstall() {
        //Удаляем таблицу модуля
        Yii::$app->db->createCommand()->dropTable(Redirects::tableName());
        Yii::$app->db->createCommand()->dropTable(SeoMain::tableName());
        Yii::$app->db->createCommand()->dropTable(SeoParams::tableName());
        Yii::$app->db->createCommand()->dropTable(SeoUrl::tableName());
        return parent::afterUninstall();
    }
    public function getInfo() {
        return [
            'label' => Yii::t('hosting/default', 'MODULE_NAME'),
            'author' => 'andrew.panix@gmail.com',
            'version' => '1.0',
            'icon' => $this->icon,
            'description' => Yii::t('hosting/default', 'MODULE_DESC'),
            'url' => ['/admin/hosting'],
        ];
    }

    public function getAdminMenu() {
        return [
            'system' => [
                'items' =>[
                    [
                        'label' => 'hosting',
                        'url' =>['/admin/hosting'],
                        'icon' => $this->icon,
                    ],
                ],
            ]
        ];
    }

}
