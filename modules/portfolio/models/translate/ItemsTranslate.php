<?php

namespace app\modules\portfolio\models\translate;

class ItemsTranslate extends \yii\db\ActiveRecord {

    public static function tableName() {
        return '{{%portfolio_item_translate}}';
    }

}
