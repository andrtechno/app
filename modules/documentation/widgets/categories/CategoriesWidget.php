<?php

namespace app\modules\documentation\widgets\categories;

use app\modules\documentation\models\Documentation;
use app\modules\documentation\models\CategoryNode;
use panix\engine\data\Widget;
use yii\helpers\Html;
use Yii;


class CategoriesWidget extends Widget {

    public function init() {
        //$this->publishAssets();
    }

    public function run() {

        $model = Documentation::findOne(1);

        if (!$model) {
            die(__CLASS__.'err');
        } else {
            $result = $model->menuArray();
        }

        return $this->render($this->skin, ['result' => $result]);
    }

    public function recursive($data, $i = 0) {
        $html = '';

        if (isset($data)) {
            $html .= Html::beginTag('ul');
            foreach ($data as $obj) {

                $i++;
                if (isset($_GET['seo_alias']) && stripos($_GET['seo_alias'], $obj['url']['seo_alias']) !== false) {
                    $ariaExpanded = 'true';
                    $collapseClass = 'collapse in';
                } else {
                    $ariaExpanded = 'false';
                    $collapseClass = 'collapse';
                }
                if(Yii::$app->request->get('seo_alias')){
                    $activeClass = ($obj['url']['seo_alias'] === $_GET['seo_alias']) ? 'active' : '';
                }else{
                    $activeClass='';
                }


                $html .= Html::beginTag('li', array('class' => $activeClass));
                if (isset($obj['items'])) {
                    $html .= Html::a($obj['label'], '#collapse' . $obj['id'], array(
                        'data-toggle' => 'collapse',
                        'aria-expanded' => $ariaExpanded,
                        'aria-controls' => 'collapse' . $obj['id'],
                        'class' => 'collapsed plus-minus'
                    ));
                    $html .= Html::beginTag('div', array('class' => $collapseClass, 'id' => 'collapse' . $obj['id']));
                    $html .= $this->recursive($obj['items'], $i);

                    $html .= Html::endTag('div');
                } else {

                    // $html .= Html::a($obj['label'], Yii::$app->urlManager->createUrl([$obj['url'][0], ['seo_alias' => $obj['url']['seo_alias']]]));
                    $html .= Html::a($obj['label'], Yii::$app->urlManager->createUrl($obj['url']));
                }
                $html .= Html::endTag('li');
            }
            $html .= Html::endTag('ul');
        } else {
            $parent[$obj['id']] = $obj['id'];
            $html .= Html::a($data['label'], '');
        }
        return $html;
    }

}
