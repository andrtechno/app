<?php
namespace app\modules\seo\models;
use Yii;
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

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            //'seoMains' => array(self::HAS_MANY, 'SeoMain', 'url'),
            'params' => array(self::HAS_MANY, 'SeoParams', 'url_id'),
        );
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
