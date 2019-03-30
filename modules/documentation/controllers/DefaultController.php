<?php

namespace app\modules\documentation\controllers;

use app\modules\documentation\models\Documentation;
use app\modules\documentation\models\DocumentationSearch;
use panix\engine\controllers\WebController;
use Yii;

class DefaultController extends WebController
{

    public function actionSuggestTags()
    {
        if (isset($_GET['q']) && ($keyword = trim($_GET['q'])) !== '') {
            $tags = Tag::model()->suggestTags($keyword);
            if ($tags !== array())
                echo implode("\n", $tags);
        }
    }

    /**
     * @var ShopProduct
     */
    public $query;

    /**
     * @var Documentation
     */
    public $model;

    /**
     * @var ActiveDataProvider
     */
    public $provider;

    public function actionIndex()
    {

        $searchModel = new DocumentationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView($seo_alias)
    {

        $this->findModel($seo_alias);


        $this->pageName = Yii::t('documentation/default', 'MODULE_NAME');

        //$ancestors = $this->model->excludeRoot()->ancestors()->findAll();
        //$this->breadcrumbs = array(Yii::t('documentation/default', 'MODULE_NAME') => array('/documentation'));
        //foreach ($ancestors as $c)
        //    $this->breadcrumbs[$c->name] = $c->getUrl();

        //$this->breadcrumbs[] = $this->model->name;


        return $this->render('view', ['model' => $this->model]);
    }



    protected function findModel($url) {
       // $url = str_replace('documentation/', '', $url);
        $model = new Documentation;
        if (($this->model = $model::find()->where(['full_path' => $url])->one()) !== null) {
            return $this->model;
        } else {
            $this->error404();
        }
    }

}
