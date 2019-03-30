<?php
namespace app\modules\seo\models;
use Yii;
use app\modules\seo\models\SeoParams;
class SeoUrl extends \panix\engine\db\ActiveRecord {


    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return '{{%seo_url}}';
    }

    public function defaultScope() {
        return array(
            'order' => 'id DESC'
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return [
            ['url', 'required'],
           // ['url', 'UniqueAttributesValidator', 'with' => 'url'],
            [['title', 'description', 'keywords', 'text'], 'string'],
            ['title', 'string', 'max' => 150],
        ];
    }


    public function getParams() {
        return $this->hasMany(SeoParams::className(), ['url_id' => 'id']);
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'url' => Yii::t('seo/default', 'URL'),
            'text' => Yii::t('seo/default', 'TEXT'),
            'keywords' => Yii::t('seo/default', 'KEYWORDS'),
            'description' => Yii::t('seo/default', 'DESCRIPTION'),
            'title' => Yii::t('seo/default', 'TITLE'),
        );
    }



}
