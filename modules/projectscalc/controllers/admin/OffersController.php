<?php

namespace app\modules\projectscalc\controllers\admin;

use Yii;
use panix\engine\Html;
use app\modules\projectscalc\models\search\OffersSearch;

class OffersController extends \panix\engine\controllers\AdminController {

    public function actionView($id) {
        $model = Offers::model()
                ->with('redaction')
                ->findByPk($id);
        if ($model) {
            if ($model->redaction) {
                echo $model->renderOffer();
            }
        }
        die;
    }

    public function actionPrint($id) {
        $model = Offers::model()
                ->with(array('redaction', 'calc'))
                ->findByPk($id);



        $mpdf = Yii::app()->pdf->getApi([
            'format' => 'A4',
            //'mode' => 'utf-8', 
            'default_font_size' => 9,
            'default_font' => 'times',
            'margin_top' => 30,
            'margin_bottom' => 9,
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_footer' => 5,
            'margin_header' => 5,
        ]);

        //$mpdf->WriteHTML(file_get_contents(Yii::app()->createAbsoluteUrl($this->baseAssetsUrl . '/css/bootstrap.min.css')), 1);
        $mpdf->SetTitle('Offer');
        $mpdf->setFooter($this->renderPartial('mod.projectsCalc.views.admin.modules._pdf_footer', array(), true));
        $mpdf->SetHTMLHeader($this->renderPartial('mod.projectsCalc.views.admin.modules._pdf_header', array(), true));

        // $mpdf->WriteHTML(file_get_contents(Yii::app()->createAbsoluteUrl($this->baseAssetsUrl . '/css/bootstrap.min.css')), 1);
        $mpdf->WriteHTML($model->renderOffer(), 2);
        $mpdf->Output("Offer{$model->id}_{$model->calc->title}.pdf", 'I');
    }

    public function actionIndex() {
        $this->pageName = Yii::t('projectscalc/default', 'OFFERS');
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
            $this->pageName
        ];

        $searchModel = new OffersSearch();
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
            $model = new Offers;
        } else {
            $model = Offers::model()
                    ->findByPk($_GET['id']);
        }

        if (!$model)
            throw new CHttpException(404);


        /* $isNewRecord = ($model->isNewRecord) ? true : false;
          $this->breadcrumbs = array(
          Yii::t('projectscalc/default', 'MODULE_NAME') => $this->createUrl('index'),
          ($model->isNewRecord) ? $model::t('PAGE_TITLE', 0) : CHtml::encode($model->title),
          );

          $this->pageName = ($model->isNewRecord) ? $model::t('PAGE_TITLE', 0) : $model::t('PAGE_TITLE', 1);
         */

        if (Yii::app()->request->isPostRequest) {
            $model->attributes = $_POST['Offers'];
            if ($model->validate()) {
                $model->save();
                $this->redirect(array('index'));
            } else {
                
            }
        }
        $this->render('update', array('model' => $model));
    }

    public function getAddonsMenu() {
        return [
            [
                'label' => Yii::t('projectscalc/default', 'OFFERS_REDACTION'),
                'url' => ['/admin/projectscalc/offersredaction'],
                'icon' => Html::icon('offer'),
            ],
        ];
    }

}
