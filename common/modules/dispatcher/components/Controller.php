<?php

namespace app\common\modules\dispatcher\components;

/**
 *
 * Class Controller
 * @package app\common\modules\dispatcher\components
 */
class Controller extends \yii\web\Controller
{
    /**
     * @param string $view
     * @param array $params
     * @return string
     * @throws \yii\base\InvalidParamException
     * @throws \yii\base\ViewNotFoundException
     * @throws \yii\base\InvalidCallException
     */
    public function render($view, $params = [])
    {
        $controller = str_replace('Controller', '', $this->module->defaultControllerName);

        $path = '@app/modules/dispatcher/' . $this->module->modulesDir . '/' . $this->id . '/views/' . $controller;

        return $this->getView()->render($path . '/' . 'index', $params, $this);
    }
}