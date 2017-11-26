<?php

namespace app\modules\hosting\controllers\admin;

use app\modules\hosting\components\Api;
use yii\base\Exception;

class HostingftpController extends CommonController {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionInfo() {
        $api = new Api('hosting_ftp', 'info', ['account' => 'corner2']);
        if ($api->response->status == 'success') {
            return $this->render('info', ['response' => $api->response->data]);
        } else {
            throw new Exception($api->response->message);
        }
    }

    public function actionAccessInfo() {
        $api = new Api('hosting_ftp', 'access_info', ['account' => 'corner2']);
        if ($api->response->status == 'success') {
            return $this->render('access_info', ['response' => $api->response->data]);
        } else {
            throw new Exception($api->response->message);
        }
    }

}
