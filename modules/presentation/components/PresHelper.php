<?php

namespace app\modules\presentation\components;

use Yii;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Slide;
use PhpOffice\PhpPresentation\Shape\RichText;
use PhpOffice\PhpPresentation\Autoloader;
use PhpOffice\PhpPresentation\Settings;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\AbstractShape;
use PhpOffice\PhpPresentation\DocumentLayout;
use PhpOffice\PhpPresentation\Shape\Drawing;
use PhpOffice\PhpPresentation\Shape\RichText\BreakElement;
use PhpOffice\PhpPresentation\Shape\RichText\TextElement;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Style\Bullet;
use PhpOffice\PhpPresentation\Style\Color;

class PresHelper {

    public function getEndingNotes($writers)
    {
        $result = '';

        // Do not show execution time for index
        if (!IS_INDEX) {
            $result .= date('H:i:s') . " Done writing file(s)" . EOL;
            $result .= date('H:i:s') . " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB" . EOL;
        }

        // Return
        if (CLI) {
            $result .= 'The results are stored in the "results" subdirectory.' . EOL;
        } else {
            if (!IS_INDEX) {
                $types = array_values($writers);
                $result .= '<p>&nbsp;</p>';
                $result .= '<p>Results: ';
                foreach ($types as $type) {
                    if (!is_null($type)) {
                        $resultFile = 'results/' . SCRIPT_FILENAME . '.' . $type;
                        if (file_exists($resultFile)) {
                            $result .= "<a href='{$resultFile}' class='btn btn-primary'>{$type}</a> ";
                        }
                    }
                }
                $result .= '</p>';
            }
        }

        return $result;
    }


    /**
     * Creates a templated slide
     *
     * @param PHPPresentation $objPHPPresentation
     * @return \PhpOffice\PhpPresentation\Slide
     */
    public function createTemplatedSlide(PhpPresentation $objPHPPresentation)
    {
        // Create slide
        $slide = $objPHPPresentation->createSlide();

        // Add logo
        $shape = $slide->createDrawingShape();
        $shape->setName('PHPPresentation logo')
            ->setDescription('PHPPresentation logo')
            ->setPath('./resources/phppowerpoint_logo.gif')
            ->setHeight(36)
            ->setOffsetX(10)
            ->setOffsetY(10);
        $shape->getShadow()->setVisible(true)
            ->setDirection(45)
            ->setDistance(10);

        // Return slide
        return $slide;
    }


    public function write($phpPresentation, $filename, $writers, $lang)
    {
        $result = '';
            $time=time();
        // Write documents
        foreach ($writers as $writer => $extension) {
            $result .= date('H:i:s') . " Write to {$writer} format";
            if (!is_null($extension)) {
//die(Yii::getAlias('@webroot/uploads'). "/output_{$filename}.{$extension}");
                $xmlWriter = IOFactory::createWriter($phpPresentation, $writer);
                $xmlWriter->save(Yii::getAlias('@webroot/uploads'). "/{$filename}-{$lang}.{$extension}");
                // rename(__DIR__ . "/{$filename}.{$extension}", __DIR__ . "/results/{$filename}.{$extension}");
            } else {
                $result .= ' ... NOT DONE!';
            }
            $result .= EOL;
        }

        $result .= $this->getEndingNotes($writers);

        return $result;
    }

}
