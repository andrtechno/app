<?php

namespace app\modules\portfolio\controllers\admin;

use Yii;
use panix\engine\controllers\AdminController;
use panix\mod\shop\models\forms\SettingsForm;

class SettingsController extends AdminController {

    public function actionIndex() {
        $this->pageName = Yii::t('app', 'SETTINGS');
        $this->breadcrumbs = [
            [
                'label' => $this->module->info['label'],
                'url' => $this->module->info['url'],
            ],
            $this->pageName
        ];
        $model = new SettingsForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return Yii::$app->getResponse()->redirect(['/admin/shop/settings']);
        }
        return $this->render('index', [
                    'model' => $model
        ]);
    }

}
