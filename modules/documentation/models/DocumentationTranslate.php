<?php

namespace app\modules\documentation\models;

use yii\db\ActiveRecord;

class DocumentationTranslate extends ActiveRecord
{


    public static function tableName()
    {
        return '{{%documentation_translate}}';
    }


}