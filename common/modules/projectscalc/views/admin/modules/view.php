<?php
$back = ProjectHelper::privatBank();
Yii::app()->tpl->openWidget(array(
    'title' => $this->pageName,
));
?>
<?= $model->full_text; ?>



<?php
Yii::app()->tpl->closeWidget();
?>

<div class="text-right">
    <div style="font-size:30px;">
        <span class="text-danger"><?= $model->price; ?></span>
        <span style="font-size:20px;">$</span>
    </div>
    <div style="font-size:30px;">
        <span class="text-danger"><?= $model->price * $back['UAH']; ?></span>
        <span style="font-size:20px;">грн.</span>
    </div>
</div>
