<?php

namespace app\modules\seo\controllers\admin;

use Yii;
use panix\engine\Html;
use app\modules\seo\models\SettingsForm;
use panix\engine\controllers\AdminController;

class SettingsController extends AdminController {

    public function actionIndex() {
        $this->pageName = Yii::t('app', 'SETTINGS');
        /* $this->breadcrumbs = array(
          Yii::t('seo/default', 'MODULE_NAME') => array('/admin/seo'),
          $this->pageName
          ); */

        $model = new SettingsForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            //$this->refresh();
        }
        return $this->render('index', ['model' => $model]);
    }

    public function getAddonsMenu() {
        return [
            [
                'label' => Yii::t('seo/default', 'REDIRECTS'),
                'url' => array('/admin/seo/redirects'),
                'icon' => Html::icon('refresh'),

            ],
        ];
    }

}
