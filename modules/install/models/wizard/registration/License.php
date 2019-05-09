<?php
namespace app\modules\install\models\wizard\registration;

use Yii;
use yii\base\Model;

class License extends Model
{
    public $license_key;

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['license_key'], 'required']
        ];
    }


    public function validateLicense($attr) {
        Yii::app()->cache->flush();
        $data = LicenseCMS::run()->connected($this->$attr);
        if ($data['status'] == 'error') {
            $this->addError($attr, $data['message']);
        }
    }

    public function install() {
        Yii::$app->cache->flush();
        if ($this->hasErrors())
            return false;

        return true;
    }
}
