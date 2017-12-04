<?php
namespace app\modules\projectscalc\controllers\admin;
/**
 * Контроллер админ-панели статичных страниц
 * 
 * @author CORNER CMS development team <dev@corner-cms.com>
 * @package modules.redaction.controllers.admin
 * @uses AdminController
 */
class OffersController extends \panix\engine\controllers\AdminController {

    public function actions() {
        return array(
            'delete' => array(
                'class' => 'ext.adminList.actions.DeleteAction',
            ),
        );
    }

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
                ->with(array('redaction','calc'))
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
        $mpdf->WriteHTML($model->renderOffer(),2);
        $mpdf->Output("Offer{$model->id}_{$model->calc->title}.pdf", 'I');

        
    }

    public function actionIndex() {
        $this->pageName = Yii::t('ProjectsCalcModule.default', 'OFFERS');
        $this->breadcrumbs = array(
            Yii::t('ProjectsCalcModule.default', 'MODULE_NAME') => $this->createUrl('/admin/projectsCalc'),
            $this->pageName
                );
        $model = new Offers('search');
        $model->unsetAttributes();
        if (!empty($_GET['Offers']))
            $model->attributes = $_GET['Offers'];

        $this->render('index', array('model' => $model));
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
          Yii::t('ProjectsCalcModule.default', 'MODULE_NAME') => $this->createUrl('index'),
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
        return array(
            array(
                'label' => Yii::t('ProjectsCalcModule.default', 'OFFERS_REDACTION'),
                'url' => array('/admin/projectsCalc/offersRedaction'),
                //'icon' => 'flaticon-settings',
                'visible' => true
            ),
        );
    }
}
