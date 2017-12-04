<?php
$config = Yii::app()->settings->get('contacts');
$phones = explode(',', $config['phone']);
$emails = explode(',', $config['form_emails']);
?>

<table class="" style="width: 100%;">
    <tbody>
        <tr>
            <td style="width: 50%;">
                <div>
                    <?php foreach ($phones as $phone) { ?>
                        <?php //echo $phone ?>
                    <?php } ?>
                </div>
            </td>
            <td style="width: 50%;text-align:right;" class="text-right">
                страница {PAGENO} из {nbpg}
            </td>
        </tr>
    </tbody>
</table>

