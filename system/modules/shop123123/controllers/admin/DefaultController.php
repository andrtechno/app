<?php

namespace app\system\modules\shop\controllers\admin;

use Yii;
use app\system\modules\shop\models\ShopProduct;
use app\system\modules\shop\models\search\ShopProductSearch;
use panix\engine\controllers\AdminController;
use panix\engine\grid\sortable\SortableGridAction;

class DefaultController extends AdminController {

    public function actions() {
        return [
            'dnd_sort' => [
                'class' => SortableGridAction::className(),
                'modelName' => ShopProduct::className(),
            ],
        ];
    }

    public function actionIndex() {
        $this->pageName = Yii::t('shop/admin', 'PRODUCTS');
        $this->buttons = [
            [
                'label' => '<i class="icon-add"></i> ' . Yii::t('shop/admin', 'CREATE_PRODUCT'),
                'url' => ['create'],
                'options' => ['class' => 'btn btn-success']
            ]
        ];
        $this->breadcrumbs = [
            $this->pageName
        ];

        $searchModel = new ShopProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
        ]);
    }

    public function actionUpdate($id = false) {

        
        if ($id === true) {
            $model = Yii::$app->getModule("shop")->model("ShopProduct");
        } else {
            $model = $this->findModel($id);
        }


        $this->pageName = Yii::t('shop/default', 'MODULE_NAME');
        $this->buttons = [
            [
                'label' => '<i class="icon-add"></i> ' . Yii::t('shop/admin', 'CREATE_PRODUCT'),
                'url' => ['create'],
                'options' => ['class' => 'btn btn-success']
            ]
        ];
        $this->breadcrumbs[] = [
            'label' => $this->pageName,
            'url' => ['index']
        ];
        $this->breadcrumbs[] = [
            'label' => Yii::t('shop/admin', 'PRODUCTS'),
            'url' => ['index']
        ];
        $this->breadcrumbs[] = Yii::t('app','UPDATE');

        
        //$model->setScenario("admin");
        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->validate()) {
            $model->save();
            Yii::$app->session->addFlash('success', \Yii::t('app', 'SUCCESS_CREATE'));
            return Yii::$app->getResponse()->redirect(['/admin/shop']);
        }

        echo $this->render('update', [
                    'model' => $model,
        ]);
    }

 

    protected function findModel($id) {
        $model = Yii::$app->getModule("shop")->model("ShopProduct");
        if (($model = $model::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
