<?php
namespace api\modules\v1\controllers;

use yii\rest\ActiveController;


class ProductController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Product';

    public function actionView($id){
        return ['s'=>'ss'];
    }
}