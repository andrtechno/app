<?php

namespace app\modules\hosting\forms\hosting_site;

use Yii;
use app\modules\hosting\components\Api;

class HostCreateForm extends \panix\engine\base\Model {

    protected $module = 'hosting';
    public $site;
    public $subdomain;

    public function rules() {
        return [
            [['site', 'subdomain'], "required"],
            [['site', 'subdomain'], 'string'],
            [['subdomain'], 'validateSubdomain'],
        ];
    }

    public function validateSubdomain($attribute) {
        $api = new Api('hosting_site', 'info', ['site' => $this->site]);
        if ($api->response->status == 'success') {
            $domains = [];
            foreach ($api->response->data->{$this->site}->hosts as $subdomain => $data) {
                $domains[] = $subdomain;
            }
            if (in_array($this->$attribute, $domains)) {
                $this->addError($attribute, 'Такой поддомен уже есть');
            }
        }
    }

    /**
     * Получаем список сайтов для dropDownList
     * @return array
     */
    public function getSiteList() {
        $api = new Api('hosting_site', 'info');
        $result = [];
        if ($api->response->status == 'success') {
            foreach (array_keys((array) $api->response->data) as $data) {
                $result[$data] = $data;
            }
        }
        return $result;
    }

}
