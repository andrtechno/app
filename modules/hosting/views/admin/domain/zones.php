<?php
function brandsort($a, $b) {
    return strnatcmp($a->classname, $b->classname);
}
$array = array();
foreach ($response as $data) {
//print_r($data);
    $array[$data->class->name][] = (object) array(
        'domain_name' => $data->name,
        'domain_price' => ($data->is_action)?$data->price_action :$data->price,
        'original_price' => $data->price,
        'classname' => $data->class->name,
        'is_action'=>$data->is_action,
        'action_comment'=>$data->action_comment
    );
}
?>

<table class="table table-bordered">
    <?php foreach ($array as $key => $items) { ?>
        <tr>
            <th colspan="6" class="text-center bg-warning"><?= $key ?></th>
        </tr>
        <?php
        usort($items, 'brandsort');
        $i = 0;
        foreach ($items as $kz => $row) {
            $i++;
            ?>

            <td style="text-align: center">
            <?= $row->domain_name ?>
                <?php if($row->is_action){ ?>
                <i class="icon-discount hint_popup text-info" data-toggle="hover" data-placement="right" data-trigger="hover" data-html="true" title="Скидка на <?= $row->domain_name; ?>" data-content="<?= $row->action_comment ?>"></i>

                <?php } ?>
               
            </td>
            <td style="width:10%;text-align: center">
                    <?php if($row->is_action){ ?>
                   <span class="text-success"><?= $row->domain_price ?> грн.</span>
                   <small class="text-danger"><span style="text-decoration: line-through;"><?= $row->original_price ?></span> грн.</small>
                    <?php }else{ ?>
                   <span class="text-success"><?= $row->original_price ?> грн.</span>
                    <?php } ?>
             
            </td>

            <?php if ($i % 3 == 0) { ?>
                <tr></tr>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</table>

