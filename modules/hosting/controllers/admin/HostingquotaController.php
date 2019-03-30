<?php

namespace app\modules\hosting\controllers\admin;

use app\modules\hosting\components\Api;
use yii\base\Exception;

class HostingquotaController extends CommonController {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionInfo() {
        $api = new Api('hosting_quota', 'info');
        if ($api->response->status == 'success') {
            return $this->render('info', ['response' => $api->response->data]);
        } else {
            throw new Exception($api->response->message);
        }
    }

    public function actionUsedFtp() {
        $api = new Api('hosting_quota', 'used_ftp');
        if ($api->response->status == 'success') {
            return $this->render('used_ftp', ['response' => $api->response->data]);
        } else {
            throw new Exception($api->response->message);
        }
    }

    public function actionUsedMysql() {
        $api = new Api('hosting_quota', 'used_mysql');
        if ($api->response->status == 'success') {
            return $this->render('used_mysql', ['response' => $api->response->data]);
        } else {
            throw new Exception($api->response->message);
        }
    }

}
