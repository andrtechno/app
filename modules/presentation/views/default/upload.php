<?php
use yii\widgets\ActiveForm;
use panix\engine\Html;

?>
<div class="row">
    <div class="col-4">
        <div class="card mb-3">
            <div class="card-header">
                <h5>Example files</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    These files are automatically generated using this application.
                </div>

                <h6 class="card-text">English language</h6>
                <ul class="list-unstyled">
                    <li>
                        <a href="/uploads/example-en.odp" class="btn btn-sm btn-link">Download (.odp)</a>
                    </li>
                    <li>
                        <a href="/uploads/example-en.pptx" class="btn btn-sm btn-link">Download (.pptx)</a>
                    </li>
                </ul>

                <br/>
                <h6 class="card-text">Russian language</h6>


                <ul class="list-unstyled">
                    <li>
                        <a href="/uploads/example-ru.odp" class="btn btn-sm btn-link">Download (.odp)</a>
                    </li>
                    <li>
                        <a href="/uploads/example-ru.pptx" class="btn btn-sm btn-link">Download (.pptx)</a>
                    </li>
                </ul>


            </div>
        </div>
    </div>
    <div class="col-8">

        <h1>Upload file</h1>
        <div class="alert alert-info">
            <?= Yii::t('yii', 'Only files with these extensions are allowed: {extensions}.', ['extensions' => implode(', ', $model->extensions)]); ?>
        </div>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="text-center">
            <?= $form->field($model, 'filename')->fileInput() ?>



            <?= Html::submitButton(Yii::t('app', 'Upload'), ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>
