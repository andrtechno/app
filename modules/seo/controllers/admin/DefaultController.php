<?php

namespace app\modules\seo\controllers\admin;

use Yii;
use panix\engine\Html;
use app\modules\seo\models\SeoUrl;
use app\modules\seo\models\search\SeoUrlSearch;
use app\modules\seo\models\SeoParams;
class DefaultController extends \panix\engine\controllers\AdminController {

    public function actions() {
        return array(
            'delete' => array(
                'class' => 'ext.adminList.actions.DeleteAction',
            ),
        );
    }
    /**
     * Manages all models.
     */
    public function actionIndex() {
        $this->pageName = Yii::t('seo/default', 'MODULE_NAME');
        $this->buttons = [
            [
                'label' => Yii::t('seo/default', 'CREATE'),
                'url' => ['/admin/seo/default/create'],
                'options' => ['class' => 'btn btn-success']
            ]
        ];



        $this->breadcrumbs[] = [
            'label' => $this->module->info['label'],
            'url' => $this->module->info['url'],
        ];


        $this->breadcrumbs[] = $this->pageName;



        $searchModel = new SeoUrlSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionCreate() {
        $model = new SeoUrl;
        $this->pageName = Yii::t('app', 'CREATE', 1);



        if (isset($_POST['SeoUrl'])) {
            $model->attributes = $_POST['SeoUrl'];
            if ($model->save()) {
                /* save MetaName */
                if (isset($_POST['SeoMain'])) {
                    $items = $_POST['SeoMain'];
                    foreach ($items as $name => $item) {
                        $mod = new SeoMain();
                        $mod->name = $name;
                        $mod->url = $model->id;
                        $mod->attributes = $item;
                        $mod->save();
                    }
                }

                return $this->redirect(["index"]);
            }
        }

        return $this->render('create', array(
                    'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $this->pageName = Yii::t('app', 'UPDATE', 0);
        if (isset($_POST['SeoUrl'])) {
            $model->attributes = $_POST['SeoUrl'];
            /* update url */
            if ($model->save()) {

                /* save or update MetaName */
                if (isset($_POST['SeoMain'])) {

                    $items = $_POST['SeoMain'];
                    foreach ($items as $name => $item) {

                        if (isset($item['id'])) {
                            $mod = SeoMain::model()->findByPk($item['id']);
                        } else {

                            $mod = new SeoMain();
                            $mod->name = $name;
                            $mod->url = $model->id;
                        }

                        $mod->attributes = $item;
                        $mod->save(false, false);
                    }
                }

                $this->saveParams($model);



                return $this->redirect(array("index"));
            }
        }

        return $this->render('update', array(
                    'model' => $model,
        ));
    }

    protected function saveParams($model) {
        $dontDelete = array();

        if (!empty($_POST['param'])) {
            foreach ($_POST['param'] as $main_id => $object) {
                // echo '<pre>'.CVarDumper::dumpAsString($object).'</pre>';


                $i = 0;
                foreach ($object as $key => $item) {
                    $ex = explode('|',$item);
                    $variant = SeoParams::find()->where(array(
                        'url_id' => $main_id,
                        'param' => $item,
                        //'obj' => $key,
                        'modelClass'=>$ex[0]
                    ))->one();
                    // If not - create new.
                    if (!$variant)
                        $variant = new SeoParams();

                    $variant->setAttributes(array(
                        'url_id' => $main_id,
                        'param' => $item,
                       // 'obj' => $key,
                        'modelClass'=>$ex[0]
                            ), false);

                    $variant->save(false);
                    array_push($dontDelete, $variant->id);
                    $i++;
                }


                if (!empty($dontDelete)) {
         
                    
                    SeoParams::deleteAll(
                            ['AND', 'url_id=:id',['NOT IN', 'id', $dontDelete]], [':id' => $main_id]);
                } else{

                    SeoParams::find()->where(['url_id'=>$main_id])->deleteAll();
                }
            }
        }
        //   die;
    }


    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = SeoUrl::findOne($id);

        if ($model === null)
            $this->error404();
        return $model;
    }

    /**
     * Получение списка всех моделей в проекте
     */
    public function getModels() {
        $file_list = [];
        //путь к директории с проектами
        //$file_list = scandir(Yii::getPathOfAlias('application.modules.news.models'));
        //$file_list = scandir(Yii::getPathOfAlias('mod.*.models'));
        $models = null;

        foreach (Yii::$app->getModules() as $mod => $obj) {

            if (!in_array($mod, ['admin', 'seo', 'user', 'rbac', 'stats'])) {
                if (file_exists(Yii::getAlias("@vendor/panix/mod-{$mod}/models"))) {
                    $file_list[$mod] = scandir(Yii::getAlias("@vendor/panix/mod-{$mod}/models"));
                }
            }
         /*   if (!in_array($mod, ['admin', 'seo', 'user', 'install', 'stats'])) {
                if (file_exists(Yii::getAlias("@vendor/panix/mod-{$mod}/models"))) {
                    $file_list[$mod] = \yii\helpers\FileHelper::findFiles(Yii::getAlias("@vendor/panix/mod-{$mod}/models"), [
                                'only' => ['*.php'],
                        'recursive'=>false
                    ]);
                }
            }*/

            //если найдены файлы
            if (isset($file_list[$mod])) {
                if (count($file_list[$mod])) {
                    foreach ($file_list[$mod] as $file) {

                       if ($file != '.' && $file != '..' && !preg_match('/Translate|Query|Node|Search/', $file)) {// исключаем папки с назварием '.' и '..'
                            // Yii::import("mod.{$mod}.models.{$file}");
                            $ext = explode(".", $file);
   
                            $model = $ext[0];
                             $className= "\\panix\\mod\\{$mod}\\models\\{$model}";
                            //  $run = new $className;
                            //  if ($run instanceof \panix\engine\db\ActiveRecord) {
                            //проверяем чтобы модели были с расширением php
                            if (isset($ext[1])) {
                                if ($ext[1] == "php") {
                                    $models[] = array(
                                        'model' => $model,
                                            //  'path' => "//panix//mod//{$mod}//models",
                                            'className'=>$className
                                    );
                                    //  $models[] = "mod.{$mod}.models";
                                }
                            }
                            //  }
                        }
                    }
                }
            }
        }

        return $models;
    }

    /**
     * Получение списка артибутов всех моделей
     */
    public function getParams() {
        //загружаем модели
        $models = $this->getModels();
        $params = array();
        $i = 0;


        if (count($models)) {
          //  print_r($models);
          //  die;
            foreach ($models as $model) {
                $className = $model['className'];
                $mdl = new $className;
                $modelName = $model['model'];


                //$modelNew = new $mdl();
                if ($mdl instanceof \panix\engine\db\ActiveRecord || $mdl instanceof \yii\db\ActiveRecord) {


//if($mdl!='ShopCategoryNode'){
                    // }
                    /* проверяем существует ли в данном классе функция "tableName"
                     * если она существует, то скорее всего эта модель CActiveRecord
                     * таким образом отсеиваем модели, которые были предназначены для валидации форм не работающих с Базой Данных
                     */
                    //if($mdl!='ShopCategoryNode'){
                    //   $modelNew = new $model['className'];
                    //if (method_exists($mdl, "tableName")) {
                    //$tableName = $mdl::tableName();
                    //if (($table = $modelNew->getDb()->getSchema()->getTableNames($tableName)) !== null) {
                    //  $item = new $mdl;

                    foreach ($mdl as $attr => $val) {

                        $params[$i]['group'] = $modelName;
                        $params[$i]['name'] = $attr;
                        $params[$i++]['value'] = $model['className'] . '|' . $attr;
                    }

                    /*
                     * проверяем есть ли связи у данной модели
                     */
                    /* if (method_exists($mdl, "relations")) {
                      if (count($mdl->relations())) {
                      $relation = $mdl->relations();
                      foreach ($relation as $key => $rel) {
                      // выбираем связи один к одному или многие к одному
                      if (($rel[0] == "CHasOneRelation") || ($rel[0] == "CBelongsToRelation")) {

                      if (!in_array($rel[1], array('CategoriesModel'))) {

                      Yii::import("{$model['path']}.{$rel[1]}");
                      // echo $model['path'];
                      $newRel = new $rel[1];
                      foreach ($newRel as $attr => $nR) {
                      $params[$i]['group'] = $mdl;
                      $params[$i]['name'] = $key . "." . $attr;
                      $params[$i++]['value'] = $mdl . "/" . $key . "." . $attr;
                      }
                      }
                      }
                      }
                      }
                      } */
                    //}
                    //  }
                }
            }
            /*
             * если есть модели работающие с базой то возвращаем массив данных
             * иначе возвращаем пустой массив
             */
        }
        return $params;
    }

    /*
     * ajax function
     * add to Form, fields for MetaName
     */

    public function actionAddmetaname() {
        $model = new SeoMain;
        $model->name = $_POST['name'];
        $this->renderPartial("_formMetaName", array('model' => $model));
    }

    /*
     * ajax function
     * delete MetaName
     */

    public function actionDeletemetaname() {
        SeoMain::model()->findByPk($_POST['id'])->delete();
    }

    /*
     * ajax function
     * add to Form, fields for MetaProperty
     */

    public function actionAddmetaproperty() {
        $model = new SeoParams();
        $this->renderPartial("_formMetaParams", array('model' => $model, 'count' => $_POST['count']));
    }

    /*
     * ajax function
     * delete MetaProperty
     */

    public function actionDeleteMetaProperty() {
        SeoParams::model()->findByPk($_POST['id'])->delete();
    }

    public function getAddonsMenu() {
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
