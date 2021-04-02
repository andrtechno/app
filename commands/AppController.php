<?php

namespace app\commands;

use Yii;
use yii\helpers\FileHelper;
use panix\engine\console\controllers\ConsoleController;

/**
 * AppController
 */
class AppController extends ConsoleController
{

    /**
     * Remove old logs
     * @param int $days diff days Default: 7
     * @throws \yii\base\ErrorException
     */
    public function actionClearLogs($days = 7)
    {
        //Find path for delete
        $logs = FileHelper::findDirectories(Yii::getAlias("@runtime/logs"), [
            'filter' => function ($path) use ($days) {
                $name = basename($path);
                $date = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $date->modify("-{$days} day");
                $now = $date->format('Y-m-d');
                return (strtotime($name) <= strtotime($now)) ? true : false;
            },
            'recursive' => false
        ]);

        foreach ($logs as $dir) {
            FileHelper::removeDirectory($dir);
        }

    }
}
