<?php

namespace app\modules\hosting\controllers\admin;

use Yii;
use yii\base\Exception;
use app\modules\hosting\components\Api;
use app\modules\hosting\forms\hosting_ftp\AccountForm;
use app\modules\hosting\forms\hosting_ftp\CreateFtpForm;

class HostingftpController extends CommonController {

    public function actionIndex() {
        $this->buttons[] = [
            'label' => Yii::t('hosting/default', 'BTN_FTP_CREATE'),
            'url' => ['create']
        ];
        return $this->render('index');
    }

    /**
     * Возвращает информацию о FTP-пользователях.
     * @return type
     * @throws Exception
     */
    public function actionInfo() {
        $this->buttons[] = [
            'label' => Yii::t('hosting/default', 'BTN_FTP_CREATE'),
            'url' => ['create']
        ];
        $model = new AccountForm();
        $response = false;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $api = new Api('hosting_ftp', 'info', ['account' => $model->account]);
            if ($api->response->status == 'success') {
                $response = $api->response->data;
            } else {
                Yii::$app->session->setFlash('danger', $api->response->message);
                $model->addError('account', $api->response->message);
            }
        }
        return $this->render('info', ['model' => $model, 'response' => $response]);
    }

    /**
     * Возвращает информацию о настройках безопасности FTP.
     * @return type
     */
    public function actionAccessInfo() {
        $api = new Api('hosting_ftp', 'access_info', ['account' => 'corner']);
        $response = false;
        if ($api->response->status == 'success') {
            $response = $api->response->data;
        } else {
            Yii::$app->session->setFlash('danger', $api->response->message);
        }
        return $this->render('access_info', ['response' => $response]);
    }

    /**
     * Создание нового FTP-пользователя.
     * @return type
     */
    public function actionCreate() {

        $model = new CreateFtpForm();
        $response = false;

        if (Yii::$app->request->get('account'))
            $model->account = Yii::$app->request->get('account');
        if (Yii::$app->request->get('login'))
            $model->login = Yii::$app->request->get('login');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $api = new Api('hosting_ftp', 'create', [
                'account' => $model->account,
                'login' => $model->login,
                'password' => $model->password,
                'homedir' => $model->homedir,
                'readonly' => $model->readonly,
            ]);
            if ($api->response->status == 'success') {
                $response = $api->response->data;
            } else {
                Yii::$app->session->setFlash('danger', $api->response->message);
                $model->addError('account', $api->response->message);
            }
        }
        return $this->render('create', ['model' => $model, 'response' => $response]);
    }

}
