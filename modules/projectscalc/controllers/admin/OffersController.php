<?php

namespace app\modules\projectscalc\controllers\admin;


use Yii;
use panix\engine\Html;
use panix\engine\controllers\AdminController;
use app\modules\projectscalc\models\search\OffersSearch;
use app\modules\projectscalc\models\Offers;
use Mpdf\Mpdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html as WordHtml;


class OffersController extends AdminController
{

    public function actionView($id)
    {
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


    public function actionDoc($id)
    {
        $model = Offers::find()
            ->where(['id' => $id])
            ->one();
        $phpWord = new PhpWord();


        $section = $phpWord->addSection(['name' => 'Times New Roman']);


        //$section->addText("Договор №" . $model->id, ['bold' => true, 'size' => 39, 'name' => 'Times New Roman'], ['alignment' => 'center', 'family' => 'Times New Roman']);
//WordHtml::addHtml($section, '<h1>Договор №1</h1>');
        //$section->addTextBreak(1);



        WordHtml::addHtml($section, $model->renderOffer());



        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        $file = "Offer_{$model->id}.docx";
        //$objWriter->save($file);
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        $objWriter->save("php://output");

    }


    public function actionPdf($id)
    {
        $model = Offers::find()->where(['id' => $id])->one();

        $mpdf = new Mpdf([
            //'mode' => 'utf-8',
            'default_font_size' => 9,
            'default_font' => 'times',
            'margin_top' => 30,
            'margin_bottom' => 15,
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_footer' => 5,
            'margin_header' => 5,
            'orientation' => 'P',
            'mirrorMargins' => 1,
        ]);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->showImageErrors = true;
        $mpdf->debug = YII_DEBUG;
        //$mpdf->WriteHTML(file_get_contents(Yii::app()->createAbsoluteUrl($this->baseAssetsUrl . '/css/bootstrap.min.css')), 1);
        $mpdf->SetTitle("Offer {$model->calc->title}");
        $mpdf->setFooter($this->renderPartial('@projectscalc/views/admin/modules/_pdf_footer', ['model' => $model]));
        $mpdf->SetHTMLHeader($this->renderPartial('@projectscalc/views/admin/modules/_pdf_header', ['model' => $model]));

        //$mpdf->WriteHTML(file_get_contents(Yii::app()->createAbsoluteUrl($this->baseAssetsUrl . '/css/bootstrap.min.css')), 1);
        $mpdf->WriteHTML($model->renderOffer());
        $mpdf->Output("Offer{$model->id}_{$model->calc->title}.pdf", 'I');
    }

    public function actionIndex()
    {
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
     * @param boolean $id
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id = false)
    {
        if ($id === true) {
            $model = new Offers;
        } else {
            $model = $this->findModel($id);
        }


        /* $isNewRecord = ($model->isNewRecord) ? true : false;
          $this->breadcrumbs = array(
          Yii::t('projectscalc/default', 'MODULE_NAME') => $this->createUrl('index'),
          ($model->isNewRecord) ? $model::t('PAGE_TITLE', 0) : CHtml::encode($model->title),
          );

          $this->pageName = ($model->isNewRecord) ? $model::t('PAGE_TITLE', 0) : $model::t('PAGE_TITLE', 1);
         */

        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->validate()) {
            $model->save();
            if (Yii::$app->request->post('redirect', 1)) {
                Yii::$app->session->setFlash('success', \Yii::t('app', 'SUCCESS_CREATE'));
                return $this->redirect(['/admin/projectscalc/offers']);
            }
        }
        return $this->render('update', ['model' => $model]);
    }

    public function getAddonsMenu()
    {
        return [
            [
                'label' => Yii::t('projectscalc/default', 'OFFERS_REDACTION'),
                'url' => ['/admin/projectscalc/offersredaction'],
                'icon' => Html::icon('offer'),
            ],
        ];
    }

    protected function findModel($id)
    {
        $model = new Offers;
        if (($model = $model::findOne($id)) !== null) {
            return $model;
        } else {
            $this->error404();
        }
    }
}
