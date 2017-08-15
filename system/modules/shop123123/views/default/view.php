<?php
//use Yii;
use app\modules\pages\Module;

?>

<h1><?= $model->name ?></h1>
<p><?= $model->text ?></p>
<?php
//print_r($model->user)
echo Yii::t('app','Param');
echo '<br>';
echo \Yii::$app->language;;
echo Module::t('default','MODNAME');

?>

