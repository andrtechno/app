<?php

namespace app\modules\documentation\models;

use panix\engine\traits\DefaultQueryTrait;
use yii\db\ActiveQuery;

class DocumentationQuery extends ActiveQuery
{

    use DefaultQueryTrait;

    public function excludeRoot()
    {
        // $this->addWhere(['condition' => 'id != 1']);
        $this->andWhere(['!=', 'id', 1]);
        return $this;
    }
}
