<?php

namespace app\modules\hosting\controllers\admin;

use Yii;
use yii\base\Exception;
use app\modules\hosting\components\Api;
use app\modules\hosting\forms\hosting_database\DatabaseCreateForm;
use app\modules\hosting\forms\hosting_database\UserPasswordForm;
use app\modules\hosting\forms\hosting_database\UserPrivilegesForm;

class HostingdatabaseController extends CommonController {

    public function actionIndex() {
        return $this->render('index');
    }
    /**
     * Возвращает информацию о базах данных аккаунта.
     * 
     * @return type
     */
    public function actionInfo() {
        $this->buttons[] = [
            'label' => Yii::t('hosting/default', 'BTN_DATABASE_CREATE'),
            'url' => ['database-create']
        ];
        $api = new Api('hosting_database', 'info');
        if ($api->response->status == 'success') {
            return $this->render('info', ['response' => $api->response->data]);
        } else {
            Yii::$app->session->setFlash('danger', $api->response->message);
            
        }
    }
    /**
     * Создание базы данных.
     * 
     * @return type
     */
    public function actionDatabaseCreate() {
        $model = new DatabaseCreateForm();
        $response = false;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $api = new Api('hosting_database', 'database_create', [
                'name' => $model->name,
                'collation' => $model->collation,
                'user_create' => $model->user_create
            ]);
            if ($api->response->status == 'success') {
                $response = $api->response->data;
                Yii::$app->session->setFlash('success', Yii::t('hosting/default', 'SUCCESS_DATABASE_CREATE', ['db' => $model->name]));
            }else{
                Yii::$app->session->setFlash('danger', $api->response->message);

                $model->addError('name', $api->response->message);
            }
        }
        return $this->render('database_create', ['model' => $model, 'response' => $response]);
    }

    /**
     * Смена пароля пользователя базы данных.
     * 
     * @return type
     */
    public function actionUserPassword() {
        $model = new UserPasswordForm();
        $response = false;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $api = new Api('hosting_database', 'user_password', [
                'user' => Yii::$app->request->get('user'),
                'password' => $model->password,
            ]);
            if ($api->response->status == 'success') {
                $response = $api->response->data;
                Yii::$app->session->setFlash('success', Yii::t('hosting/default', 'SUCCESS_DATABASE_USERPASSWORD_UPDATE'));
            } else {
                Yii::$app->session->setFlash('danger', $api->response->message);
                $model->addError('password', $api->response->message);
            }
        }
        return $this->render('user_password', ['model' => $model, 'response' => $response]);
    }

    /**
     * Изменение привилегий доступа пользователя базы данных к соответствующей базе данных.
     * 
     * @return type
     */
    public function actionUserPrivileges() {
        $model = new UserPrivilegesForm();
        $response = false;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $api = new Api('hosting_database', 'user_privileges', [
                'user' => $model->user,
                'database' => $model->database,
                'privileges' => $model->privileges,
            ]);
            if ($api->response->status == 'success') {
                $response = $api->response->data;
                Yii::$app->session->setFlash('success', Yii::t('hosting/default', 'SUCCESS_DATABASE_USERPRIVILEGES_UPDATE', ['user' => $model->user]));
            } else {
                Yii::$app->session->setFlash('danger', $api->response->message);
                $model->addError('user', ($api->response->message));
            }
        }
        return $this->render('user_privileges', ['model' => $model, 'response' => $response]);
    }

    /**
     * Удаление базы данных.
     * 
     * @return type
     */
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

    /**
     * Удаление пользователя базы данных и всех его привилегий.
     * 
     * @return type
     */
    public function actionUserDelete() {
        if (Yii::$app->request->get('user')) {
            $api = new Api('hosting_database', 'user_delete', [
                'user' => Yii::$app->request->get('user'),
            ]);
            if ($api->response->status == 'success') {
                Yii::$app->session->setFlash('success', Yii::t('hosting/default', 'SUCCESS_DATABASE_USER_DELETE', ['user' => Yii::$app->request->get('user')]));
            } else {
                Yii::$app->session->setFlash('danger', $api->response->message);
            }
        }
        return $this->redirect(['/admin/hosting/hostingdatabase/info']);
    }

}
