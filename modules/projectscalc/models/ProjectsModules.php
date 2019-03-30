<?php

namespace app\modules\projectscalc\models;

class ProjectsModules extends \yii\db\ActiveRecord {

    public static function tableName() {
        return '{{%projects_modules}}';
    }

    public function relations() {
        return array(
            'project' => array(self::HAS_ONE, 'ModulesList', 'id'),
        );
    }

}
