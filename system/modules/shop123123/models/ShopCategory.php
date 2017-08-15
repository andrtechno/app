<?php

namespace app\system\modules\shop\models;

//use Yii;
use panix\engine\WebModel;
use panix\engine\behaviors\TranslateBehavior;
use panix\engine\behaviors\NestedSetsBehavior;
use app\system\modules\shop\models\translate\ShopCategoryTranslate;
use app\system\modules\shop\models\query\ShopCategoryQuery;

class ShopCategory extends WebModel {

    const MODULE_ID = 'shop';

    public static function tableName() {
        return '{{%shop_category}}';
    }

    public static function find() {
        return new ShopCategoryQuery(get_called_class());
    }

    public function rules() {
        return [
            [['seo_alias'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    public function behaviors() {
        return [
            'TranslateBehavior' => [ // name it the way you want
                'class' => TranslateBehavior::className(),
                'translationAttributes' => [
                    'name',
                    'description'
                ]
            ],
            'tree' => [
                'class' => NestedSetsBehavior::className(),
            // 'treeAttribute' => 'tree',
            // 'leftAttribute' => 'lft',
            // 'rightAttribute' => 'rgt',
            // 'depthAttribute' => 'depth',
            ],
        ];
    }

    public function transactions() {
        return [
            self::SCENARIO_DEFAULT => self::OP_INSERT | self::OP_UPDATE,
        ];
    }

    public function getTranslations() {
        return $this->hasMany(ShopCategoryTranslate::className(), ['object_id' => 'id']);
    }

    public static function flatTree() {
        $result = [];
        $categories = ShopCategory::find()->orderBy(['lft' => SORT_ASC])->all();
        array_shift($categories);

        foreach ($categories as $c) {

            if ($c->depth > 1) {
                $result[$c->id] = str_repeat('--', $c->depth - 1) . ' ' . $c->name;
            } else {
                $result[$c->id] = ' ' . $c->name;
            }
        }

        return $result;
    }

}
