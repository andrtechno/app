<?php

namespace app\modules\hosting\controllers\admin;

use app\modules\hosting\components\Api;
use yii\base\Exception;

class DomainController extends CommonController {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionCheck() {
        $api = new Api('dns_domain', 'check');
        if ($api->response->status == 'success') {
            return $this->render('check', ['response' => $api->response->data]);
        } else {
            throw new Exception($api->response->message);
        }
    }

    public function actionInfo() {
        $api = new Api('dns_domain', 'info');
        if ($api->response->status == 'success') {
            return $this->render('info', ['response' => $api->response->data]);
        } else {
            throw new Exception($api->response->message);
        }
    }

    public function actionZones() {
        $api = new Api('dns_domain', 'zones', ['available' => true]);
        if ($api->response->status == 'success') {
            return $this->render('zones', ['response' => $api->response->data]);
        } else {
            throw new Exception($api->response->message);
        }
    }

}
