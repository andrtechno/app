<?php

use panix\engine\Html;

echo Html::a('hosting_quota', ['/admin/hosting/hostingquota'], ['class' => 'btn btn-default']);
echo Html::a('hosting_ftp', ['/admin/hosting/hostingftp'], ['class' => 'btn btn-default']);
echo Html::a('hosting_database', ['/admin/hosting/hostingdatabase'], ['class' => 'btn btn-default']);
echo Html::a('hosting_mailbox', ['/admin/hosting/hostingmailbox'], ['class' => 'btn btn-default']);
echo Html::a('hosting_log', ['/admin/hosting/hostinglog'], ['class' => 'btn btn-default']);
echo Html::a('domain', ['/admin/hosting/domain'], ['class' => 'btn btn-default']);
echo Html::a('billing', ['/admin/hosting/billing'], ['class' => 'btn btn-default']);
echo Html::a('settings', ['/admin/hosting/settings'], ['class' => 'btn btn-success']);

