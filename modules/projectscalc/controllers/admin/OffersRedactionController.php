<?php
namespace app\modules\projectscalc\controllers\admin;
/**
 * Контроллер админ-панели статичных страниц
 * 
 * @author CORNER CMS development team <dev@corner-cms.com>
 * @package modules.redaction.controllers.admin
 * @uses AdminController
 */
class OffersRedactionController extends \panix\engine\controllers\AdminController {

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
        $this->pageName = Yii::t('ProjectsCalcModule.default', 'OFFERS_REDACTION');
        $this->breadcrumbs = array(
            Yii::t('ProjectsCalcModule.default', 'MODULE_NAME') => $this->createUrl('/admin/projectsCalc'),
            Yii::t('ProjectsCalcModule.default', 'OFFERS') => $this->createUrl('/admin/projectsCalc/offers'),
            $this->pageName
        );
        $model = new OffersRedaction('search');
        $model->unsetAttributes();
        if (!empty($_GET['OffersRedaction']))
            $model->attributes = $_GET['OffersRedaction'];

        $this->render('index', array('model' => $model));
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
     * @param boolean $new
     */
    public function actionUpdate($new = false) {
        if ($new === true) {
            $model = new OffersRedaction;
        } else {
            $model = OffersRedaction::model()
                    ->findByPk($_GET['id']);
        }

        if (!$model)
            throw new CHttpException(404);



        $this->breadcrumbs = array(
            Yii::t('ProjectsCalcModule.default', 'MODULE_NAME') => $this->createUrl('index'),
            Yii::t('ProjectsCalcModule.default', 'OFFERS') => $this->createUrl('/admin/projectsCalc/offers'),
            ($model->isNewRecord) ? $model::t('PAGE_TITLE', 0) : $model->getOfferName(),
        );

        $this->pageName = ($model->isNewRecord) ? $model::t('PAGE_TITLE', 0) : $model->getOfferName();


        if (Yii::app()->request->isPostRequest) {
            $model->attributes = $_POST['OffersRedaction'];
            if ($model->validate()) {
                $model->save();
                $this->redirect(array('index'));
            } else {
                
            }
        }
        $this->render('update', array('model' => $model));
    }

}
