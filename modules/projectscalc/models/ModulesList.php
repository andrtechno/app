<?php

Yii::import('mod.projectsCalc.models.ModulesListTranslate');

class ModulesList extends ActiveRecord {

    const MODULE_ID = 'projectsCalc';
    const route = '/projectsCalc/admin/modules';

    /**
     * Multilingual attrs
     */
    public $title;
    public $full_text;

    /**
     * Name of the translations model.
     */
    public $translateModelName = 'ModulesListTranslate';

    public function getForm() {
        Yii::app()->controller->widget('ext.tinymce.TinymceWidget');
        Yii::import('ext.bootstrap.selectinput.SelectInput');
        return new CMSForm(array(
            'attributes' => array(
                'id' => __CLASS__,
                'class' => 'form-horizontal',
            ),
            'showErrorSummary' => true,
            'elements' => array(
                'title' => array(
                    'type' => 'text',
                ),
                'type_id' => array(
                    'type' => 'SelectInput',
                    'data' => self::getTypeList()
                ),
                'documentation_id' => array(
                    'type' => 'SelectInput',
                    'data' => Documentation::flatTree(),
                    'htmlOptions' => array('empty' => '---')
                // 'data' => Html::listData(Documentation::model()->excludeRoot()->findAll(), 'id', 'name')
                ),
                'price' => array(
                    'type' => 'text',
                ),
                'full_text' => array(
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

    public function getGridTitle() {

        $html = CHtml::link($this->title, '', array(
                    'data-toggle' => 'popover',
                    'data-trigger' => 'focus',
                    'class' => 'popinfo',
                    'tabindex' => 0,
                    'role' => 'button',
                        // 'data-content'=>'dadas'
        ));
        $html .= '
<div class="popinfo-box hidden">
  <b>Example popover #2</b> - title
</div>';
        return $html;
    }

    public function getGridColumns() {
        return array(
            array(
                'name' => 'title',
                'type' => 'raw',
                'htmlOptions' => array('class' => 'text-left'),
                'value' => '$data->gridTitle',
            ),
            array(
                // 'class' => 'EditableColumn',
                'name' => 'price',
                'type' => 'raw',
                'htmlOptions' => array('class' => 'text-center'),
                'value' => '$data->price',
            ),
            array(
                'name' => 'type_id',
                'type' => 'raw',
                'htmlOptions' => array('class' => 'text-center'),
                'filter' => self::getTypeList(),
                'value' => '($data->type_id==1) ? Yii::t("app", "Модуль") : Yii::t("app", "Дополнение")'
            ),
            'DEFAULT_CONTROL' => array(
                'class' => 'ButtonColumn',
                'template' => '{print}{view}{update}{delete}',
                'buttons' => array(
                    'print' => array(
                        'icon' => 'icon-print',
                        'label' => Yii::t('default', 'PDF_ORDER'),
                        //'visible'=>'Yii::app()->user->openAccess(array("Cart.Default.*", "Cart.Default.Print"))',
                        'url' => 'Yii::app()->createUrl("/admin/projectsCalc/modules/print", array("id"=>$data->id))',
                    ),
                ),
            ),
            'DEFAULT_COLUMNS' => array(
                array('class' => 'CheckBoxColumn'),
            ),
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * @return Page the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{projects_calc_modules}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('title, full_text', 'type', 'type' => 'string'),
            array('title', 'length', 'min' => 3, 'max' => 140),
            array('title, price, type_id', 'required'),
            array('documentation_id', 'numerical', 'integerOnly' => true),
            array('id, type_id, title, full_text, documentation_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'translate' => array(self::HAS_ONE, $this->translateModelName, 'object_id'),
        );
    }

    public function behaviors() {
        $a = array();
        $a['TranslateBehavior'] = array(
            'class' => 'app.behaviors.TranslateBehavior',
            'translateAttributes' => array(
                'title',
                'full_text',
            ),
        );

        return $a;
    }

    public static function getTypeList() {
        return array(
            1 => 'Модуль',
            2 => 'Дополнение',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions. Used in admin search.
     * @return ActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        $criteria = new CDbCriteria;

        $criteria->with = array('translate');

        $criteria->compare('t.id', $this->id);
        $criteria->compare('translate.title', $this->title, true);
        $criteria->compare('translate.full_text', $this->full_text, true);


        return new ActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
