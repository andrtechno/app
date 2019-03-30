<?php

namespace app\modules\hosting\controllers\admin;

use Yii;
use app\modules\hosting\components\Api;
use yii\base\Exception;

class HostinglogController extends CommonController {

    public function actionIndex() {

        return $this->render('index');
    }

    public function actionDates() {
        $api = new Api('hosting_log', 'dates', ['type' => 'ftp', 'host' => 'corner-cms.com']);
        if ($api->response->status == 'success') {
            return $this->render('dates', ['response' => $api->response->data]);
        } else {
            throw new Exception($api->response->message);
        }
    }

    public function actionView() {
        $api = new Api('hosting_log', 'view', [
            'type' => 'nginx',
            'host' => 'corner-cms.com',
            'rows_per_page' => 50,
            'page' => 2,
            /*'dtime' => [
                'date' => '2017-05-13', //YYYY-MM-DD
                'time_from' => '05:13', //hh:II
                'time_to' => '08-13', //hh:II
            ]*/
        ]);

        if ($api->response->status == 'success') {
            return $this->render('view', ['response' => $api->response->data]);
        } else {
            throw new Exception($api->response->message);
        }
    }

}
