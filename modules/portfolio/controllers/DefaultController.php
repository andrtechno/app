<?php

namespace app\modules\portfolio\controllers;

use Yii;
use panix\engine\controllers\WebController;
use app\modules\portfolio\models\Items;


class DefaultController extends WebController {

    public function actionIndex(){
        return $this->render('index');
    }

    public function actionView($slug) {
        $this->findModel($slug);


        
        return $this->render('view', ['model' => $this->dataModel]);
    }

    
     protected function findModel($slug) {
        $model = new Items;
        if (($this->dataModel = $model::findOne(['slug' => $slug])) !== null) {
            return $this->dataModel;
        } else {
            $this->error404();
        }
    }

}
