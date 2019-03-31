<?php
namespace app\modules\seo\controllers\admin;

use app\modules\seo\models\Redirects;
use Yii;

class RedirectsController extends \panix\engine\controllers\AdminController {

    public function actions() {
        return array(
            'delete' => array(
                'class' => 'ext.adminList.actions.DeleteAction',
            ),
            'switch' => array(
                'class' => 'ext.adminList.actions.SwitchAction',
            ),
        );
    }

    public function actionIndex() {
        $this->pageName = Yii::t('seo/default', 'REDIRECTS');

        $this->breadcrumbs = array(
            Yii::t('seo/default', 'MODULE_NAME') => array('/admin/seo'),
            $this->pageName
        );
        $model = new Redirects('search');
        $model->unsetAttributes();
        if (!empty($_GET['Redirects']))
            $model->attributes = $_GET['Redirects'];

        $this->render('index', array('model' => $model));
    }

    /**
     * Create or update new page
     * @param boolean $new
     */
    public function actionUpdate($new = false) {
        if ($new === true) {
            $model = new Redirects;
        } else {
            $model = Redirects::model()
                    ->findByPk($_GET['id']);
        }

        if (!$model)
            throw new CHttpException(404);

        $this->pageName = Yii::t('seo/default', 'REDIRECTS');

        $this->breadcrumbs = array(
            Yii::t('seo/default', 'MODULE_NAME') => array('/admin/seo'),
            $this->pageName
        );
        if (Yii::app()->request->isPostRequest) {
            $model->attributes = $_POST['Redirects'];
            if ($model->validate()) {
                $model->save();
                $this->redirect(['/admin/seo/redirects']);
            }
        }
        $this->render('update', array('model' => $model));
    }


    public function getAddonsMenu() {
        return array(
            array(
                'label' => Yii::t('app', 'SETTINGS'),
                'url' => array('/admin/seo/settings'),
                'icon' => Html::icon('icon-settings'),
                'visible'=>Yii::app()->user->openAccess(array('Seo.Settings.*', 'Seo.Settings.Index')),
            ),
        );
    }
}
