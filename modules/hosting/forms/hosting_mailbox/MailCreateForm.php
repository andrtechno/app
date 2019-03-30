<?php

namespace app\modules\hosting\forms\hosting_mailbox;

use Yii;

class MailCreateForm extends \panix\engine\base\Model {

    protected $module = 'hosting';
    public $mailbox;
    public $password;
    public $type = 'mailbox';
    public $forward;
    public $antispam = 'medium';
    public $autoresponder;
    public $autoresponder_title;
    public $autoresponder_text;

    public function rules() {
        return [
            [['mailbox', 'password'], "required"],
            //['type', 'in', 'range' => $this->getTypeArray()],
            //['antispam', 'in', 'range' => $this->getAntispamArray()],
            [['autoresponder_text', 'autoresponder_title', 'forward', 'type', 'antispam'], 'string'],
            [['password'], 'string', 'min' => 8],
            ['mailbox', 'email'],
            ['autoresponder', 'boolean']
        ];
    }

    public function getTypeArray() {
        return [
            'mailbox' => 'mailbox - стандартный почтовый ящик',
            'redirect' => 'redirect - вся почта будет перенаправляться с новосозданного ящика на почтовые ящики',
            'copy' => 'copy - стандартный почтовый ящик с функцией перенаправления почты',
        ];
    }

    public function getAntispamArray() {
        return [
            'off' => 'off - антиспам отключен',
            'low' => 'low - низкий уровень защиты от спама',
            'medium' => 'medium - средний уровень защиты',
            'high ' => 'high - высокий уровень защиты',
        ];
    }

}
