<?php
namespace app\modules\projectscalc\controllers\admin;

use Yii;
use app\modules\projectscalc\models\ModulesList;
use app\modules\projectscalc\models\search\ModulesListSearch;
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

        $searchModel = new ModulesListSearch();
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
            $model = new ModulesList;
        } else {
            $model = $this->findModel($id);
        }


        $this->pageName = ($model->isNewRecord) ? 'New' : $model->title;


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

    public function getAddonsMenu() {
        return array(
            array(
                'label' => Yii::t('projectscalc/default', 'MODULE_NAME'),
                'url' => array('/admin/projectscalc'),
                //'icon' => 'flaticon-settings',
                'visible' => true
            ),
        );
    }
    protected function findModel($id) {
        $model = new ModulesList;
        if (($model = $model::findOne($id)) !== null) {
            return $model;
        } else {
            $this->error404();
        }
    }
}
