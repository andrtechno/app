<?php

namespace app\modules\presentation\models;

use Yii;
use panix\engine\Html;
use panix\engine\db\ActiveRecord;
use PhpOffice\PhpPresentation\IOFactory;
use app\modules\presentation\components\PhpPptTree;

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

class Presentation extends ActiveRecord
{

    const MODULE_ID = 'presentation';
    const route = '/presentation/admin';
    // public $filename;
    public $extensions = ['pptx', 'odp'];
    protected $textList = [];

    public function getGridName()
    {
        return Yii::t('presentation/default', 'AGREEMENTS_NAME', array(
            '{client}' => 123
        ));
    }

    protected $htmlOutput;

    protected function append($sHTML)
    {
        $this->htmlOutput .= $sHTML;
    }

    public function beforeSave($insert)
    {
        if (strpos($this->filename, '.odp')) {
            $pptReader = IOFactory::createReader('ODPresentation');
        } elseif (strpos($this->filename, '.pptx')) {
            $pptReader = IOFactory::createReader('PowerPoint2007');
        } else {
            die('error');
        }

        //  $pptReader = IOFactory::createReader('PowerPoint2007');
        //$pptReader = IOFactory::createReader('PowerPoint97');
        $oPHPPresentation = $pptReader->load(Yii::getAlias('@webroot/uploads/presentation') . '/' . $this->filename);

        $oTree = new PhpPptTree($oPHPPresentation);

        // print_r($oTree);die;


        $this->praseTest($oPHPPresentation);
//echo $this->htmlOutput;
        //  die;
        $this->text = implode(',', $this->textList);

        return parent::beforeSave($insert);
    }

