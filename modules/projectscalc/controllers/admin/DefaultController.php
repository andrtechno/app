<?php

namespace app\modules\projectscalc\controllers\admin;

use Yii;
use app\modules\projectscalc\models\search\ProjectsCalcSearch;

class DefaultController extends \panix\engine\controllers\AdminController {



    public function actionIndex() {

        $this->pageName = Yii::t('projectscalc/default', 'MODULE_NAME');
        $this->buttons = [
            [
                'icon' => 'icon-add',
                'label' => Yii::t('projectscalc/default', 'CREATE_BTN'),
                'url' => ['create'],
                'options' => ['class' => 'btn btn-success']
            ]
        ];
        $this->breadcrumbs = [
            $this->pageName
        ];

        $searchModel = new ProjectsCalcSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
        ]);
    }

    /**
     * Create or update new page
     * @param boolean $new
     */
    public function actionUpdate($new = false) {
        if ($new === true) {
            $model = new ProjectsCalc;
        } else {
            $model = ProjectsCalc::model()
                    ->findByPk($_GET['id']);
        }

        if (!$model)
            throw new CHttpException(404);


        $isNewRecord = ($model->isNewRecord) ? true : false;
        $this->breadcrumbs = array(
            Yii::t('ProjectsCalcModule.default', 'MODULE_NAME') => $this->createUrl('index'),
            ($model->isNewRecord) ? $model::t('PAGE_TITLE', 0) : CHtml::encode($model->title),
        );

        $this->pageName = ($model->isNewRecord) ? $model::t('PAGE_TITLE', 0) : $model::t('PAGE_TITLE', 1);

        $form = new TabForm($model->getForm(), $model);
        $form->additionalTabs[$model::t('modules')] = array(
            'content' => $this->renderPartial('_modules', array('model' => $model), true)
        );


        if (Yii::app()->request->isPostRequest) {

            $model->attributes = $_POST['ProjectsCalc'];
            if ($model->validate()) {
                if (isset($_POST['mod'])) {
                    $model->setCategories($_POST['mod']);
                }
                $model->save();
                $this->refresh();
                //s$this->redirect(array('index'));
            }
        }
        $this->render('update', array('model' => $model, 'form' => $form));
    }

    public function getAddonsMenu() {
        return array(
            array(
                'label' => Yii::t('app', 'Модули'),
                'url' => array('/admin/projectsCalc/modules/index'),
                //'icon' => 'flaticon-settings',
                'visible' => true
            ),
        );
    }

}
