<?php

namespace app\modules\seo\components;

use Yii;
use yii\db\ActiveRecord;
use app\modules\seo\models\SeoMain;
use app\modules\seo\models\SeoUrl;

class SeoBehavior extends \yii\base\Behavior {

    /**
     * @var string model primary key attribute
     */
    public $pk = 'id';

    /**
     * @var string attribute name to present comment owner in admin panel. e.g: name - references to Page->name
     */
    public $url;

    /**
     * @return string pk name
     */
    public function getObjectPk() {
        return $this->pk;
    }

    public function attach($owner) {
        parent::attach($owner);
    }

    public function events() {
        return [
            ActiveRecord::EVENT_AFTER_DELETE => 'afterDelete',
            ActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
        ];
    }

    public function afterSave() {
        if (!Yii::$app instanceof \yii\console\Application) {
            $owner = $this->owner;
            if ($owner->isNewRecord) {
                $seo = new SeoUrl;
            } else {


                $seo = SeoUrl::find()->where(['url' => Yii::$app->urlManager->createUrl($owner->getUrl())])->one();
                if (!$seo) {
                    $seo = new SeoUrl;
                }
            }
            $seo->attributes = Yii::$app->request->post('SeoUrl');
            $seo->url = Yii::$app->urlManager->createUrl($owner->getUrl());
            $seo->save(false);
            return true;
        }
    }

    /**
     * @return mixed
     */
    public function afterDelete() {
        SeoUrl::deleteAll(['url' => Yii::$app->urlManager->createUrl($this->url)]);
        return true;
    }

}
