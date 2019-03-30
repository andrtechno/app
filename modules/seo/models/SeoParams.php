<?php
namespace app\modules\seo\models;
/**
 * This is the model class for table "yiiseo_main".
 *
 * The followings are the available columns in table 'yiiseo_main':
 * @property integer $id
 * @property integer $url
 * @property string $name
 * @property string $content
 * @property string $param
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property YiiseoUrl $url0
 */
class SeoParams extends \yii\db\ActiveRecord {


    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return '{{%seo_params}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('url_id, name, content, active', 'required'),
            array('url_id, active', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            array('param', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, url_id, name, content, param, active', 'safe', 'on' => 'search'),
        );
    }



    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'url_id' => 'Url',
            'name' => 'Name',
            'content' => 'Content',
            'param' => 'Param',
            'active' => 'Active',
        );
    }



}
