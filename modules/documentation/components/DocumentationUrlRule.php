<?php

namespace app\modules\documentation\components;

use app\modules\documentation\models\Documentation;
use yii\web\UrlRuleInterface;
use yii\base\Object;
use yii\web\UrlRule;

class DocumentationUrlRule extends UrlRule {
//class CategoryUrlRule extends Object implements UrlRuleInterface {
    // public $connectionID = 'db';
    public $pattern = 'documentation';
    public $route = 'documentation/default/view';

    public function createUrl($manager, $route, $params) {


        if ($route === 'documentation/default/view') {

            if (isset($params['seo_alias'])) {
                $url = trim($params['seo_alias'], '/');
                unset($params['seo_alias']);
            } else {
                $url = '';
            }
            $parts = [];
            if (!empty($params)) {
                foreach ($params as $key => $val) {
                    $parts[] = $key . '/' . $val;
                }
                $url .= '/' . implode('/', $parts);
            }

            return $url . \Yii::$app->urlManager->suffix;
        }

        return false;
    }

    public function parseRequest($manager, $request) {

        $params = [];
        $pathInfo = $request->getPathInfo();

        if (empty($pathInfo))
            return false;

        if (\Yii::$app->urlManager->suffix)
            $pathInfo = strtr($pathInfo, array(\Yii::$app->urlManager->suffix => ''));



        foreach ($this->getAllPaths() as $path) {

            if ($path['full_path'] !== '' && strpos($pathInfo, $path['full_path']) === 0) {
                $_GET['seo_alias'] = $path['full_path'];
                $uri = str_replace($path['full_path'],'',$pathInfo);
                $parts = explode('/', $uri);
                unset($parts[0]);
                //$pathInfo = implode($parts, '/');
                //   print_r(array_chunk($parts, 2));
                $ss = array_chunk($parts, 2);
                foreach($ss as $k=>$p){
                    // print_r($p);
                    $_GET[$p[0]] = $p[1];
                    $params[$p[0]]=$p[1];
                }
                // print_r($params); die;
                $params['seo_alias'] = ltrim($path['full_path']);


                return ['documentation/default/view', $params];
            }
        }

        return false;
    }

    protected function getAllPaths() {
        $allPaths = \Yii::$app->cache->get(__CLASS__);
        if ($allPaths === false) {
            $allPaths = (new \yii\db\Query())
                ->select(['full_path'])
                ->andWhere('id!=:id', [':id' => 1])
                ->from(Documentation::tableName())
                ->all();


            // Sort paths by length.
            usort($allPaths, function($a, $b) {
                return strlen($b['full_path']) - strlen($a['full_path']);
            });

            \Yii::$app->cache->set(__CLASS__, $allPaths);
        }

        return $allPaths;
    }

}
