<?php

namespace app\modules\projectscalc\controllers\admin;

use Yii;
use app\modules\projectscalc\models\ProjectsCalc;
use app\modules\projectscalc\models\search\ProjectsCalcSearch;

class DefaultController extends \panix\engine\controllers\AdminController {

    public function actionIndex() {

        $this->pageName = Yii::t('projectscalc/default', 'MODULE_NAME');
        $this->buttons = [
            [
                'icon' => 'icon-add',
                'label' => Yii::t('projectscalc/default', 'CREATE_BTN'),
                'url' => ['create'],
                'options' => ['class' => 'btn btn-success']
            ]
        ];
        $this->breadcrumbs = [
            $this->pageName
        ];

        $searchModel = new ProjectsCalcSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
        ]);
    }

    /**
     * Create or update new page
     * @param boolean $id
     */
    public function actionUpdate($id = false) {
        if ($id === true) {
            $model = new ProjectsCalc;
        } else {
            $model = $this->findModel($id);
        }
        
        $this->pageName = ($model->isNewRecord)?'New':$model->title;
                
        $this->breadcrumbs = [
            [
              'label'=>Yii::t('projectscalc/default', 'MODULE_NAME'),
                'url'=>['/admin/']
            ],
            $this->pageName
        ];

        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->validate()) {
            if (Yii::$app->request->post('mod')) {
                $model->setCategories(Yii::$app->request->post('mod'));
            }
            $model->setAddons();
            $model->save();
            if (Yii::$app->request->post('redirect', 1)) {
                Yii::$app->session->setFlash('success', \Yii::t('app', 'SUCCESS_CREATE'));
               // return Yii::$app->getResponse()->redirect(['/admin/projectscalc']);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function getAddonsMenu() {
        return [
            [
                'label' => Yii::t('app', 'Модули'),
                'url' => ['/admin/projectscalc/modules'],
            //'icon' => 'flaticon-settings',
            ]
        ];
    }

    protected function findModel($id) {
        $model = new ProjectsCalc;
        if (($model = $model::findOne($id)) !== null) {
            return $model;
        } else {
            $this->error404();
        }
    }

}
