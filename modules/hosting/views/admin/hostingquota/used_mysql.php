<table class="table table-bordered table-striped">
    <tr>
        <th>Домен</th>
        <th>Размер</th>
    </tr>
    <?php foreach ($response as $data) { ?>
        <tr>
            <td><?= $data->name; ?></td>
            <td><?= $data->size; ?></td>
        </tr>
    <?php } ?>
</table>

