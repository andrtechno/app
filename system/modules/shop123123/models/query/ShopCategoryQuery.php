<?php
namespace app\system\modules\shop\models\query;

use panix\engine\behaviors\NestedSetsQueryBehavior;

class ShopCategoryQuery extends \yii\db\ActiveQuery
{
    public function behaviors() {
        return [
            NestedSetsQueryBehavior::className(),
        ];
    }
}