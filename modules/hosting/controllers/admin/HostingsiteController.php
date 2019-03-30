<?php

namespace app\modules\hosting\controllers\admin;

use Yii;
use yii\base\Exception;
use app\modules\hosting\components\Api;
use app\modules\hosting\forms\hosting_site\HostCreateForm;

class HostingsiteController extends CommonController {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionInfo2() {
        $api = new Api('hosting_site', 'info', [], true);
        if ($api->response['status'] == 'success') {
            return $this->render('info', ['response' => $api->response['data']]);
        } else {
            throw new Exception($api->response->message);
        }
    }
    public function actionInfo() {
        $api = new Api('hosting_site', 'info');
        if ($api->response->status == 'success') {
            return $this->render('info', ['response' => $api->response->data]);
        } else {
            throw new Exception($api->response->message);
        }
    }
    

    public function actionHostCreate() {

        $model = new HostCreateForm();
        $response = false;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $params['site'] = $model->site;
            $params['subdomain'] = $model->subdomain;

            $api = new Api('hosting_site', 'host_create', $params);

            if ($api->response->status == 'success') {
                $response = $api->response->data;
                Yii::$app->session->setFlash('success', Yii::t('hosting/default', 'SUCCESS_HOST_CREATE', [
                            'site' => $model->site,
                            'subdomain' => $model->subdomain,
                ]));
            }
        }
        return $this->render('host_create', [
                    'model' => $model,
                    'response' => $response,
        ]);
    }

}
