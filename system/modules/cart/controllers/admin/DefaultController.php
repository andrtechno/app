<?php

namespace app\system\modules\cart\controllers\admin;

use Yii;
use app\system\modules\cart\models\Pages;
use app\system\modules\cart\models\PagesSearch;
use panix\engine\controllers\AdminController;
use panix\engine\grid\sortable\SortableGridAction;

class DefaultController extends AdminController {

    public function actions() {
        return [
            'dnd_sort' => [
                'class' => SortableGridAction::className(),
                'modelName' => Pages::className(),
                ],
        ];
    }

    public function actionIndex() {
        $this->pageName = Yii::t('pages/default', 'MODULE_NAME');
        $this->buttons = [
            [
                'label' => '<i class="fa fa-plus fa-fw"></i>' . Yii::t('pages/default', 'CREATE_BTN'),
                'url' => ['create'],
                'options' => ['class' => 'btn btn-success']
            ]
        ];
        $this->breadcrumbs = [
            $this->pageName
        ];

        $searchModel = new PagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]);
    }

    public function actionUpdate($id) {
        $this->pageName = Yii::t('pages/default', 'CREATE_BTN');
        $this->buttons = [
            [
                'label' => '<i class="fa fa-plus fa-fw"></i>' . Yii::t('pages/default', 'CREATE_BTN'),
                'url' => ['create'],
                'options' => ['class' => 'btn btn-success']
            ]
        ];
        $this->view->params['breadcrumbs'][] = [
            'label' => Yii::t('pages/default', 'MODULE_NAME'),
            'url' => ['index']
        ];
        $this->view->params['breadcrumbs'][] = $this->pageName;





        $model = $this->findModel($id);
        //$model->setScenario("admin");
        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->validate()) {
            $model->save();
            Yii::$app->session->addFlash('success', \Yii::t('app', 'SUCCESS_CREATE'));
            // return $this->redirect(['index']);
            return Yii::$app->getResponse()->redirect(['/admin/pages']);
        }
        return $this->render('update', [
                    'model' => $model,
                ]);
    }

    public function actionCreate() {
        $this->pageName = Yii::t('pages/default', 'CREATE_BTN');
        $this->buttons = [
            [
                'label' => '<i class="fa fa-plus fa-fw"></i>' . Yii::t('pages/default', 'CREATE_BTN'),
                'url' => ['create'],
                'options' => ['class' => 'btn btn-success']
            ]
        ];
        $this->view->params['breadcrumbs'][] = [
            'label' => Yii::t('pages/default', 'MODULE_NAME'),
            'url' => ['index']
        ];
        $this->view->params['breadcrumbs'][] = $this->pageName;
        $model = Yii::$app->getModule("pages")->model("Pages");
        //$model->setScenario("admin");


        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->validate()) {
            $model->save();
            Yii::$app->session->addFlash('success', \Yii::t('app', 'SUCCESS_CREATE'));
            // return $this->redirect(['index']);
            return Yii::$app->getResponse()->redirect(['/admin/pages/index']);
        }
        return $this->render('create', [
                    'model' => $model,
                ]);
    }

    protected function findModel($id) {
        $model = Yii::$app->getModule("pages")->model("Pages");
        if (($model = $model::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
