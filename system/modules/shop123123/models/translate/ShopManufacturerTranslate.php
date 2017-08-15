<?php

namespace app\system\modules\shop\models\translate;



use panix\engine\WebModel;
use panix\engine\behaviors\TranslateBehavior;

class ShopManufacturerTranslate extends \yii\db\ActiveRecord
{
    public function attributeLabels()
    {
        switch ($this->language) {
            case 'de-DE':
                return [
                    'name' => 'Titel',
                    'body' => 'Inhalt',
                ];
            case 'ru-RU':
                return [
                    'name' => 'Заголовок',
                    'body' => 'Тело',
                ];
            default:
                return [
                    'name' => 'Title',
                    'body' => 'Body',
                ];
        }
    }
}