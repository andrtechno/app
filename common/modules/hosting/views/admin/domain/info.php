<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>Домен</th>
            <th>valid_untill</th>
            <th>owner</th>
            <th>admin_c</th>
            <th>tech_c</th>
            <th>admtools_domain</th>
            <th>redirect_status</th>
            <th>redirect_url</th>
            <th>email_redirect</th>
            <th>email_redirect_active</th>
            <th>parking_page_enabled</th>
            <th>parking_page_content</th>
        </tr>
        <?php foreach ($response as $data) { ?>
            <tr>
                <td><?= $data->id; ?></td>
                <td><?= $data->name; ?></td>
                <td><?= $data->valid_untill; ?></td>
                <td><?= $data->owner; ?></td>
                <td><?= $data->admin_c; ?></td>
                <td><?= $data->tech_c; ?></td>
                <td><?= $data->admtools_domain; ?></td>
                <td><?= $data->redirect_status; ?></td>
                <td><?= $data->redirect_url; ?></td>
                <td><?= $data->email_redirect; ?></td>
                <td><?= $data->email_redirect_active; ?></td>
                <td><?= $data->parking_page_enabled; ?></td>
                <td><?= $data->parking_page_content; ?></td>

            </tr>
        <?php } ?>
    </table>
</div>


