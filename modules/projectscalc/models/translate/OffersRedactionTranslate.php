<?php

namespace app\modules\projectscalc\models\translate;

use yii\db\ActiveRecord;

class OffersRedactionTranslate extends ActiveRecord {

    public static function tableName() {
        return '{{%offers_redaction_translate}}';
    }

}
