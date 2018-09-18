<?php

namespace app\modules\presentation\controllers;

use app\modules\presentation\models\Presentation;
use app\modules\presentation\models\search\PresentationSearch;
use panix\engine\controllers\WebController;
use Yii;
use yii\web\UploadedFile;


class DefaultController extends WebController
{

    public function actionIndex()
    {
        $searchModel = new PresentationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);

    }

    public function actionExample()
    {
        return $this->render('example');
    }

    public function actionSearch()
    {
        $word = Yii::$app->request->get('word');
        $searchModel = new PresentationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('search', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }


    public function actionUpload()
    {
        $model = new Presentation();
        if ($model->load(Yii::$app->request->post())) {
            $model->filename = UploadedFile::getInstance($model, 'filename');

            if ($model->validate()) {
                if ($model->filename) {
                    $fileName = time().'-'.$model->filename->baseName . '.' . $model->filename->extension;
                    $filePath = 'uploads/presentation/' . $fileName;
                    if ($model->filename->saveAs($filePath)) {
                        $model->filename = $fileName;
                    }
                }

                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', \Yii::t('app', 'FILE_SUCCESS_UPLOAD',['file'=>$fileName]));
                    return $this->redirect(['/presentation/upload']);
                }
            } else {
                //print_r($model->getErrors());
               // die;
            }
        }
        return $this->render('upload', ['model' => $model]);

    }


}
