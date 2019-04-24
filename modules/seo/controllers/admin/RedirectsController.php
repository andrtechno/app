<?php

namespace app\modules\seo\controllers\admin;

use Yii;
use panix\engine\Html;
use app\modules\seo\models\Redirects;
use app\modules\seo\models\search\RedirectsSearch;
use panix\engine\controllers\AdminController;

class RedirectsController extends AdminController
{

    public function actions()
    {
        return [
            'delete' => [
                'class' => 'panix\engine\actions\DeleteAction',
                'modelClass' => Redirects::class,
            ],
            'switch' => array(
                'class' => 'ext.adminList.actions.SwitchAction',
            ),
        ];
    }

    public function actionIndex()
    {
        $this->pageName = Yii::t('seo/default', 'REDIRECTS');


        $this->breadcrumbs[] = [
            'label' => $this->module->info['label'],
            'url' => $this->module->info['url'],
        ];


        $this->breadcrumbs[] = $this->pageName;


        $this->buttons = [
            [
                'label' => Yii::t('seo/default', 'CREATE'),
                'url' => ['/admin/seo/redirects/create'],
                'options' => ['class' => 'btn btn-success']
            ]
        ];


        $searchModel = new RedirectsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);


    }

    /**
     * Create or update redirects
     * @param bool $id
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id=false)
    {


        $model = Redirects::findModel($id);

        $this->pageName = Yii::t('seo/default', 'REDIRECTS');

        $this->breadcrumbs[] = [
            'label' => $this->module->info['label'],
            'url' => $this->module->info['url'],
        ];
        $this->breadcrumbs[] = $this->pageName;


        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', \Yii::t('app', 'SUCCESS_CREATE'));
            return Yii::$app->getResponse()->redirect(['/admin/seo/redirects']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);


    }


    /**
     * @param $id
     * @return Redirects|null|\yii\web\HttpException
     */
    protected function findModel($id)
    {
        if (($model = Redirects::findOne($id)) !== null) {
            return $model;
        } else {
            if (!$id)
                return new Redirects;
            $this->error404();
        }
    }

    public function getAddonsMenu()
    {
        return array(
            array(
                'label' => Yii::t('app', 'SETTINGS'),
                'url' => array('/admin/seo/settings'),
                'icon' => Html::icon('settings'),
            ),
            array(
                'label' => Yii::t('seo/default', 'REDIRECTS'),
                'url' => array('/admin/seo/redirects'),
                'icon' => Html::icon('refresh'),
            ),
        );
    }
}
