<?php

namespace app\modules\seo\models;

class SettingsForm extends \panix\engine\SettingsModel
{
    protected $module = 'seo';
    const NAME = 'seo';
    public $googleanalytics_id;
    public $googletag_id;
    public $yandexmetrika_id;
    public $yandexmetrika_clickmap;
    public $yandexmetrika_trackLinks;
    public $yandexmetrika_webvisor;
    public $canonical;
    public $google_site_verification;
    public $yandex_verification;

    public static function defaultSettings()
    {
        return array(
            'googleanalytics_id' => null,
            'googletag_id' => null,
            'yandexmetrika_id' => null,
            'yandexmetrika_clickmap' => true,
            'yandexmetrika_trackLinks' => true,
            'yandexmetrika_webvisor' => true,
            'canonical' => true,
            'google_site_verification' => '',
            'yandex_verification' => '',
        );
    }

    public function getForm()
    {
        return new TabForm(array(
            'attributes' => array(
                'id' => __CLASS__,
                'class' => 'form-horizontal',
            ),
            'showErrorSummary' => false,
            'elements' => array(
                'global' => array(
                    'type' => 'form',
                    'title' => Yii::t('app', 'Global'),
                    'elements' => array(
                        'canonical' => array('type' => 'checkbox'),
                    )
                ),
                'google' => array(
                    'type' => 'form',
                    'title' => Yii::t('app', 'Google'),
                    'elements' => array(
                        'google_site_verification' => array('type' => 'text'),
                        'googleanalytics_id' => array('type' => 'text', 'hint' => 'UA-12345678-9'),
                        'googletag_id' => array('type' => 'text', 'hint' => 'GTM-123AB45'),
                    )
                ),
                'yandex' => array(
                    'type' => 'form',
                    'title' => Yii::t('app', 'Yandex'),
                    'elements' => array(
                        'yandex_verification' => array('type' => 'text'),
                        'yandexmetrika_id' => array('type' => 'text'),
                        'yandexmetrika_clickmap' => array('type' => 'checkbox', 'labelHint' => self::t('YANDEXMETRIKA_CLICKMAP_HINT')),
                        'yandexmetrika_trackLinks' => array('type' => 'checkbox', 'labelHint' => self::t('YANDEXMETRIKA_TRACKLINKS_HINT')),
                        'yandexmetrika_webvisor' => array('type' => 'checkbox', 'labelHint' => self::t('YANDEXMETRIKA_WEBVISOR_HINT')),
                    )
                ),
            ),
            'buttons' => array(
                'submit' => array(
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'label' => Yii::t('app', 'SAVE')
                )
            )
        ), $this);
    }

    public function rules()
    {
        return [
            ['canonical', 'boolean']
            //('yandexmetrika_clickmap, yandexmetrika_trackLinks, yandexmetrika_webvisor, canonical', 'boolean'),
            //[]'googleanalytics_id, googletag_id, google_site_verification, yandex_verification', 'type', 'type' => 'string'),
            //('yandexmetrika_id', 'numerical', 'integerOnly' => true),
            //('googleanalytics_id', 'length', 'max' => 13, 'min' => 13),
        ];
    }

}
