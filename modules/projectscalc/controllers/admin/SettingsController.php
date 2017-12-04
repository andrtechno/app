<?php
namespace app\modules\projectscalc\controllers\admin;
class SettingsController extends \panix\engine\controllers\AdminController {

    public $topButtons = false;

    public function actionIndex() {
        $this->pageName = Yii::t('app', 'SETTINGS');
        $this->breadcrumbs = array(
            $this->module->name => $this->module->adminHomeUrl,
            $this->pageName
        );

        $model = new SettingsProjectsCalcForm;
        $this->topButtons = array(
            array('label' => Yii::t('app', 'RESET_SETTINGS'),
                'url' => $this->createUrl('resetSettings', array(
                    'model' => get_class($model),
                )),
                'htmlOptions' => array('class' => 'btn btn-default')
            )
        );
        if (isset($_POST['SettingsProjectsCalcForm'])) {
            $model->attributes = $_POST['SettingsProjectsCalcForm'];
            if ($model->validate()) {
                $model->save();
                $this->refresh();
            }
        }
        $this->render('index', array('model' => $model));
    }

}
