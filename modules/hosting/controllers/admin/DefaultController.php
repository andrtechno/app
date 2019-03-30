<?php

namespace app\modules\hosting\controllers\admin;

use Yii;
use panix\engine\Html;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\IOFactory;

use PhpOffice\PhpWord\Shared\Html as WordHtml;


class DefaultController extends CommonController {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionTest() {
// Creating the new document...
        $phpWord = new PhpWord();

        /* Note: any element you append to a document must reside inside of a Section. */

// Adding an empty Section to the document...
        $section = $phpWord->addSection();
// Adding Text element to the Section having font styled by default...
        /*$section->addText(
                '"Learn from yesterday, live for today, hope for tomorrow. '
                . 'The important thing is not to stop questioning." '
                . '(Albert Einstein)'
        );*/
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        $html2='<b>test</b>';
        
$html = '<h1>Adding element via HTML</h1>';
$html .= '<p>Some well formed HTML snippet needs to be used</p>';
$html .= '<p>With for example <strong>some<sup>1</sup> <em>inline</em> formatting</strong><sub>1</sub></p>';
$html .= '<p>Unordered (bulleted) list:</p>';
$html .= '<ul><li>Item 1</li><li>Item 2</li><ul><li>Item 2.1</li><li>Item 2.1</li></ul></ul>';
$html .= '<p>Ordered (numbered) list:</p>';
$html .= '<ol><li>Item 1</li><li>Item 2</li></ol>';
        
        

        











        
        

            

            
            
            
            
$html .= '<center><h1>ДОГОВОР №{agreement_id}</h1></center>
<p style="text-align: center;">на создание веб-сайта</p>';
            
            WordHtml::addHtml($section, $html);
  
            $data = array('test','test');
/*$table = $section->addTable();
for ($r = 1; $r <= 8; $r++) {
    $table->addRow();
    for ($c = 1; $c <= 5; $c++) {
        $table->addCell(1750)->addText("Row {$r}, Cell {$c}");
    }
}*/


$fancyTableStyleName = 'Fancy Table';
$fancyTableStyle = array('borderSize' => 0, 'borderColor' => '006699', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
$fancyTableCellStyle = array('valign' => 'center');
$fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
$fancyTableFontStyle = array('bold' => true);

$table = $section->addTable($fancyTableStyleName);
$table->addRow(900);
$table->addCell(2000, $fancyTableCellStyle)->addText('Row 1', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('Row 2', $fancyTableFontStyle);

for ($i = 1; $i <= 8; $i++) {
    $table->addRow();
    $table->addCell(2000)->addText("Cell {$i}");
    $table->addCell(2000)->addText("Cell {$i}");

    $text = (0== $i % 2) ? 'X' : '';
    $table->addCell(500)->addText($text);
}

        
        
        
        
        
        
        //$html='asdfasfd';
        // $section->addText($html);
        /*
         * Note: it's possible to customize font style of the Text element you add in three ways:
         * - inline;
         * - using named font style (new font style object will be implicitly created);
         * - using explicitly created font style object.
         */



// Adding Text element with font customized using named font style...
        /*$fontStyleName = 'oneUserDefinedStyle';
        $phpWord->addFontStyle(
                $fontStyleName, array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
        );
        $section->addText(
                '"The greatest accomplishment is not in never falling, '
                . 'but in rising again after you fall." '
                . '(Vince Lombardi)', $fontStyleName
        );*/


        
        
        
        
        

        
        
        
        
        
        
// Adding Text element with font customized using explicitly created font style object...
        $fontStyle = new Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(13);
        $myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
        $myTextElement->setFontStyle($fontStyle);

// Saving the document as OOXML file...
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('helloWorld.docx');

// Saving the document as ODF file...
        //$objWriter = IOFactory::createWriter($phpWord, 'ODText');
        //$objWriter->save('helloWorld.odt');

// Saving the document as HTML file...
        //$objWriter = IOFactory::createWriter($phpWord, 'HTML');
        //$objWriter->save('helloWorld.html');
    }

}
