<?php

namespace app\modules\seo\plugins;

use Yii;
use yii\helpers\Url;
use yii\web\Application;

/**
 * Class SeoPlugin
 * @package app\modules\seo\plugins
 */
class SeoPlugin
{
    /**
     * Set page suffix
     * Handler for yii\base\Application::beforeRequest
     */
    public static function clearUrl()
    {
        $redirectList = ['/index.php', '/site', '/site/index'];
        $request = Yii::$app->request->url;
        if (in_array($request, $redirectList)) {

            return Yii::$app->response->redirect(Url::to('/'), 301)->send();

        }
    }

    /**
     * Set page suffix
     * Handler for yii\web\View::beginPage
     */
    public static function title()
    {
        $title = Yii::$app->settings->get('app', 'sitename');
        if (Yii::$app instanceof Application === true) {
            if (Yii::$app->request->get('page') !== null) {
                Yii::$app->view->title .= Yii::t(
                    'seo/default',
                    'TITLE_PAGE',
                    ['page' => (int)Yii::$app->request->get('page')]
                );
            }
            if (!empty(Yii::$app->view->title)) {
                Yii::$app->view->title .= ' / ' . $title;
            }else{
                Yii::$app->view->title .= $title;
            }
        }

    }


}