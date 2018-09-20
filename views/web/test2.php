<style>
    .infoBlk.shape{
        border:1px solid red;
    }
    .infoBlk.layout{
        border:1px solid green;
    }
</style>
<?php
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Style\Color;
// Create new PHPPresentation object

$writers = array('PowerPoint2007' => 'pptx', 'ODPresentation' => 'odp');

define('SCRIPT_FILENAME', basename($_SERVER['SCRIPT_FILENAME'], '.php'));
define('CLI', (PHP_SAPI == 'cli') ? true : false);
define('EOL', CLI ? PHP_EOL : '<br />');
define('IS_INDEX', SCRIPT_FILENAME == 'index');

echo date('H:i:s') . ' Create new PHPPresentation object' . EOL;
$objPHPPresentation = new PhpPresentation();
// Set properties
echo date('H:i:s') . ' Set properties' . EOL;
$objPHPPresentation->getDocumentProperties()->setCreator('PHPOffice')
    ->setLastModifiedBy('PHPPresentation Team')
    ->setTitle('Sample 01 Title')
    ->setSubject('Sample 01 Subject')
    ->setDescription('Sample 01 Description')
    ->setKeywords('office 2007 openxml libreoffice odt php')
    ->setCompany('Pixelion corp.')
    ->setCategory('Sample Category');
// Create slide
echo date('H:i:s') . ' Create slide' . EOL;
$currentSlide = $objPHPPresentation->getActiveSlide();
// Create a shape (drawing)
echo date('H:i:s') . ' Create a shape (drawing)' . EOL;
$shape = $currentSlide->createDrawingShape();
$shape->setName('PHPPresentation logo')
    ->setDescription('PHPPresentation logo')
    ->setPath(Yii::getAlias('@vendor/phpoffice/phppresentation/samples/resources').'/phppowerpoint_logo.gif')
    ->setHeight(36)
    ->setOffsetX(10)
    ->setOffsetY(10);
$shape->getShadow()->setVisible(true)
    ->setDirection(45)
    ->setDistance(10);
$shape->getHyperlink()->setUrl('https://github.com/PHPOffice/PHPPresentation/')->setTooltip('PHPPresentation');
// Create a shape (text)
echo date('H:i:s') . ' Create a shape (rich text)' . EOL;
$shape = $currentSlide->createRichTextShape()
    ->setHeight(300)
    ->setWidth(600)
    ->setOffsetX(170)
    ->setOffsetY(180);
$shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$textRun = $shape->createTextRun('PIXELION STUDIO');
$textRun->getFont()->setBold(true)
    ->setSize(60)
    ->setColor(new Color('FFE06B20'));
echo date('H:i:s') . ' Create a shape (rich text) 2' . EOL;
$shape = $currentSlide->createRichTextShape()
    ->setHeight(300)
    ->setWidth(200)
    ->setOffsetX(250)
    ->setOffsetY(80);
$shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$textRun = $shape->createTextRun('PIXELION STUDIO2');
$textRun->getFont()->setBold(true)
    ->setSize(10)
    ->setColor(new Color('FFE06B20'));













echo date('H:i:s') . ' Create slide 2' . EOL;
$currentSlide2 = $objPHPPresentation->createSlide();
// Create a shape (drawing)
echo date('H:i:s') . ' Create a shape (drawing)2.1' . EOL;
$shape = $currentSlide2->createDrawingShape();
$shape->setName('PHPPresentation logo')
    ->setDescription('PHPPresentation logo')
    ->setPath(Yii::getAlias('@vendor/phpoffice/phppresentation/samples/resources').'/phppowerpoint_logo.gif')
    ->setHeight(36)
    ->setOffsetX(10)
    ->setOffsetY(10);
$shape->getShadow()->setVisible(true)
    ->setDirection(45)
    ->setDistance(10);
$shape->getHyperlink()->setUrl('https://github.com/PHPOffice/PHPPresentation/')->setTooltip('PHPPresentation');
// Create a shape (text)
echo date('H:i:s') . ' Create a shape (rich text)2.1' . EOL;
$shape = $currentSlide2->createRichTextShape()
    ->setHeight(300)
    ->setWidth(600)
    ->setOffsetX(170)
    ->setOffsetY(180);
$shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$textRun = $shape->createTextRun('PIXELION STUDIO22222');
$textRun->getFont()->setBold(true)
    ->setSize(60)
    ->setColor(new Color('FFE06B20'));
echo date('H:i:s') . ' Create a shape (rich text) 2' . EOL;
$shape = $currentSlide2->createRichTextShape()
    ->setHeight(300)
    ->setWidth(600)
    ->setOffsetX(200)
    ->setOffsetY(180);
$shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$textRun = $shape->createTextRun('PIXELION STUDIO233333');
$textRun->getFont()->setBold(true)
    ->setSize(10)
    ->setColor(new Color('FFE06B20'));
// Save file

echo $this->context->write($objPHPPresentation, basename(__FILE__, '.php'), $writers);