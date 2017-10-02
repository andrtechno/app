<?php
namespace app\modules\seo;
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
            'label' => Yii::t('seo/default', 'MODULE_NAME'),
            'author' => 'andrew.panix@gmail.com',
            'version' => '1.0',
            'icon' => $this->icon,
            'description' => Yii::t('seo/default', 'MODULE_DESC'),
            'url' => ['/admin/seo'],
        ];
    }

    public function getAdminMenu() {
        return [
            'system' => [
                'items' =>[
                    [
                        'label' => 'seo',
                        'url' =>['/admin/seo'],
                        'icon' => $this->icon,
                    ],
                ],
            ]
        ];
    }

}
