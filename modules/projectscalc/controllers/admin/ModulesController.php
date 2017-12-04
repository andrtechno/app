<?php
namespace app\modules\projectscalc\controllers\admin;
/**
 * Контроллер админ-панели статичных страниц
 * 
 * @author CORNER CMS development team <dev@corner-cms.com>
 * @package modules.news.controllers.admin
 * @uses AdminController
 */
class ModulesController extends \panix\engine\controllers\AdminController {

    public function actions() {
        return array(
            'delete' => array(
                'class' => 'ext.adminList.actions.DeleteAction',
            ),
        );
    }

    public function actionView($id) {
        $model = ModulesList::model()
                ->findByPk($id);

        $this->pageName = $model->title;

        $this->render('view', array('model' => $model));
    }

    public function actionPrint($id) {
        $model = ModulesList::model()
                ->findByPk($id);




        $mpdf = Yii::app()->pdf->getApi(array(
            'default_font_size' => 9,
            'default_font' => 'times',
            'margin_top' => 30,
            'margin_bottom' => 9,
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_footer' => 5,
            'margin_header' => 10,
        ));
        //$mpdf = Yii::app()->pdf;


       // print_r($mpdf);die;
        //$mpdf->WriteHTML(file_get_contents(Yii::app()->createAbsoluteUrl($this->baseAssetsUrl . '/css/bootstrap.min.css')), 1);
        $mpdf->SetTitle('Module');
        $mpdf->setFooter($this->renderPartial('mod.projectsCalc.views.admin.modules._pdf_footer', array(), true));
        $mpdf->SetHTMLHeader($this->renderPartial('_pdf_header', array(), true));

        //$mpdf->WriteHTML(file_get_contents(Yii::app()->createAbsoluteUrl($this->baseAssetsUrl . '/css/bootstrap.min.css')), 1);

        
        //$mpdf->WriteHTML(file_get_contents(Yii::getPathOfAlias('app.assets.css').DS.'bootstrap.min.css'), 1);
        $mpdf->WriteHTML(file_get_contents(Yii::getPathOfAlias('app.pdf.assets').DS.'mpdf-bootstrap.min.css'), 1);

        $mpdf->WriteHTML($model->full_text, 2);
        $mpdf->Output("Module_ID{$model->id}.pdf", 'I');
    }

    public function actionIndex() {
        $this->pageName = Yii::t('ProjectsCalcModule.default', 'MODULE_NAME');
        $this->breadcrumbs = array($this->pageName);
        $model = new ModulesList('search');
        $model->unsetAttributes();
        if (!empty($_GET['ModulesList']))
            $model->attributes = $_GET['ModulesList'];

        $this->render('index', array('model' => $model));
    }

    /**
     * Create or update new page
     * @param boolean $new
     */
    public function actionUpdate($new = false) {
        if ($new === true) {
            $model = new ModulesList;
        } else {
            $model = ModulesList::model()
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


        if (Yii::app()->request->isPostRequest) {
            $model->attributes = $_POST['ModulesList'];
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
                'label' => Yii::t('ProjectsCalcModule.default', 'MODULE_NAME'),
                'url' => array('/admin/projectsCalc'),
                //'icon' => 'flaticon-settings',
                'visible' => true
            ),
        );
    }

}
