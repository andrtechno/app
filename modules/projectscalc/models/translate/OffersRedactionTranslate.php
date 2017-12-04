<?php

/**
 * Class to access news translations
 *
 * @property int $id
 * @property int $object_id
 * @property int $language_id
 * @property string $text
 */
class OffersRedactionTranslate extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{offers_redaction_translate}}';
    }

}