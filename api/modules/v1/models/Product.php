<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop__product}}';
    }
    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['id'];
    }
    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['code', 'name', 'population'], 'required']
        ];
    }
}