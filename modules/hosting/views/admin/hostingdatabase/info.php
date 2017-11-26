


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
                    <div><b>login</b> <?= $user->login ?></div>
                    <div><b>password</b> <?= $user->password ?></div>
                    <div><b>privileges</b> <?= implode(', ', $user->privileges); ?></div>
                <?php } ?>
            </td>
            <td><?= $data->size ?></td>
            <td><?= $data->tables_count ?></td>
            <td><?= panix\engine\Html::a('delete',['/admin/hosting/hostingdatabase/database-delete','database'=>$data->name]) ?></td>
        </tr>
    <?php } ?>
</table>
