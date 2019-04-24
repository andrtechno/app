
<?php

$s_bdate = "26.05.1988";
if($model->id ==1){
?>
<h3>Семенов Андрей</h3>
<p><b>Возраст:</b> <?= CMS::age($s_bdate) . " " . CMS::years(CMS::age($s_bdate));?></p>
<?php } ?>

<?= Html::text($model->full_text); ?>

