<?php

namespace app\web\themes\autima\settings;


use Yii;
use panix\engine\ThemeSettingsModel;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

class ThemeForm extends ThemeSettingsModel
{

    protected $module = 'admin';
    public static $category = 'autima';

    public $logo;
    public $favicon;
    public $theme_color;

    public static function defaultSettings()
    {
        return [
            'logo' => 'logo.png',
            'favicon' => null,
            'theme_color' => '#222222'
        ];
    }

    public function rules()
    {

        return [
            ['logo', 'validateWatermarkFile'],
            ['theme_color', 'string', 'min' => 7, 'max' => 7],
        ];
    }


    public function validateWatermarkFile($attr)
    {
        $file = UploadedFile::getInstance($this, 'logo');
        if ($file) {
            $allowedExts = ['jpg', 'gif', 'png'];
            if (!in_array($file->getExtension(), $allowedExts))
                $this->addError($attr, self::t('ERROR_WM_NO_IMAGE'));
        }
    }

    /**
     * @inheritdoc
     */
    public function behaviors2()
    {


        return [
            'uploadFile' => [
                'class' => 'panix\engine\behaviors\UploadFileBehavior',
                'files' => [
                    'logo' => '@uploads',
                ],
                'options' => [
                    'watermark' => false
                ]
            ]
        ];
    }
}
