<?php
use panix\engine\CMS;
?>



<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>date</th>
            <th>ip</th>
            <th>request</th>
        </tr>
        <?php foreach ($response->log as $data) { ?>
            <tr>
                <td><?= $data->date; ?></td>
                <td><?= CMS::ip($data->ip); ?></td>
                <td><?= $data->request; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>