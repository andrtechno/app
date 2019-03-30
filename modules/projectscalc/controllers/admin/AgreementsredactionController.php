<?php

namespace app\modules\projectscalc\controllers\admin;

use Yii;
use app\modules\projectscalc\models\AgreementsRedaction;
use app\modules\projectscalc\models\search\AgreementsRedactionSearch;

class AgreementsredactionController extends \panix\engine\controllers\AdminController {

    public $tpl_keys = array(
        '{agreement_id}',
        '{date}',
        '{performer}',
        '{customer_fullname}',
        '{customer_text}',
        '{programming_days}',
        '{layouts_days}',
        '{price}',
        '{price_text}',
        '{price_original}',
        '{price_original_text}'
    );

    public function actions() {
        return array(
            'delete' => array(
                'class' => 'ext.adminList.actions.DeleteAction',
            ),
        );
    }

    public function actionIndex() {
        $this->pageName = Yii::t('projectscalc/default', 'AGREEMENTS_REDACTION');
        $this->buttons = [
            [
                'icon' => 'icon-add',
                'label' => Yii::t('projectscalc/default', 'CREATE_BTN'),
                'url' => ['create'],
                'options' => ['class' => 'btn btn-success']
            ]
        ];
        $this->breadcrumbs = [
            [
                'label' => Yii::t('projectscalc/default', 'MODULE_NAME'),
                'url' => ['/admin/projectscalc']
            ],
            [
                'label' => Yii::t('projectscalc/default', 'AGREEMENTS'),
                'url' => ['/admin/projectscalc/agreements']
            ],
            $this->pageName
        ];

        $searchModel = new AgreementsRedactionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
        ]);
    }

    /**
     * Create or update new page
     * @param boolean $id
     */
    public function actionUpdate($id = false) {
        if ($id === true) {
            $model = new Agreements;
        } else {
            $model = $this->findModel($id);
        }




        $this->pageName = ($model->isNewRecord) ? 'New' : $model->getAgreementName();


        $this->breadcrumbs = [
            [
                'label' => Yii::t('projectscalc/default', 'MODULE_NAME'),
                'url' => ['/admin/projectscalc']
            ],
            [
                'label' => Yii::t('projectscalc/default', 'AGREEMENTS'),
                'url' => ['/admin/projectscalc/agreements']
            ],
            [
                'label' => Yii::t('projectscalc/default', 'AGREEMENTS_REDACTION'),
                'url' => ['index']
            ],
            $this->pageName
        ];




        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->validate()) {
            $model->save();
            if (Yii::$app->request->post('redirect', 1)) {
                Yii::$app->session->setFlash('success', \Yii::t('app', 'SUCCESS_CREATE'));
                return Yii::$app->getResponse()->redirect(['/admin/projectscalc/agreementsredaction']);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    protected function findModel($id) {
        $model = new AgreementsRedaction;
        if (($model = $model::findOne($id)) !== null) {
            return $model;
        } else {
            $this->error404();
        }
    }

}
