<?php

namespace app\system\modules\shop\models;

use app\models\User;
use app\system\modules\shop\models\query\ShopProductQuery;
use app\system\modules\shop\models\translate\ShopProductTranslate;
use panix\engine\WebModel;
use yii\helpers\ArrayHelper;
use panix\engine\behaviors\TranslateBehavior;

class ShopProduct extends WebModel {

    const MODULE_ID = 'shop';

    public static function find() {
        return new ShopProductQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%shop_product}}';
    }

    public function getUrl() {
        return ['/shop/product/view', 'url' => $this->seo_alias];
    }

    public function transactions() {
        return [
            self::SCENARIO_DEFAULT => self::OP_INSERT | self::OP_UPDATE,
        ];
    }

    public function getTranslations() {
        return $this->hasMany(ShopProductTranslate::className(), ['object_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'seo_alias'], 'trim'],
            [['full_description'], 'string'],
            [['sku', 'full_description'], 'default'], // установим ... как NULL, если они пустые
            [['name', 'seo_alias', 'price'], 'required'],
            [['name', 'seo_alias'], 'string', 'max' => 255],
            [['manufacturer_id', 'quantity', 'views', 'added_to_cart_count', 'ordern'], 'integer'],
            [['name', 'seo_alias', 'full_description'], 'safe'],
                //  [['c1'], 'required'], // Attribute field
                // [['c1'], 'string', 'max' => 255], // Attribute field
        ];
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function behaviors() {
        return ArrayHelper::merge([
                    'eav' => [
                        'class' => \mirocow\eav\EavBehavior::className(),
                        // это модель для таблицы object_attribute_value
                        'valueClass' => \mirocow\eav\models\EavAttributeValue::className(),
                    ],
                    'TranslateBehavior' => [ // name it the way you want
                        'class' => TranslateBehavior::className(),
                        'translationAttributes' => [
                            'name',
                            'full_description'
                        ]
                    ],
                        ], parent::behaviors());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEavAttributes($attributes = []) {
        return \mirocow\eav\models\EavAttribute::find()
                        ->joinWith('entity')
                        ->where([
                            //'categoryId' => $this->categories[0]->id,
                            'entityModel' => $this::className()
                        ])
                        ->orderBy(['order' => SORT_ASC]);
    }

}
