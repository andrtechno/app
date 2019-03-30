<?php

namespace app\modules\hosting\controllers\admin;

use Yii;
use yii\base\Exception;
use app\modules\hosting\components\Api;
use app\modules\hosting\forms\hosting_ftp\AccountForm;
use app\modules\hosting\forms\hosting_ftp\CreateFtpForm;
use app\modules\hosting\forms\hosting_ftp\AccessEditForm;

class HostingftpController extends CommonController {



    /**
     * Возвращает информацию о FTP-пользователях.
     * @return type
     * @throws Exception
     */
    public function actionIndex() {
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
        return $this->render('index', ['model' => $model, 'response' => $response]);
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

    /**
     * Удаление FTP-пользователя.
     * @return redirect
     */
    public function actionDelete() {
        $api = new Api('hosting_ftp', 'delete', [
            'account' => Yii::$app->request->get('account'),
            'ftp' => Yii::$app->request->get('ftp'),
        ]);
        if ($api->response->status == 'success') {
            Yii::$app->session->setFlash('success', Yii::t('hosting/default', 'SUCCESS_FTP_DELETE', ['ftp' => Yii::$app->request->get('ftp')]));
        } else {
            Yii::$app->session->setFlash('danger', $api->response->message);
        }
        return $this->redirect(['/admin/hosting/hostingftp/info']);
    }
    
    /**
     * Редактирование настроек безопасности FTP.
     * @return type
     */
    public function actionAccessEdit() {
        $model = new AccessEditForm();
        $response = false;

        if (Yii::$app->request->get('account'))
            $model->account = Yii::$app->request->get('account');
        
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $api = new Api('hosting_ftp', 'access_edit', [
                'account' => $model->account,
                'ip' => explode(',',$model->ip),
                'active' => $model->active,
                'web_ftp' => $model->web_ftp,
            ]);
            if ($api->response->status == 'success') {
                $response = $api->response->data;
                Yii::$app->session->setFlash('success', Yii::t('app','SUCCESS_UPDATE'));
            } else {
                Yii::$app->session->setFlash('danger', $api->response->message);
                $model->addError('account', $api->response->message);
            }
        }
        return $this->render('access_edit', ['model' => $model, 'response' => $response]);
    }

}
