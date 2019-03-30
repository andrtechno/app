<?php

use panix\engine\bootstrap\ActiveForm;
use panix\engine\Html;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Yii::t('hosting/default', 'HOSTINGFTP_INFO') ?></h3>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'account')->dropDownList($model->getAccounts()); ?>
        <div class="form-group text-center">
            <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>



        <?php
        if ($response) {
            echo Html::a('access-edit', ['/admin/hosting/hostingftp/access-edit', 'account' => $model->account], ['class' => 'btn btn-default']);
            ?>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Логин </th>
                    <th>Пароль</th>
                    <th>Каталог доступа</th>
                    <th>Только для чтения</th>
                    <th><?= Yii::t('app', 'OPTIONS'); ?></th>
                </tr>
                <?php foreach ($response as $data) { ?>
                    <tr>
                        <td><?= $data->id ?></td>
                        <td><?= $data->login ?></td>
                        <td><?= $data->password ?></td>
                        <td><?= $data->homedir ?></td>
                        <td class="text-center">
                            <?php
                            if ($data->readonly) {
                                $class = 'default';
                                $text = Yii::t('app', 'YES');
                            } else {
                                $class = 'success';
                                $text = Yii::t('app', 'NO');
                            }
                            ?>
                            <span class="label label-<?= $class ?>"><?= $text ?></span>
                        </td>
                        <td class="text-center">
                            <?= Html::a(Html::icon('edit'), ['/admin/hosting/hostingftp/create', 'account' => $model->account, 'login' => $data->login], ['class' => 'btn btn-default']); ?>
                            <?= Html::a(Html::icon('delete'), ['/admin/hosting/hostingftp/delete', 'account' => $model->account, 'ftp' => $data->login], ['class' => 'btn btn-default']); ?>

                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </div>
</div>






