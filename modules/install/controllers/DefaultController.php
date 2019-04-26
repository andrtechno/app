<?php

namespace app\modules\install\controllers;

use panix\engine\controllers\WebController;
use Yii;
use panix\engine\behaviors\wizard\WizardBehavior;
use panix\engine\behaviors\wizard\WizardEvent;

class DefaultController extends WebController
{

    public $layout = '@app/modules/install/views/layouts/install';
    public $process;
    public $title;
    public $cacheTime = 0;
    public $event;
    public $model;
    public $currentStepIndex = 0;

    public function getViewPath()
    {
        return Yii::getAlias('@app/modules/install/views/' . $this->id);
    }

    public function behaviors()
    {
        return [
            'wizard' => [
                'class' => WizardBehavior::class,
                'steps' => [
                    Yii::t('install/default', 'STEP_START') => 'chooseLanguage',
                    Yii::t('install/default', 'STEP_LICENSE') => 'license',
                    Yii::t('install/default', 'STEP_INFO') => 'info',
                    Yii::t('install/default', 'STEP_DB') => 'db',
                    Yii::t('install/default', 'STEP_CONFIGURE') => 'configure',
                ],
                'autoAdvance' => false,
                'events' => [
                    WizardBehavior::EVENT_WIZARD_START => 'wizardStart',
                    WizardBehavior::EVENT_WIZARD_PROCESS_STEP => 'wizardProcessStep',
                    WizardBehavior::EVENT_WIZARD_FINISHED => 'wizardFinished',
                    WizardBehavior::EVENT_WIZARD_INVALID_STEP => 'wizardInvalidStep',
                ],
            ]
        ];
    }

    public function actionIndex($step = null)
    {

        /* $config = [
             'steps' => [
                 Yii::t('install/default', 'STEP_START') => 'chooseLanguage',
                 Yii::t('install/default', 'STEP_LICENSE') => 'license',
                 Yii::t('install/default', 'STEP_INFO') => 'info',
                 Yii::t('install/default', 'STEP_DB') => 'db',
                 Yii::t('install/default', 'STEP_CONFIGURE') => 'configure',
             ],
             'autoAdvance' => false,
             'events' => [
                 WizardBehavior::EVENT_WIZARD_START => 'wizardStart',
                 WizardBehavior::EVENT_WIZARD_PROCESS_STEP => 'wizardProcessStep',
                 WizardBehavior::EVENT_WIZARD_FINISHED => 'wizardFinished',
                 WizardBehavior::EVENT_WIZARD_INVALID_STEP => 'wizardInvalidStep',
             ],
         ];
         if (!empty($config)) {
             $config['class'] = WizardBehavior::class;
             $this->attachBehavior('wizard', $config);
         }*/
        $this->process($step);


           // if (isset($step)) {
                return $this->render($step, [
                    'event' => $this->event,
                    'model' => $this->model,
                ]);
           // }

        // print_r($this->process($step));die;

        // return $this->process($step);
    }

    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;

        if ($exception !== null) {
            $statusCode = $exception->statusCode;
            $name = $exception->getName();
            $message = $exception->getMessage();

            $this->layout = '@app/modules/install/views/layouts/error';

            return $this->render('@app/modules/install/views/layouts/_error', [
                'exception' => $exception,
                'statusCode' => $statusCode,
                'name' => $name,
                'message' => $message
            ]);
        }
    }

    // Wizard Behavior WizardEvent Handlers

    /**
     * Raised when the wizard starts; before any steps are processed.
     * MUST set $event->handled=true for the wizard to continue.
     * Leaving $event->handled===false causes the onFinished event to be raised.
     * @param WizardEvent The event
     */
    public function wizardStart($event)
    {
        $event->handled = true;
    }

    /**
     * Raised when the wizard detects an invalid step
     * @param WizardEvent The event
     */
    public function wizardInvalidStep($event)
    {
        Yii::$app->getSession()->addFlash('notice', $event->step . ' is not a vaild step in this wizard');
    }

    /**
     * The wizard has finished; use $event->step to find out why.
     * Normally on successful completion ($event->step===true) data would be saved
     * to permanent storage; the demo just displays it
     * @param WizardEvent The event
     */
    public function wizardFinished($event)
    {
        if ($event->step === true)
            echo $this->render('@app/modules/install/views/default/completed', compact('event'));
        else
            echo $this->render('@app/modules/install/views/default/finished', compact('event'));

        $event->sender->reset();
        Yii::$app->end();
    }

    /**
     * Process wizard steps.
     * The event handler must set $event->handled=true for the wizard to continue
     * @param WizardEvent The event
     */
    public function wizardProcessStep($event)
    {
        $read = $event->sender->read();

        if (isset($read['chooseLanguage'])) {
            Yii::$app->language = $read['chooseLanguage']['lang'];
        }


        $modelName = 'app\\modules\\install\\forms\\' . ucfirst($event->step);
        $model = new $modelName();
        $model->attributes = $event->data;
        $post = Yii::$app->request->post();

        switch ($event->step) {
            case 'db':
                if (isset($_POST['Db'])) {
                    $model->attributes = $_POST['Db'];
                    if ($model->validate()) {
                        Yii::$app->cache->flush();
                        $model->install();
                    }
                }
                break;
            case 'completed':
                //Yii::$app->cache->flush();
                //FileSystem::fs('assets', Yii::getPathOfAlias('webroot'))->cleardir();
                break;
            case 'configure':
                if (isset($_POST['Configure'])) {
                    $model->attributes = $_POST['Configure'];
                    if ($model->validate()) {
                        $model->install($read['license']['license_key']);
                    }
                }
                break;
            default:
                break;
        }

        if ($model->load($post) && $model->validate()) {
            $this->event = $event;
            $this->model = $model;
            $this->save($model->attributes);
            $event->handled = true;
        } else {
            $this->event = $event;
            $this->model = $model;
        }
    }

}
