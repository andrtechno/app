<?php

namespace app\system\modules\shop\models\query;

use yii\db\ActiveQuery;

class ShopManufacturerQuery extends ActiveQuery {

    public function published($state = 1) {
        return $this->andWhere(['switch' => $state]);
    }

}
