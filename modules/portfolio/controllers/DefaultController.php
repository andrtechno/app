<?php

namespace app\modules\portfolio\controllers;

use Yii;
use panix\engine\controllers\WebController;
use app\modules\portfolio\models\Items;


class DefaultController extends WebController {

    public function actionIndex(){
        return $this->render('index');
    }

    public function actionView($seo_alias) {
        $this->findModel($seo_alias);


        
        return $this->render('view', ['model' => $this->dataModel]);
    }

    
     protected function findModel($seo_alias) {
        $model = new Items;
        if (($this->dataModel = $model::findOne(['seo_alias' => $seo_alias])) !== null) {
            return $this->dataModel;
        } else {
            $this->error404();
        }
    }

}
