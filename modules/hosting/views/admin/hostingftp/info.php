
<table class="table table-bordered table-striped">
    <tr>
        <th>id</th>
        <th>login</th>
        <th>password</th>
        <th>homedir</th>
        <th>readonly</th>
    </tr>
    <?php foreach ($response as $data) { ?>
        <tr>
            <td><?= $data->id ?></td>
            <td><?= $data->login ?></td>
            <td><?= $data->password ?></td>
            <td><?= $data->homedir ?></td>
            <td><?= $data->readonly ?></td>
        </tr>
    <?php } ?>
</table>








