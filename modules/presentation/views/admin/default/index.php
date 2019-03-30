<?php

use panix\engine\Html;



echo Yii::$app->request->serverName;
if(strpos(Yii::$app->request->serverName,'app')===false){
    echo 'no';
}else{
    echo 'find';
}