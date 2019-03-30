<?php
use panix\engine\Html;
use app\modules\install\forms\ChooseLanguage;
?>

<div style="padding:15px">
<div class="form-group text-center">
    <?php echo Html::a(Yii::t('install/default', 'VIEW_WEBSITE'), '/', array('class' => 'btn btn-success')) ?> 
    <?php echo Html::a(Yii::t('install/default', 'CONTROL_PANEL'), '/admin', array('class' => 'btn btn-primary')) ?>
</div>
<?php
$this->title = 'Финиш';
if ($event->step) {
   // echo CHtml::tag('p', array(), 'The wizard finished on step ' . $event->sender->getStepLabel($event->step));

    foreach ($event->sender->read() as $step => $data) {
       // echo CHtml::tag('h2', array(), $event->sender->getStepLabel($step));
        echo ('<ul class="list-unstyled">');
        foreach ($data as $k => $v) {


            if (is_array($v)) {
                // echo "<li>".Yii::t('install/default',  strtoupper($k)).":</li>";
                /* foreach($v as $v2){
                  echo $v2;
                  echo '<br>';
                  } */
            } elseif (is_bool($v)) {
                $value = ($v) ? '<span class="label label-danger">' . Yii::t('app', 'YES') . '</span>' : '<span class="label label-success">' . Yii::t('app', 'NO') . '</span>';
                echo "<li>" . Yii::t('install/default', strtoupper($k)) . ": $value</li>";
            } else {
                if ($step == 'chooseLanguage') {
                    $langsClass = new ChooseLanguage;
                    $langs = $langsClass::getLangs();
                    echo "<li><b>$langs[$v]</b></li>";
                } else {
                    echo "<li>" . Yii::t('install/default', strtoupper($k)) . ": <b>$v</b></li>";
                }
            }
        }
        echo ('</ul>');
    }
} else {
    echo '<p>The wizard did not start</p>';
}
?>
</div>
