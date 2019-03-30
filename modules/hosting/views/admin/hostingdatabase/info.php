<?php
use panix\engine\Html;
?>


<table class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>size</th>
        <th>tables_count</th>
        <th>Опции</th>
    </tr>
    <?php foreach ($response as $data) { ?>
        <tr>
            <td><?= $data->id ?></td>
            <td><?= $data->name ?>
                <?php foreach ($data->users as $user) { ?>
                    <div>
                        <b>Пользователь</b> <?= $user->login ?>
                        <div class="btn-group">
                        <?= Html::a(Html::icon('delete'),['/admin/hosting/hostingdatabase/user-delete22','user'=>$user->login],['class'=>'btn btn-xs btn-default']); ?>
                            <?= Html::a(Html::icon('key'),['/admin/hosting/hostingdatabase/user-password','user'=>$user->login],['class'=>'btn btn-xs btn-default']); ?>
                    </div>
                        </div>
                    <div><b>Пароль</b> <?= $user->password ?></div>
                    <div><b>Привелегии</b> <?= implode(', ', $user->privileges); ?></div>
                <?php } ?>
            </td>
            <td><?= $data->size ?></td>
            <td><?= $data->tables_count ?></td>
            <td>
                        <?= Html::a(Html::icon('delete'),['/admin/hosting/hostingdatabase/database-delete','database'=>$data->name],['class'=>'btn btn-default']); ?>
                <?= Html::a('change-password',['/admin/hosting/hostingdatabase/user-password','user'=>$data->name],['class'=>'btn btn-default']); ?>
            </td>
        </tr>
    <?php } ?>
</table>
