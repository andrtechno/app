<?php

use panix\engine\Html;

echo Html::a('hosting_quota', ['/admin/hosting/hostingquota'], ['class' => 'btn btn-default']);
echo Html::a('hosting_ftp', ['/admin/hosting/hostingftp'], ['class' => 'btn btn-default']);
echo Html::a('hosting_database', ['/admin/hosting/hostingdatabase'], ['class' => 'btn btn-default']);
echo Html::a('hosting_mailbox', ['/admin/hosting/hostingmailbox'], ['class' => 'btn btn-default']);
echo Html::a('hosting_site', ['/admin/hosting/hostingsite'], ['class' => 'btn btn-default']);
echo Html::a('hosting_account', ['/admin/hosting/hostingaccount'], ['class' => 'btn btn-default']);
echo Html::a('hosting_log', ['/admin/hosting/hostinglog'], ['class' => 'btn btn-default']);
echo Html::a('domain', ['/admin/hosting/domain'], ['class' => 'btn btn-default']);
echo Html::a('billing', ['/admin/hosting/billing'], ['class' => 'btn btn-default']);
echo Html::a('settings', ['/admin/hosting/settings'], ['class' => 'btn btn-success']);


echo '<br>';
echo Html::a('test #','#');
echo '<br>';
echo Html::a('test array',['http://adtest']);
echo '<br>';
echo Html::a('test http','http://corner-cms.com');
echo '<br>';
echo Html::a('test http addoptions "rel"','http://app2',['test'=>'dsa']);
echo '<br>';

echo Yii::$app->request->serverName;
if(strpos(Yii::$app->request->serverName,'app')===false){
    echo 'no';
}else{
    echo 'find';
}