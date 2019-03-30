<?php
/**
 * Class Gallery
 *
 * @author Serge Larin <serge.larin@gmail.com>
 * @link http://assayer.pro/
 * @copyright 2015 Assayer Pro Company
 * @license http://opensource.org/licenses/LGPL-3.0
 */


namespace assayerpro\sitemap\tests\unit;

use Yii;
use yii\helpers\Url;
use yii\helpers\Inflector;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @var string
     * @access public
     */
    public $route = '/gallery/default/index';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['id'], 'integer'],
            [['title'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'title' => 'Название',
        ];
    }

    public function getUrl()
    {
        return Url::to([
            $this->route,
            'id' => $this->id,
            'slug' => $this->slug,
        ]);
    }

    public function getSlug()
    {
        return strtolower(
            Inflector::slug(html_entity_decode($this->title), '-', true)
        );
    }
}