    public function getGridFileInfo(){
        $html = '';


        if($this->file_category){
            $html .= '<b>Категория:</b> '.$this->file_category.'<br/>';
        }
        if($this->file_company){
            $html .= '<b>Company:</b> '.$this->file_company.'<br/>';
        }
        if($this->file_creator){
            $html .= '<b>Creator:</b> '.$this->file_creator.'<br/>';
        }
        if($this->file_created){
            $html .= '<b>Create:</b> '.$this->file_created.'<br/>';
        }
        if($this->file_modified){
            $html .= '<b>Update:</b> '.$this->file_modified.'<br/>';
        }


        if($this->file_description){
            $html .= '<b>Description:</b> '.$this->file_description.'<br/>';
        }
        if($this->file_keywords){
            $html .= '<b>Keywords:</b> '.$this->file_keywords.'<br/>';
        }


        if($this->file_title){
            $html .= '<b>Title:</b> '.$this->file_title.'<br/>';
        }
        if($this->file_subject){
            $html .= '<b>Subject:</b> '.$this->file_subject.'<br/>';
        }
        if($this->file_last_modified){
            $html .= '<b>file_last_modified:</b> '.$this->file_last_modified.'<br/>';
        }



        return '<a href="javascript:void(0)" class="btn btn-link" data-toggle="popover" title="File information" data-content="'.$html.'">View info</a>';
    }
    private function praseTest(PhpPresentation $oPHPPpt)
    {

        $this->slides = $oPHPPpt->getSlideCount();
        $this->name = (empty($oPHPPpt->getLayout()->getDocumentLayout()) ? 'Custom' : $oPHPPpt->getLayout()->getDocumentLayout());
        $this->width = $oPHPPpt->getLayout()->getCX(DocumentLayout::UNIT_MILLIMETER);
        $this->height = $oPHPPpt->getLayout()->getCY(DocumentLayout::UNIT_MILLIMETER);



        $this->file_category = $oPHPPpt->getDocumentProperties()->getCategory();
        $this->file_company = $oPHPPpt->getDocumentProperties()->getCompany();
        $this->file_created = $oPHPPpt->getDocumentProperties()->getCreated();
        $this->file_creator = $oPHPPpt->getDocumentProperties()->getCreator();
        $this->file_description = $oPHPPpt->getDocumentProperties()->getDescription();
        $this->file_keywords = $oPHPPpt->getDocumentProperties()->getKeywords();
        $this->file_last_modified = $oPHPPpt->getDocumentProperties()->getLastModifiedBy();
        $this->file_modified = $oPHPPpt->getDocumentProperties()->getModified();
        $this->file_subject = $oPHPPpt->getDocumentProperties()->getSubject();
        $this->file_title = $oPHPPpt->getDocumentProperties()->getTitle();

        foreach ($oPHPPpt->getAllSlides() as $oSlide) {
            $this->append('<div class="infoBlk layout" id="div' . $oSlide->getHashCode() . 'Info">');
            $this->append('<dl>');
            $this->append('<dt>HashCode</dt><dd>' . $oSlide->getHashCode() . '</dd>');
            // $this->append('<dt>Slide Layout</dt><dd>Layout::' . $this->getConstantName('\PhpOffice\PhpPresentation\Slide\Layout', $oSlide->getSlideLayout()) . '</dd>');

            $this->append('<dt>Offset X</dt><dd>' . $oSlide->getOffsetX() . '</dd>');
            $this->append('<dt>Offset Y</dt><dd>' . $oSlide->getOffsetY() . '</dd>');
            $this->append('<dt>Extent X</dt><dd>' . $oSlide->getExtentX() . '</dd>');
            $this->append('<dt>Extent Y</dt><dd>' . $oSlide->getExtentY() . '</dd>');
            $oBkg = $oSlide->getBackground();
            if ($oBkg instanceof Slide\AbstractBackground) {
                if ($oBkg instanceof Slide\Background\Color) {
                    $this->append('<dt>Background Color</dt><dd>#' . $oBkg->getColor()->getRGB() . '</dd>');
                }
                if ($oBkg instanceof Slide\Background\Image) {
                    $sBkgImgContents = file_get_contents($oBkg->getPath());
                    $this->append('<dt>Background Image</dt><dd><img src="data:image/png;base64,' . base64_encode($sBkgImgContents) . '"></dd>');
                }
            }
            $oNote = $oSlide->getNote();
            if ($oNote->getShapeCollection()->count() > 0) {
                $this->append('<dt>Notes</dt>');
                foreach ($oNote->getShapeCollection() as $oShape) {
                    if ($oShape instanceof RichText) {
                        $this->append('<dd>' . $oShape->getPlainText() . '</dd>');
                    }
                }
            }


            foreach ($oSlide->getShapeCollection() as $oShape) {
                if ($oShape instanceof Group) {
                    foreach ($oShape->getShapeCollection() as $oShapeChild) {
                        $this->displayShapeInfo($oShapeChild);
                    }
                } else {
                    $this->displayShapeInfo($oShape);
                }
            }
        }


    }

