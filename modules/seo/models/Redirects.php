<?php

namespace app\modules\seo\models;

use Yii;
use panix\engine\db\ActiveRecord;

class Redirects extends ActiveRecord
{
    public $disallow_delete = [1];
    const MODULE_ID = 'seo';
    const route = '/seo/admin/default';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%redirects}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url_from'], 'unique'],
            [['url_from', 'url_to'], 'required'],
            //array('url_from', 'UniqueAttributesValidator', 'with' => 'url_from'),
            [['url_from', 'url_to'], 'string', 'max' => 255],
        ];
    }


}
