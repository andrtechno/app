<?php

namespace app\modules\hosting\components;

use Yii;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\base\InvalidParamException;

class Api {

    public $response;

    public function __construct($class, $method, $config = array(), $response_format = false) {
        $language = Yii::$app->language;
        $api_config = Yii::$app->settings->get('hosting');


        if (isset($config['account'])) {
            
            
            //if ($config['account']) {
                if(!is_string($config['account'])){
                    $config['account']=false;
                }
           // }
        }else{
                if (isset($api_config['account'])) {
                    $config['account'] = $api_config['account'];
                }
        }




        $ch = curl_init('https://adm.tools/api.php');

        curl_setopt_array($ch, [
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => ["Content-Type: application/json; charset={$language}"],
            CURLOPT_POSTFIELDS => Json::encode(ArrayHelper::merge([
                        'auth_login' => $api_config['auth_login'],
                        'auth_token' => $api_config['auth_token'],
                        'class' => $class,
                        'method' => $method,
                            //'stack' => ['data']
                            ], $config))
        ]);

        $this->response = Json::decode(curl_exec($ch), $response_format);
       /* if ($response_format) {
            if ($this->response['status'] == 'error') {
                throw new InvalidParamException($this->response['message']);
            }
        } else {
            if ($this->response->status == 'error') {
                throw new InvalidParamException($this->response->message);
            }
        }*/

        curl_close($ch);
    }

}
