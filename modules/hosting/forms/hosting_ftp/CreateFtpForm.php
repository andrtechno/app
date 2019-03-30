<?php

namespace app\modules\hosting\forms\hosting_ftp;

use Yii;
use app\modules\hosting\components\Api;

class CreateFtpForm extends \panix\engine\base\Model {

    protected $module = 'hosting';
    public $account;
    public $login;
    public $password;
    public $homedir;
    public $readonly;

    public function rules() {
        return [
            [['account', 'login'], 'required'],
            [['readonly'], 'boolean'],
            [['account'], 'string', 'max' => 16 - strlen(Yii::$app->settings->get('hosting', 'account')) - 1],
            [['homedir','password'], 'string'],
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
