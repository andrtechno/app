<?php

namespace app\modules\hosting\controllers\admin;

use Yii;
use yii\base\Exception;
use app\modules\hosting\components\Api;


class HostingaccountController extends CommonController {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionInfo() {
        if (Yii::$app->request->get('account')) {
            $account = Yii::$app->request->get('account');
        } else {
            $account = false;
        }
        $api = new Api('hosting_account', 'info', ['account' => $account]);
        if ($api->response->status == 'success') {
            return $this->render('info', ['response' => $api->response->data]);
        } else {
            throw new Exception($api->response->message);
        }
    }

    public function actionPlans() {
        $api = new Api('hosting_account', 'plans');
        if ($api->response->status == 'success') {
            return $this->render('plans', ['response' => $api->response->data]);
        } else {
            throw new Exception($api->response->message);
        }
    }

}