    protected function displayShapeInfo(AbstractShape $oShape)
    {
        $this->append('<div class="infoBlk shape" id="div' . $oShape->getHashCode() . 'Info">');
        $this->append('<dt>HashCode</dt><dd>' . $oShape->getHashCode() . '</dd>');
        $this->append('<dt>Offset X</dt><dd>' . $oShape->getOffsetX() . '</dd>');
        $this->append('<dt>Offset Y</dt><dd>' . $oShape->getOffsetY() . '</dd>');
        $this->append('<dt>Height</dt><dd>' . $oShape->getHeight() . '</dd>');
        $this->append('<dt>Width</dt><dd>' . $oShape->getWidth() . '</dd>');
        $this->append('<dt>Rotation</dt><dd>' . $oShape->getRotation() . '°</dd>');
        $this->append('<dt>Hyperlink</dt><dd>' . ucfirst(var_export($oShape->hasHyperlink(), true)) . '</dd>');
        $this->append('<dt>IsPlaceholder</dt><dd>' . ($oShape->isPlaceholder() ? 'true' : 'false') . '</dd>');
        if ($oShape instanceof Drawing\Gd) {
            $this->append('<dt>Name</dt><dd>' . $oShape->getName() . '</dd>');
            $this->append('<dt>Description</dt><dd>' . $oShape->getDescription() . '</dd>');
            ob_start();
            call_user_func($oShape->getRenderingFunction(), $oShape->getImageResource());
            $sShapeImgContents = ob_get_contents();
            ob_end_clean();
            $this->append('<dt>Mime-Type</dt><dd>' . $oShape->getMimeType() . '</dd>');
            $this->append('<dt>Image</dt><dd><img src="data:' . $oShape->getMimeType() . ';base64,' . base64_encode($sShapeImgContents) . '"></dd>');
        } elseif ($oShape instanceof Drawing) {
            $this->append('<dt>Name</dt><dd>' . $oShape->getName() . '</dd>');
            $this->append('<dt>Description</dt><dd>' . $oShape->getDescription() . '</dd>');
        } elseif ($oShape instanceof RichText) {
            $this->append('<dt># of paragraphs</dt><dd>' . count($oShape->getParagraphs()) . '</dd>');
            $this->append('<dt>Inset (T / R / B / L)</dt><dd>' . $oShape->getInsetTop() . 'px / ' . $oShape->getInsetRight() . 'px / ' . $oShape->getInsetBottom() . 'px / ' . $oShape->getInsetLeft() . 'px</dd>');
            $this->append('<dt>Text</dt>');
            $this->append('<dd>');
            foreach ($oShape->getParagraphs() as $oParagraph) {
                $this->append('Paragraph<dl>');
                $this->append('<dt>Alignment Horizontal</dt><dd> Alignment::' . $this->getConstantName('\PhpOffice\PhpPresentation\Style\Alignment', $oParagraph->getAlignment()->getHorizontal()) . '</dd>');
                $this->append('<dt>Alignment Vertical</dt><dd> Alignment::' . $this->getConstantName('\PhpOffice\PhpPresentation\Style\Alignment', $oParagraph->getAlignment()->getVertical()) . '</dd>');
                $this->append('<dt>Alignment Margin (L / R)</dt><dd>' . $oParagraph->getAlignment()->getMarginLeft() . ' px / ' . $oParagraph->getAlignment()->getMarginRight() . 'px</dd>');
                $this->append('<dt>Alignment Indent</dt><dd>' . $oParagraph->getAlignment()->getIndent() . ' px</dd>');
                $this->append('<dt>Alignment Level</dt><dd>' . $oParagraph->getAlignment()->getLevel() . '</dd>');
                $this->append('<dt>Bullet Style</dt><dd> Bullet::' . $this->getConstantName('\PhpOffice\PhpPresentation\Style\Bullet', $oParagraph->getBulletStyle()->getBulletType()) . '</dd>');
                if ($oParagraph->getBulletStyle()->getBulletType() != Bullet::TYPE_NONE) {
                    $this->append('<dt>Bullet Font</dt><dd>' . $oParagraph->getBulletStyle()->getBulletFont() . '</dd>');
                    $this->append('<dt>Bullet Color</dt><dd>' . $oParagraph->getBulletStyle()->getBulletColor()->getARGB() . '</dd>');
                }
                if ($oParagraph->getBulletStyle()->getBulletType() == Bullet::TYPE_BULLET) {
                    $this->append('<dt>Bullet Char</dt><dd>' . $oParagraph->getBulletStyle()->getBulletChar() . '</dd>');
                }
                if ($oParagraph->getBulletStyle()->getBulletType() == Bullet::TYPE_NUMERIC) {
                    $this->append('<dt>Bullet Start At</dt><dd>' . $oParagraph->getBulletStyle()->getBulletNumericStartAt() . '</dd>');
                    $this->append('<dt>Bullet Style</dt><dd>' . $oParagraph->getBulletStyle()->getBulletNumericStyle() . '</dd>');
                }
                $this->append('<dt>Line Spacing</dt><dd>' . $oParagraph->getLineSpacing() . '</dd>');
                $this->append('<dt>RichText</dt><dd><dl>');
                foreach ($oParagraph->getRichTextElements() as $oRichText) {
                    if ($oRichText instanceof BreakElement) {
                        $this->append('<dt><i>Break</i></dt>');
                    } else {
                        if ($oRichText instanceof TextElement) {
                            $this->append('<dt><i>TextElement</i></dt>');
                        } else {
                            $this->append('<dt><i>Run</i></dt>');
                        }
                        $this->textList[] = $oRichText->getText();
                        $this->append('<dd>' . $oRichText->getText());
                        $this->append('<dl>');
                        $this->append('<dt>Font Name</dt><dd>' . $oRichText->getFont()->getName() . '</dd>');
                        $this->append('<dt>Font Size</dt><dd>' . $oRichText->getFont()->getSize() . '</dd>');
                        $this->append('<dt>Font Color</dt><dd>#' . $oRichText->getFont()->getColor()->getARGB() . '</dd>');
                        $this->append('<dt>Font Transform</dt><dd>');
                        $this->append('<abbr title="Bold">Bold</abbr> : ' . ($oRichText->getFont()->isBold() ? 'Y' : 'N') . ' - ');
                        $this->append('<abbr title="Italic">Italic</abbr> : ' . ($oRichText->getFont()->isItalic() ? 'Y' : 'N') . ' - ');
                        $this->append('<abbr title="Underline">Underline</abbr> : Underline::' . $this->getConstantName('\PhpOffice\PhpPresentation\Style\Font', $oRichText->getFont()->getUnderline()) . ' - ');
                        $this->append('<abbr title="Strikethrough">Strikethrough</abbr> : ' . ($oRichText->getFont()->isStrikethrough() ? 'Y' : 'N') . ' - ');
                        $this->append('<abbr title="SubScript">SubScript</abbr> : ' . ($oRichText->getFont()->isSubScript() ? 'Y' : 'N') . ' - ');
                        $this->append('<abbr title="SuperScript">SuperScript</abbr> : ' . ($oRichText->getFont()->isSuperScript() ? 'Y' : 'N'));
                        $this->append('</dd>');
                        if ($oRichText instanceof TextElement) {
                            if ($oRichText->hasHyperlink()) {
                                $this->append('<dt>Hyperlink URL</dt><dd>' . $oRichText->getHyperlink()->getUrl() . '</dd>');
                                $this->append('<dt>Hyperlink Tooltip</dt><dd>' . $oRichText->getHyperlink()->getTooltip() . '</dd>');
                            }
                        }
                        $this->append('</dl>');
                        $this->append('</dd>');
                    }
                }
                $this->append('</dl></dd></dl>');
            }
            $this->append('</dd>');
        } else {
            // Add another shape
        }

    }

