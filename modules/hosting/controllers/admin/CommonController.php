<?php

namespace app\modules\hosting\controllers\admin;

use Yii;

class CommonController extends \panix\engine\controllers\AdminController {

    public function beforeAction($event) {
        $this->pageName = Yii::t('hosting/default', 'MODULE_NAME');
        $bc = [];

        $controller = basename($this->id);
        $action = $this->action->id;
        $actionName = str_replace('-','_',strtoupper($action));
        $controllerName = strtoupper($controller);
        if ($controller == 'default') {
            if ($controller == 'default' && $action == 'index') {
                $bc[] = $this->pageName;
            } else {
                $bc[] = [
                    'label' => $this->pageName,
                    'url' => ['/admin/' . $this->module->id]
                ];
                $bc[] = Yii::t('hosting/default', $actionName);
            }
        } else {
            if ($action == 'index') {
                $bc[] = [
                    'label' => $this->pageName,
                    'url' => ['/admin/' . $this->module->id]
                ];
                $bc[] = Yii::t('hosting/default', $controllerName);
            } else {
                $bc[] = [
                    'label' => $this->pageName,
                    'url' => ['/admin/' . $this->module->id]
                ];
                $bc[] = [
                    'label' => Yii::t('hosting/default', $controllerName),
                    'url' => ['/admin/' . $this->module->id . '/' . $controller]
                ];
                $bc[] = Yii::t('hosting/default', $controllerName.'_'.$actionName);
            }
        }

        $this->breadcrumbs = $bc;

        return parent::beforeAction($event);
    }
    
    

}
