<?php

namespace app\modules\hosting\forms\hosting_ftp;

use Yii;
use app\modules\hosting\components\Api;

class AccessEditForm extends \panix\engine\base\Model {

    protected $module = 'hosting';
    public $account;
    public $ip;
    public $active;
    public $web_ftp;

    public function init() {
        $api = new Api('hosting_ftp', 'access_info', ['account' => $this->account]);
        $ips = [];
        if ($api->response->status == 'success') {
           
            if(isset($api->response->data->stack)){
                foreach($api->response->data->stack as $stack){
                     $ips[] = $stack->ip;
                }
                $this->ip = implode(',',$ips);
            }


            $this->active = $api->response->data->active;
            $this->web_ftp = $api->response->data->web_ftp;
        }
        parent::init();
    }

    public function rules() {
        return [
            [['account'], 'required'],
            [['active', 'web_ftp'], 'boolean'],
            ['account', 'string', 'max' => 16 - strlen(Yii::$app->settings->get('hosting', 'account')) - 1],
            ['ip', 'string'],
        ];
    }

    public function getAccounts() {
        $api = new Api('hosting_account', 'info', ['account' => false]);
        $result = [];
        if ($api->response->status == 'success') {
            foreach ($api->response->data as $data) {
                $result[$data->login] = $data->login;
            }
        }
        return $result;
    }

}
