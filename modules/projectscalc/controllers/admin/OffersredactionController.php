<?php

namespace app\modules\projectscalc\controllers\admin;

use Yii;
use app\modules\projectscalc\models\OffersRedaction;
use app\modules\projectscalc\models\search\OffersRedactionSearch;

class OffersredactionController extends \panix\engine\controllers\AdminController {

    public $tpl_keys = array(
        '{offer_id}',
        '{client}',
        '{list}',
        '{price_layouts}',
        '{price_makeup}',
        '{price_prototype}',
        '{total_price_uah}',
        '{total_price_usd}',
        '{type}'
    );

    public function actions() {
        return array(
            'delete' => array(
                'class' => 'ext.adminList.actions.DeleteAction',
            ),
        );
    }

    public function actionIndex() {

        $this->pageName = Yii::t('projectscalc/default', 'OFFERS_REDACTION');
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
                'label' => Yii::t('projectscalc/default', 'OFFERS'),
                'url' => ['/admin/projectscalc/offers']
            ],
            $this->pageName
        ];

        $searchModel = new OffersRedactionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
        ]);
    }

    public function actionPrint($id) {
        $model = OffersRedaction::model()
                ->findByPk($id);

        Yii::setPathOfAlias('Mpdf', Yii::getPathOfAlias('vendor.mpdf.mpdf.src'));

        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 9,
            'default_font' => 'times'
        ]);
        $mpdf->WriteHTML($model->text);
        $mpdf->Output("Offer_{$model->id}.pdf", 'I');
    }

    /**
     * Create or update new page
     * @param boolean $id
     */
    public function actionUpdate($id = false) {
        if ($id === true) {
            $model = new OffersRedaction;
         } else {
        $model = $this->findModel($id);
         }




        $this->pageName = ($model->isNewRecord) ? 'NEW' : $model->getOfferName();
        $this->breadcrumbs = [
            [
                'label' => Yii::t('projectscalc/default', 'MODULE_NAME'),
                'url' => ['/admin/projectscalc']
            ],
            [
                'label' => Yii::t('projectscalc/default', 'OFFERS'),
                'url' => ['/admin/projectscalc/offers']
            ],
            $this->pageName
        ];

        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->validate()) {
            $model->save();
            if (Yii::$app->request->post('redirect', 1)) {
                Yii::$app->session->setFlash('success', \Yii::t('app', 'SUCCESS_CREATE'));
                return Yii::$app->getResponse()->redirect(['/admin/projectscalc/offersredaction']);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    protected function findModel($id) {
        $model = new OffersRedaction;
        if (($model = $model::findOne($id)) !== null) {
            return $model;
        } else {
            $this->error404();
        }
    }

}
