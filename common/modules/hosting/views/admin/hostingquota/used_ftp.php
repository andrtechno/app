<table class="table table-bordered table-striped">
    <tr>
        <th>Домен</th>
        <th>Размер</th>
        <th>inode</th>
    </tr>
    <?php foreach ($response as $data) { ?>
        <tr>
            <td><?= $data->name ?></td>
            <td><?= $data->size ?></td>
            <td><?= $data->inode ?></td>
        </tr>
    <?php } ?>
</table>


