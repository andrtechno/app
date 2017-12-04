<?php

/**
 * Class to access news translations
 *
 * @property int $id
 * @property int $object_id
 * @property int $language_id
 * @property string $title
 * @property string $short_text
 * @property string $full_text
 */
class ProjectsModules extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{projects_modules}}';
    }
    public function relations() {
        return array(
            'project' => array(self::HAS_ONE, 'ModulesList', 'id'),
 
        );
    }
}