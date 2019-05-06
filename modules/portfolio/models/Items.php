<?php

namespace app\modules\portfolio\models;

use Yii;
use panix\engine\CMS;
use panix\engine\behaviors\TranslateBehavior;
use panix\mod\shop\models\Category;
use app\modules\portfolio\models\translate\ItemsTranslate;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Items extends \panix\engine\db\ActiveRecord {

    use traits\ItemsTrait;
    public $file;
    const route = '/admin/shop/default';
    const MODULE_ID = 'portfolio';

    public static function find() {
        return new query\ItemsQuery(get_called_class());
    }

    public static function getSort() {
        $sort = new \yii\data\Sort([
            'attributes' => [
                'date_create',
                'views',
                'added_to_cart_count',
                'price' => [
                    'asc' => ['price' => SORT_ASC],
                    'desc' => ['price' => SORT_DESC],
                ],
                'name' => [
                    'asc' => ['name' => SORT_ASC],
                    'desc' => ['name' => SORT_DESC],
                ],
            ],
        ]);
        return $sort;
    }

    public function getMainImageTitle() {
        if ($this->getImage())
            return ($this->getImage()->name) ? $this->getImage()->name : $this->name;
    }

    public function getMainImageUrl($size = false) {
        if ($this->getImage()) {

            if ($size) {
                return $this->getImage()->getUrl($size);
            } else {
                return $this->getImage()->getUrl();
            }
        } else {
            return CMS::placeholderUrl(array('size' => $size));
        }
    }

    public function renderGridImage() {
        return ($this->getImage()) ? Html::a(Html::img($this->getMainImageUrl("50x50"), ['alt' => $this->getMainImageTitle(), 'class' => 'img-thumbnail']), $this->getMainImageUrl(), ['title' => $this->name, 'data-fancybox' => 'gallery']) : Html::img($this->getMainImageUrl("50x50"), ['alt' => $this->getMainImageTitle(), 'class' => 'img-thumbnail']);
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%portfolio_item}}';
    }

    public function getUrl() {
        return ['/shop/default/view', 'slug' => $this->slug];
    }

    /* public function transactions() {
      return [
      self::SCENARIO_DEFAULT => self::OP_INSERT | self::OP_UPDATE,
      ];
      } */

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['file'], 'file', 'maxFiles' => 10],
            [['origin_name'], 'string', 'max' => 255],
            [['image'], 'image'],
            [['name', 'slug'], 'trim'],
            [['text'], 'string'],
            [['text'], 'default'], // установим ... как NULL, если они пустые
            [['name', 'slug'], 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['manufacturer_id', 'type_id', 'quantity', 'views', 'added_to_cart_count', 'ordern', 'category_id'], 'integer'],
            [['name', 'slug', 'full_description'], 'safe'],
                //  [['c1'], 'required'], // Attribute field
                // [['c1'], 'string', 'max' => 255], // Attribute field
        ];
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getTranslations() {
        return $this->hasMany(ItemsTranslate::className(), ['object_id' => 'id']);
    }


    public function afterDelete() {
        //  $this->removeImages();
        $image = $this->getImages();

        if ($image) {
            //get path to resized image
            $this->removeImages();
        }

        parent::afterDelete();
    }

    public function behaviors() {
        return ArrayHelper::merge([
                    'imagesBehavior' => [
                        'class' => \panix\mod\images\behaviors\ImageBehavior::className(),
                    ],
                    'translate' => [
                        'class' => TranslateBehavior::className(),
                        'translationAttributes' => [
                            'name',
                            'text'
                        ]
                    ],
                        ], parent::behaviors());
    }

}
