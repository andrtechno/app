<?php

namespace app\system\modules\shop\models;

use app\models\User;
use app\system\modules\shop\models\query\ShopManufacturerQuery;
use panix\engine\WebModel;
use panix\engine\behaviors\MultilingualBehavior;

class ShopManufacturer extends WebModel {

    const MODULE_ID = 'shop';

    public static function find() {
        return new ShopManufacturerQuery(get_called_class());
    }
        public static function dropdown()
    {
        // get and cache data
        static $dropdown;
        if ($dropdown === null) {

            // get all records from database and generate
            $models = static::find()->all();
            foreach ($models as $model) {
                $dropdown[$model->id] = $model->name;
            }
        }

        return $dropdown;
    }
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%shop_manufacturer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'seo_alias'], 'trim'],
            [['name', 'seo_alias'], 'string', 'max' => 255],
            [['ordern'], 'integer'],
            [['name', 'seo_alias'], 'safe'],
        ];
    }



}
