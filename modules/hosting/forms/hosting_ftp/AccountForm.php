<?php

namespace app\modules\hosting\forms\hosting_ftp;

use Yii;
use app\modules\hosting\components\Api;

class AccountForm extends \panix\engine\base\Model {

    protected $module = 'hosting';
    public $account;

    public function rules() {
        return [
            [['account'], "required"],
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
