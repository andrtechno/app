<?php

namespace app\modules\seo\components;

use Yii;
use panix\engine\Html;
use app\modules\seo\models\SeoUrl;
use app\modules\seo\models\SeoMain;
use app\modules\seo\models\SeoParams;

class SeoExt extends \yii\base\Component {
    /* массив, который будет наполнятся тэгами, что бы исключать уже найденые теги в ссылках выше по иерархии */

    public $exist = array();

    public function getData() {
        $urls = $this->getUrls();
        foreach ($urls as $url) {
            $urlF = SeoUrl::find()->where(['url' => $url])->one();
            if ($urlF !== null) {
                return $urlF;
            }
        }
    }

    public function run() {
        $config = Yii::$app->settings->get('seo');
        if ($config['canonical']) {
            //if (Yii::$app->controller->canonical) {
            ////    $canonical = Yii::$app->controller->canonical;
            //} else {
                $canonical = Yii::$app->request->getHostInfo() . '/' . Yii::$app->request->getPathInfo();
           // }
       
           // Yii::$app->clientScript->registerLinkTag('canonical', null, $canonical);
            Yii::$app->view->registerLinkTag(['rel' => 'canonical', 'href' => $canonical]);
        }
       // if ($config['google_site_verification']) {
            //Yii::$app->clientScript->registerMetaTag($config['google_site_verification'], 'google-site-verification');
       // }
        //if ($config['yandex_verification']) {
            //Yii::$app->clientScript->registerMetaTag($config['yandex_verification'], 'yandex-verification');
        //}
        /*
         * получаем все возможные сслыки по Иерархии
         * Пример: исходная ссылка "site/product/type/34"
         * Результат:
          - site/product/type/34/*
          - site/product/type/34
          - site/product/type/*
          - site/product/type
          - site/product/*
          - site/product
          - site/*
          - site
          - /*
          - /
         * 
         * Изменена ****
         */

        $titleFlag = false;
        $urls = $this->getUrls();
        foreach ($urls as $url) {
            $urlF = SeoUrl::find()->where(['url' => $url])->one();

            if ($urlF !== null) {
                $this->seoName($urlF);
                $titleFlag = false;
                break;
            } else {
                $titleFlag = true;
            }
        }
        //if ($titleFlag)
        //$this->printMeta('title', Html::encode(Yii::$app->controller->pageTitle));
    }

    /*
      Данная функция находит все MetaName, по ссылке
      $url - ссылка по которой будут искаться теги
     */

    private function seoName($url) {
        $controller = Yii::$app->controller;
        if ($url->title) {
            if (isset($url->params)) {
              
                foreach ($url->params as $paramData) {
                    $param = $this->getSeoparam($paramData);

                    if ($param) {
                        $url->title = str_replace('{'.$param['tpl'].'}', $param['item'], $url->title);
                    }

                }
            }
            $this->printMeta('title', $url->title);
        } else {
            if (isset($controller->pageTitle)) {
                $this->printMeta('title', $controller->pageTitle);
            } else {
                $this->printMeta('title', Yii::$app->settings->get('app', 'site_name'));
            }
        }
        if ($url->keywords) {
            if (isset($url->params)) {
                foreach ($url->params as $paramData) {
                    $param = $this->getSeoparam($paramData);
                    if ($param) {
                        $url->keywords = str_replace($param['tpl'], $param['item'], $url->keywords);
                    }
                }
            }
            $this->printMeta('keywords', $url->keywords);
        } else {
            if (isset($controller->pageKeywords))
                $this->printMeta('keywords', $controller->pageKeywords);
        }
        if ($url->description) {
            if (isset($url->params)) {
                foreach ($url->params as $paramData) {
                    $param = $this->getSeoparam($paramData);
                    if ($param) {
                        $url->description = str_replace($param['tpl'], $param['item'], $url->description);
                    }
                }
            }
            $this->printMeta('description', $url->description);
        } else {
            if (isset($controller->pageDescription))
                $this->printMeta('description', $controller->pageDescription);
        }
    }

    /*
     * функция вывода Мета Тега на страницу
     * @name - название мета-тега
     * @content - значение
     */

    private function printMeta($name, $content) {

        $content = strip_tags($content);
        if ($name == "keywords")
            $content = str_replace(',', ", ", $content);
        if ($name == "title") {
            echo "<title>{$content}</title>\n";
        } else {
            Yii::$app->view->registerMetaTag(['name' => $name, 'content' => $content]);
            // echo "<meta name=\"{$name}\" content=\"{$content}\" />\n";
        }
    }

    private function getUrls() {
        $result = null;
        $urls = Yii::$app->request->url;
        if (Yii::$app->languageManager->default->code != Yii::$app->language) {
            $urls = str_replace('/' . Yii::$app->language, '', $urls);
        }

        $data = explode("/", $urls);
        $count = count($data);

        while (count($data)) {
            $_url = "";
            $i = 0;
            foreach ($data as $key => $d) {
                $_url .= $i++ ? "/" . $d : $d;
            }
            if ($count == 1) {
                $result[] = $_url;
                $result[] = $_url . "/*";
            } else {
                $result[] = $_url . "/*";
                $result[] = $_url;
            }

            unset($data[$key]);
        }
        //$result[] = "/*";
        //$result[] = "/";
        $result22 = array_unique($result);
        return $result22;
    }

    /*
     * функция возвращающая значение параметра если он указан
     * Существуют два типа параметров прямой (ModelName/attribyte) или по связи (ModelName/relation.attribyte)
     */

    private function getSeoparam($pdata) {

        $urls = Yii::$app->request->url;

        $data = explode("/", $urls);
        $id = $data[count($data) - 1];
        /* если есть символ ">>" значит параметр по связи */

       // $param = $pdata->obj;
        $tpl = $pdata->param;
        if (strstr($tpl, ".")) {
            $paramType = true;
            $data = explode(".", $tpl);
            $tpl2 = explode("/", $data[0]);
        } else {
            $paramType = false;
            $tpl2 = explode("/", $tpl);
        }

        if (class_exists($pdata->modelClass, false)) {
            $item = new $pdata->modelClass;
            if (is_string($id)) {
                $item = $item->find()->where(['seo_alias' => $id])->one();
            } else {
                $item = $item->findOne($id);
            }

            //echo $item['seo_alias'];die;
            if (count($item)) {
               // var_dump($pdata->param);
               // var_dump($pdata->obj);die;
               // if($pdata->obj){
       
                return [
                    'tpl' =>  $tpl,
                    'item' => ($paramType) ? $item[$tpl2[1]][$data[1]] : $item[$tpl2[0]],
                ];
               // }
            }
        } else {

            return false;
        }
    }




}
