<?php
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Style\Color;
use app\modules\presentation\components\PresHelper;


$array = [
    'ru' => [
        [
            'text_1' => 'PIXELION STUDIO',
            'text_2' => 'Добро пожаловать',
            'text_3' => 'Pixelion web studio',
            'text_4' => 'Команда опытных, смелых и хищных разработчиков, которые не ищут альтернатив и окольных путей, постоянно охотятся на интересные проекты и всегда стремятся превзойти ожидания партнеров.'
        ],
    ],
    'en' => [
        [
            'text_1' => 'PIXELION STUDIO',
            'text_2' => 'Welcome',
            'text_3' => 'Pixelion web studio',
            'text_4' => 'A team of experienced, courageous and predatory developers who are not looking for alternatives and roundabouts, constantly hunt interesting projects and always strive to exceed the expectations of partners.'
        ],
    ],
];


$helper = new PresHelper;

// Create new PHPPresentation object

$writers = array('PowerPoint2007' => 'pptx', 'ODPresentation' => 'odp');

define('SCRIPT_FILENAME', basename($_SERVER['SCRIPT_FILENAME'], '.php'));
define('CLI', (PHP_SAPI == 'cli') ? true : false);
define('EOL', CLI ? PHP_EOL : '<br />');
define('IS_INDEX', SCRIPT_FILENAME == 'index');



foreach($array as $lang=>$data){

    foreach ($data as $data2){


        echo date('H:i:s') . ' Create new PHPPresentation object' . EOL;
        $objPHPPresentation = new PhpPresentation();
// Set properties
        echo date('H:i:s') . ' Set properties' . EOL;
        $objPHPPresentation->getDocumentProperties()->setCreator('Pixelion studio')
            ->setLastModifiedBy('Pixelion Team')
            ->setTitle('Sample file title')
            ->setSubject('Sample file Subject')
            ->setDescription('Sample file Description')
            ->setKeywords('office 2007 pixelion studio')
            ->setCompany('Pixelion')
            ->setCategory('Sample Category');
// Create slide
        echo date('H:i:s') . ' Create slide' . EOL;
        $currentSlide = $objPHPPresentation->getActiveSlide();
// Create a shape (drawing)
        echo date('H:i:s') . ' Create a shape (drawing)' . EOL;
        $shape = $currentSlide->createDrawingShape();
        $shape->setName('Pixelion logo')
            ->setDescription('Pixelion logo')
            ->setPath(Yii::getAlias('@webroot/uploads') . '/pres-logo.png')
            ->setHeight(60)
            ->setOffsetX(10)
            ->setOffsetY(10);
//$shape->getShadow()->setVisible(true)
//->setDirection(45)
// ->setDistance(10);
        $shape->getHyperlink()->setUrl('https://pixelion.com.ua')->setTooltip('Pixelion');
// Create a shape (text)
        echo date('H:i:s') . ' Create a shape (rich text)' . EOL;
        $shape = $currentSlide->createRichTextShape()
            ->setHeight(100)
            ->setWidth(700)
            ->setOffsetX(120)
            ->setOffsetY(180);
        $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $textRun = $shape->createTextRun($data2['text_1']);
        $textRun->getFont()->setBold(true)
            ->setSize(60)
            ->setColor(new Color('FFE06B20'));
        echo date('H:i:s') . ' Create a shape (rich text) 2' . EOL;
        $shape = $currentSlide->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(100)
            ->setOffsetY(400);
        $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $textRun = $shape->createTextRun($data2['text_2']);
        $textRun->getFont()->setBold(true)
            ->setSize(16)
            ->setColor(new Color('FF000000'));


        echo date('H:i:s') . ' Create slide 2' . EOL;
        $currentSlide2 = $objPHPPresentation->createSlide();
// Create a shape (drawing)
        echo date('H:i:s') . ' Create a shape (drawing)2.1' . EOL;
        $shape = $currentSlide2->createDrawingShape();
        $shape->setName('Pixelion logo')
            ->setDescription('Pixelion logo')
            //->setPath(Yii::getAlias('@vendor/phpoffice/phppresentation/samples/resources').'/phppowerpoint_logo.gif')
            ->setPath(Yii::getAlias('@webroot/uploads') . '/pres-logo.png')
            ->setHeight(60)
            ->setOffsetX(10)
            ->setOffsetY(10);
//$shape->getShadow()->setVisible(true)
//->setDirection(45)
//->setDistance(10);
        $shape->getHyperlink()->setUrl('https://pixelion.com.ua')->setTooltip('Pixelion');
// Create a shape (text)
        echo date('H:i:s') . ' Create a shape (rich text)2.1' . EOL;
        $shape = $currentSlide2->createRichTextShape()
            ->setHeight(300)
            ->setWidth(600)
            ->setOffsetX(170)
            ->setOffsetY(180);
        $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $textRun = $shape->createTextRun($data2['text_3']);
        $textRun->getFont()->setBold(true)
            ->setSize(30)
            ->setColor(new Color('FFE06B20'));

        $shape = $currentSlide2->createRichTextShape()
            // ->setHeight(50)
            ->setWidth(600)
            ->setOffsetX(100)
            ->setOffsetY(300);
        $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRun = $shape->createTextRun($data2['text_4']);
        $textRun->getFont()->setBold(true)
            ->setSize(24)
            ->setColor(new Color('FF000000'));

// Save file

        echo $helper->write($objPHPPresentation, basename(__FILE__, '.php'), $writers,$lang);
    }
}


