<?php

namespace app\modules\projectscalc\models;
use Yii;
use panix\engine\behaviors\TranslateBehavior;
use app\modules\projectscalc\models\translate\OffersRedactionTranslate;
class OffersRedaction extends \panix\engine\db\ActiveRecord {

    const MODULE_ID = 'projectscalc';
    const route = '/projectscalc/admin/offersRedaction';



    public function getForm2() {
        Yii::import('ext.bootstrap.selectinput.SelectInput');
        Yii::app()->controller->widget('ext.tinymce.TinymceWidget');

        return new CMSForm(array(
            'attributes' => array(
                'id' => __CLASS__,
                'class' => 'form-horizontal',
            ),
            'showErrorSummary' => true,
            'elements' => array(
                'text' => array(
                    'type' => 'textarea',
                    'class' => 'editor'
                ),
            ),
            'buttons' => array(
                'submit' => array(
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'label' => $this->isNewRecord ? Yii::t('app', 'CREATE', 0) : Yii::t('app', 'SAVE')
                )
            )
                ), $this);
    }

    public function getGridColumns2() {
        return array(
            array(
                'name' => 'id',
                'type' => 'raw',
                'htmlOptions' => array('class' => 'text-left'),
                'value' => '$data->getOfferName()',
            ),
            array(
                'name' => 'date_create',
                'value' => 'CMS::date($data->date_create)',
            ),
            array(
                'name' => 'date_update',
                'value' => 'CMS::date($data->date_update)',
            ),
            'DEFAULT_CONTROL' => array(
                'class' => 'ButtonColumn',
                'template' => '{update}{delete}',

            ),
            'DEFAULT_COLUMNS' => array(
                array('class' => 'CheckBoxColumn'),
            ),
        );
    }

    public function getOfferName() {
        return 'Редакция предложения №' . $this->id;
    }


    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return '{{%offers_redaction}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules2() {
        return array(
            array('text', 'required'),
            array('date_create', 'date', 'format' => 'yyyy-MM-dd HH:mm:ss'),
            array('id, text, date_update, date_create', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations2() {
        return array(
            'offer_translate' => array(self::HAS_ONE, $this->translateModelName, 'object_id'),
        );
    }

    public function getTranslations() {
        return $this->hasMany(OffersRedactionTranslate::className(), ['object_id' => 'id']);
    }
    public function behaviors() {
        return \yii\helpers\ArrayHelper::merge([
                    'translate' => [ //offer_translate
                        'class' => TranslateBehavior::className(),
                        'translationAttributes' => [
                            'text'
                        ]
                    ],
                        ], parent::behaviors());
    }

}
