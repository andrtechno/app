<?php

namespace app\modules\projectscalc\controllers\admin;

use Yii;
use app\modules\projectscalc\models\search\AgreementsSearch;
use app\modules\projectscalc\models\Agreements;
use Mpdf\Mpdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html as WordHtml;

class AgreementsController extends \panix\engine\controllers\AdminController {

    public function actionDoc($id) {
        $model = Agreements::find()->where(['id' => $id])->one();
        $phpWord = new PhpWord();


        $section = $phpWord->addSection(['name'=>'Times New Roman']);
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
$section->addText("Договор №1",['bold' => true,'size'=>39,'name'=>'Times New Roman'],['alignment'=>'center','family'=>'Times New Roman']);
//WordHtml::addHtml($section, '<h1>Договор №1</h1>');
$section->addTextBreak(1);

$table = $section->addTable();
$table->addRow();
$table->addCell(4600)->addText("г. Одесса",['name'=>'Times New Roman']);
$table->addCell(4600)->addText("26 августа 2017",['name'=>'Times New Roman'],['alignment'=>'right']);
$section->addTextBreak(1);



 WordHtml::addHtml($section, $model->renderAgreement());

// 2. Advanced table

$section->addTextBreak(1);


$fancyTableStyleName = 'Fancy Table';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
$fancyTableCellStyle = array('valign' => 'center');
$fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
$fancyTableFontStyle = array('bold' => true);
$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);
$table->addRow(900);
$table->addCell(2000, $fancyTableCellStyle)->addText('Row 1', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('Row 2', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('Row 3', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('Row 4', $fancyTableFontStyle);
$table->addCell(500, $fancyTableCellBtlrStyle)->addText('Row 5', $fancyTableFontStyle);
for ($i = 1; $i <= 8; $i++) {
    $table->addRow();
    $table->addCell(2000)->addText("Cell {$i}");
    $table->addCell(2000)->addText("Cell {$i}");
    $table->addCell(2000)->addText("Cell {$i}");
    $table->addCell(2000)->addText("Cell {$i}");
    $text = (0== $i % 2) ? 'X' : '';
    $table->addCell(500)->addText($text);
}

$section->addTextBreak(1);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        $file = 'example.docx';
        $objWriter->save($file);
       /* header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        $objWriter->save("php://output");*/

    }

    public function actionView($id) {
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

    public function actionPdf($id) {
        $model = Agreements::find()->where(['id' => $id])
                //->joinWith('redaction')
                // ->with('redaction')
                ->one();


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
        $mpdf->WriteHTML($model->renderAgreement());
        $mpdf->Output("Agreement_{$model->id}_{$model->date}.pdf", 'I');
    }

    public function actionIndex() {

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
     * @param boolean $id
     */
    public function actionUpdate($id = false) {
        if ($id === true) {
            $model = new Agreements;
        } else {
            $model = $this->findModel($id);
        }




        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->validate()) {
            $model->save();
            if (Yii::$app->request->post('redirect', 1)) {
                Yii::$app->session->addFlash('success', \Yii::t('app', 'SUCCESS_CREATE'));
                return Yii::$app->getResponse()->redirect(['/admin/projectscalc']);
            }
        } else {

            // print_r($model->getErrors());
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function getAddonsMenu() {
        return [
            [
                'label' => Yii::t('projectscalc/default', 'AGREEMENTS_REDACTION'),
                'url' => ['/admin/projectscalc/agreementsredaction'],
                //'icon' => 'flaticon-settings',
                'visible' => true
            ],
        ];
    }

    protected function findModel($id) {
        $model = new Agreements;
        if (($model = $model::findOne($id)) !== null) {
            return $model;
        } else {
            $this->error404();
        }
    }

}
