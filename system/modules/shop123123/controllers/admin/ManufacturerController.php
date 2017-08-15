<?php

namespace app\system\modules\shop\controllers\admin;

use Yii;
use app\system\modules\shop\models\ShopManufacturer;
use app\system\modules\shop\models\search\ShopManufacturerSearch;
use panix\engine\controllers\AdminController;
use panix\engine\grid\sortable\SortableGridAction;

class ManufacturerController extends AdminController {

    public function actions() {
        return [
            'dnd_sort' => [
                'class' => SortableGridAction::className(),
                'modelName' => ShopManufacturer::className(),
            ],
        ];
    }
public function actionActive($id)
{
    $model = $this->findModel($id);
    if ($model->switch == 0) $model->switch = 1;
    else $model->switch = 0;

    if (!$model->save()) {
        Yii::$app->session->addFlash("error", "Error saving");
    }
    $model->refresh();

    if (Yii::$app->request->isAjax) { // Render the index view
        return $this->actionIndex();
    }
    else return $this->redirect(['manufacturer/index']);
}
    public function actionIndex() {
        $this->pageName = Yii::t('shop/admin', 'MANUFACTURER');
        $this->buttons = [
            [
                'label' => '<i class="icon-add"></i> ' . Yii::t('shop/admin', 'CREATE_MANUFACTURER'),
                'url' => ['create'],
                'options' => ['class' => 'btn btn-success']
            ]
        ];
        $this->breadcrumbs = [
            $this->pageName
        ];

        $searchModel = new ShopManufacturerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
        ]);
    }

    public function actionUpdate($id = false) {

        
        if ($id === true) {
            $model = Yii::$app->getModule("shop")->model("ShopManufacturer");
        } else {
            $model = $this->findModel($id);
        }


        $this->pageName = Yii::t('shop/admin', 'MANUFACTURER');
        $this->buttons = [
            [
                'label' => '<i class="icon-add"></i> ' . Yii::t('shop/admin', 'CREATE_MANUFACTURER'),
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
            return Yii::$app->getResponse()->redirect(['/admin/shop/manufacturer']);
        }

        echo $this->render('update', [
                    'model' => $model,
        ]);
    }

 

    protected function findModel($id) {
        $model = Yii::$app->getModule("shop")->model("ShopManufacturer");
        if (($model = $model::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
