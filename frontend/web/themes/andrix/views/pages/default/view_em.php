
<form action="<?= $model->getUpdateUrl(); ?>" method="POST" id="edit_mode">
    <h1 id="Page[title]" class="edit_mode_title"><?= $model->title; ?></h1>
    <div id="Page[full_text]" class="edit_mode_text"><?= Html::text($model->full_text); ?></div>
</form>
