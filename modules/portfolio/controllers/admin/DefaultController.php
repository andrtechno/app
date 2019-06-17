<?php

namespace app\modules\portfolio\controllers\admin;

use Yii;
use yii\helpers\Html;
use app\modules\portfolio\models\Items;
use app\modules\portfolio\models\search\ItemsSearch;
use panix\engine\controllers\AdminController;


class DefaultController extends AdminController {

    public $tab_errors = [];

    public function actions() {
        return [
            'sortable' => [
                'class' => \panix\engine\grid\sortable\Action::className(),
                'modelClass' => Items::className(),
            ],
            'delete' => [
                'class' => 'panix\engine\grid\actions\DeleteAction',
                'modelClass' => Items::className(),
            ],
        ];
    }

    public function actionIndex() {
        $this->pageName = Yii::t('shop/admin', 'PRODUCTS');
        $this->buttons = [
            [
                'icon' => 'add',
                'label' => Yii::t('shop/admin', 'CREATE_PRODUCT'),
                'url' => ['create'],
                'options' => ['class' => 'btn btn-success']
            ]
        ];
        $this->breadcrumbs = [
            $this->pageName
        ];

        $searchModel = new ItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
        ]);
    }

    public function actionUpdate($id = false) {


        if ($id === true) {
            $model = new Items;
        } else {
            $model = $this->findModel($id);
        }


        $this->pageName = Yii::t('shop/default', 'MODULE_NAME');


        if (!$model->isNewRecord) {
            $this->buttons[] = [
                'icon' => 'eye',
                'label' => Yii::t('shop/admin', 'VIEW_PRODUCT'),
                'url' => $model->getUrl(),
                'options' => ['class' => 'btn btn-info', 'target' => '_blank']
            ];
        }

        $this->buttons[] = [
            'icon' => 'add',
            'label' => Yii::t('shop/admin', 'CREATE_PRODUCT'),
            'url' => ['create'],
            'options' => ['class' => 'btn btn-success']
        ];

        $this->breadcrumbs[] = [
            'label' => $this->pageName,
            'url' => ['index']
        ];
        $this->breadcrumbs[] = [
            'label' => Yii::t('shop/admin', 'PRODUCTS'),
            'url' => ['index']
        ];
        $this->breadcrumbs[] = Yii::t('app', 'UPDATE');
        $post = Yii::$app->request->post();








        $title = ($model->isNewRecord) ? Yii::t('shop/admin', 'CREATE_PRODUCT') :
                Yii::t('shop/admin', 'UPDATE_PRODUCT');
        $this->pageName = $title;


        if ($model->load($post) && $model->validate()) {


            $model->save();


            $model->file = \yii\web\UploadedFile::getInstances($model, 'file');
            if ($model->file) {
                foreach ($model->file as $file) {
                    $uniqueName = \panix\engine\CMS::gen(10);
                    $file->saveAs('uploads/' . $uniqueName . '_' . $file->baseName . '.' . $file->extension);
                    $model->attachImage('uploads/' . $uniqueName . '_' . $file->baseName . '.' . $file->extension);
                }
            }

            Yii::$app->session->addFlash('success', \Yii::t('app', 'SUCCESS_CREATE'));
            if ($model->isNewRecord) {
                return Yii::$app->getResponse()->redirect(['/admin/portfolio']);
            } else {
                return Yii::$app->getResponse()->redirect(['/admin/portfolio/default/update', 'id' => $model->id]);
            }
        }

        echo $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Validate required shop attributes
     * @param Product $model
     * @return bool
     */

    protected function findModel($id) {
        $model = new Items;
        if (($model = $model::findOne($id)) !== null) {
            return $model;
        } else {
            $this->error404();
        }
    }

}
