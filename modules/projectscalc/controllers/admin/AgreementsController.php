<?php

namespace app\modules\projectscalc\controllers\admin;

use panix\engine\controllers\AdminController;
use Yii;
use app\modules\projectscalc\models\search\AgreementsSearch;
use app\modules\projectscalc\models\Agreements;
use Mpdf\Mpdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html as WordHtml;

class AgreementsController extends AdminController
{

    public function actionDoc($id)
    {
        $model = Agreements::find()
            //->with('redaction')
            ->where(['id' => $id])

            ->one();
        $phpWord = new PhpWord();


        $section = $phpWord->addSection(['name' => 'Times New Roman']);
        /*
        $header = $section->addHeader();
        $header->addText('This is the header with ');
        $header->addImage('uploads/favicon.png', array('width' => 210, 'height' => 210, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
        $header->firstPage();


        $section->addText('This is the header with ');
        $section->addLink('https://github.com/PHPOffice/PHPWord', 'PHPWord on GitHub');


        $footer = $section->addFooter();
        $footer->addPreserveText('Page {PAGE} of {NUMPAGES}.', null, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
        */


        $section->addText("Договор №" . $model->id, ['bold' => true, 'size' => 39, 'name' => 'Times New Roman'], ['alignment' => 'center', 'family' => 'Times New Roman']);
//WordHtml::addHtml($section, '<h1>Договор №1</h1>');
        $section->addTextBreak(1);

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(4600)->addText("г. Одесса", ['name' => 'Times New Roman']);
        $table->addCell(4600)->addText($model->getDataRender().' г.', ['name' => 'Times New Roman'], ['alignment' => 'right']);
        $section->addTextBreak(1);


        WordHtml::addHtml($section, $model->renderAgreement());

// 2. Advanced table

        $section->addTextBreak(1);

        $widthCell = 4600;
        $fancyTableStyleName = 'Fancy Table';
        $fancyTableCellStyle = array('valign' => 'center');
        $fancyTableFontStyle = array('bold' => true);
//$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
        $table = $section->addTable($fancyTableStyleName);
        $table->addRow(500);
        $table->addCell($widthCell,['valign' => 'center'])->addText('ЗАКАЗЧИК',['bold' => true]);
        $table->addCell($widthCell,['valign' => 'center'])->addText('ИСПОЛНИТЕЛЬ',['bold' => true]);
        $table->addRow(2000);

        $cell = $table->addCell($widthCell);
        WordHtml::addHtml($cell, $model->customer_name.'<br/>'.$model->customer_text);
        $cell = $table->addCell($widthCell);
        WordHtml::addHtml($cell, \panix\engine\CMS::textReplace($model->redaction->performer_text, ['{performer}'=>$model->redaction->performer]));

        //$table->addCell(null,['valign' => 'center'])->addText($model->redaction->performer);
        $table->addRow(500);
        $table->addCell(null,['valign' => 'center'])->addText($model->customer_name." ____________________________");
        $table->addCell(null,['valign' => 'center'])->addText($model->redaction->performer." ____________________________",[], ['alignment' => 'right']);
        $table->addRow(500);
        //$table->addCell(null,['valign' => 'center'])->addText();
        $table->addCell(null,['valign' => 'center'])->addText('М.П. ____________________________',[], ['alignment' => 'right']);


        $section->addTextBreak(1);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        $file = "Agreement_{$model->id}_{$model->date}.docx";
        //$objWriter->save($file);
         header("Content-Description: File Transfer");
         header('Content-Disposition: attachment; filename="' . $file . '"');
         header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
         header('Content-Transfer-Encoding: binary');
         header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
         header('Expires: 0');
         $objWriter->save("php://output");

    }

    public function actionView($id)
    {
        $model = Agreements::model()
            ->with('redaction')
            ->findByPk($id);
        if ($model) {
            if ($model->redaction) {
                echo $model->renderAgreement();
            }
        }
        die;
    }

    public function actionPdf($id)
    {
        $model = Agreements::find()->where(['id' => $id])->one();


        $mpdf = new Mpdf([
            //'mode' => 'utf-8', 
            'default_font_size' => 9,
            'default_font' => 'times',
            'margin_top' => 9,
            'margin_bottom' => 9,
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_footer' => 5,
            'margin_header' => 5,
        ]);
        //$mpdf->WriteHTML(file_get_contents(Yii::app()->createAbsoluteUrl($this->baseAssetsUrl . '/css/bootstrap.min.css')), 1);
        $mpdf->SetTitle('Agreement');
        $mpdf->WriteHTML($this->renderPartial('_pdf_header',['model'=>$model],false),0);
        $mpdf->WriteHTML($model->renderAgreement(),2);
        $mpdf->WriteHTML($this->renderPartial('_pdf_footer',['model'=>$model],false),2);
        $mpdf->Output("Agreement_{$model->id}_{$model->date}.pdf", 'I');
    }

    public function actionIndex()
    {

        $this->pageName = Yii::t('projectscalc/default', 'AGREEMENTS');
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

        $searchModel = new AgreementsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Create or update new page
     * @param bool $id
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id = false)
    {
        if ($id === true) {
            $model = new Agreements;
        } else {
            $model = $this->findModel($id);
        }


        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->validate()) {
            $model->save();
            if (Yii::$app->request->post('redirect', 1)) {
                Yii::$app->session->setFlash('success', \Yii::t('app', 'SUCCESS_CREATE'));
                return $this->redirect(['/admin/projectscalc/agreements']);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function getAddonsMenu()
    {
        return [
            [
                'label' => Yii::t('projectscalc/default', 'AGREEMENTS_REDACTION'),
                'url' => ['/admin/projectscalc/agreementsredaction'],
                //'icon' => 'flaticon-settings',
                'visible' => true
            ],
        ];
    }

    protected function findModel($id)
    {
        $model = new Agreements;
        if (($model = $model::findOne($id)) !== null) {
            return $model;
        } else {
            $this->error404();
        }
    }

}