    protected function getConstantName($class, $search, $startWith = '')
    {
        $fooClass = new \ReflectionClass($class);
        $constants = $fooClass->getConstants();
        $constName = null;
        foreach ($constants as $key => $value) {
            if ($value == $search) {
                if (empty($startWith) || (!empty($startWith) && strpos($key, $startWith) === 0)) {
                    $constName = $key;
                }
                break;
            }
        }
        return $constName;
    }

    public function getGridColumns()
    {
        return [
            [
                'attribute' => 'id',
                'header' => 'name',
                'format' => 'raw',
                'contentOptions' => array('class' => 'text-left'),
                //'value' => '$data->gridName',
            ],
            'date_create' => [
                'attribute' => 'date_create',
                //'value' => 'CMS::date($data->date_create)',
            ],
            'date_update' => [
                'attribute' => 'date_update',
                //'value' => 'CMS::date($data->date_update)',
            ],
            'DEFAULT_CONTROL' => [
                'class' => 'panix\engine\grid\columns\ActionColumn',
                // 'template' => '{update}{delete}',
            ],
            'DEFAULT_COLUMNS' => [
                ['class' => 'panix\engine\grid\columns\CheckboxColumn'],
            ],
        ];
    }


    /**
     * @return string the associated database table name
     */
    public static function tableName()
    {
        return '{{%presentation}}';
    }


    public function rules()
    {
        return [
            [
                ['filename'],
                'file',
                'checkExtensionByMimeType' => false,
                'skipOnEmpty' => false,
                'extensions' => $this->extensions
            ],
            //[['filename'], 'string'],
            [['slides'], 'integer'],
            [['filename'], 'required'],
        ];
    }


    private function parseFilePPTX()
    {

    }

}
