<?php

namespace app\modules\hosting\controllers\admin;

use Yii;
use panix\engine\Html;

class DefaultController extends CommonController {
    
    public function actionIndex(){
        return $this->render('index');
    }
    
    public function actionTest(){
        return $this->render('index');
    }
}
