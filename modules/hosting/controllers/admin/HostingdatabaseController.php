<?php

namespace app\modules\hosting\controllers\admin;

use Yii;
use yii\base\Exception;
use app\modules\hosting\components\Api;
use app\modules\hosting\forms\hosting_database\CreateForm;

class HostingdatabaseController extends CommonController {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionInfo() {

        $this->buttons[] = [
            'label' => Yii::t('hosting/default', 'BTN_DATABASE_CREATE'),
            'url' => ['database-create']
        ];
        $api = new Api('hosting_database', 'info');
        if ($api->response->status == 'success') {
            return $this->render('info', ['response' => $api->response->data]);
        } else {
            throw new Exception($api->response->message);
        }
    }

    public function actionDatabaseCreate() {
        $model = new CreateForm();
        $response = false;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $api = new Api('hosting_database', 'database_create', [
                'name' => $model->name,
                'collation' => $model->collation,
                'user_create' => $model->user_create
            ]);
            if ($api->response->status == 'success') {
                $response = $api->response->data;
                Yii::$app->session->setFlash('success', Yii::t('hosting/default', 'SUCCESS_DATABASE_CREATE', ['db' => $api->response->data->user->login]));
            }
        }
        return $this->render('database_create', ['model' => $model, 'response' => $response]);
    }

    public function actionDatabaseDelete() {
        if (Yii::$app->request->get('database')) {
            $api = new Api('hosting_database', 'database_delete', [
                'database' => Yii::$app->request->get('database'),
            ]);
            if ($api->response->status == 'success') {
                Yii::$app->session->setFlash('success', Yii::t('hosting/default', 'SUCCESS_DATABASE_DELETE', ['db' => $api->response->data[0]]));
            } else {
                Yii::$app->session->setFlash('danger', 'error databse_create');
            }
        }
        return $this->redirect(['/admin/hosting/hostingdatabase/info']);
    }

}
