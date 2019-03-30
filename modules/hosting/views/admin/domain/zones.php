<?php

function brandsort($a, $b) {
    return strnatcmp($a->classname, $b->classname);
}

$array = array();
foreach ($response as $data) {

    $array[$data->class->name][] = (object) array(
                'domain_name' => $data->name,
                'domain_price' => ($data->is_action) ? $data->price_action : $data->price,
                'original_price' => $data->price,
                'classname' => $data->class->name,
                'is_action' => $data->is_action,
                'action_comment' => $data->action_comment
    );
}
?>





<?php

use panix\engine\bootstrap\ActiveForm;
use panix\engine\Html;
use panix\ext\taginput\TagInput;

$form = ActiveForm::begin();
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Проверка доменов</h3>
    </div>
    <div class="panel-body">
        <?=
                $form->field($model, 'name')
                ->widget(TagInput::className(), ['placeholder' => 'E-mail'])
                ->hint('Введите E-mail и нажмите Enter');
        ?>

        <div class="form-group text-center">
            <?= Html::submitButton(Yii::t('app', 'Проверить'), ['class' => 'btn btn-success']) ?>
        </div>










        <?php if ($checkData) { ?>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th class="text-center">Домен</th>
                        <th class="text-center">Состояние</th>
                        <th class="text-center">Домен</th>
                        <th class="text-center">Комментарий</th>
                    </tr>
                    <?php foreach ($checkData as $domain => $result) { ?>
                        <tr>
                            <td>


                                <?php
                                if ($result[0]->available) {
                                    echo $domain;
                                } else {
                                    echo Html::a($domain, '//'.$domain, ['target' => '_black']);
                                }
                                ?>



                            </td>
                            <td class="text-center"><?php echo $result[0]->available ? '<span class="label label-success">свободен</span>' : '<span class="label label-danger">занят</span>'; ?></td>
                            <td class="text-center">
                                <?php echo (isset($result[0]->reason)) ? '<span class="text-danger">' . $result[0]->reason . '<span>' : '---'; ?></td>
                            <td class="text-center"><?php echo $this->context->getReasonCode($result[0]); ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $this->context->pageName ?></h3>
    </div>
    <div class="panel-body">

        <table class="table table-bordered">
            <?php foreach ($array as $key => $items) { ?>
                <tr>
                    <th colspan="6" class="text-center bg-primary"><?= $key ?></th>
                </tr>
                <?php
                usort($items, 'brandsort');
                $i = 0;
                foreach ($items as $kz => $row) {
                    $i++;
                    ?>

                    <td class="<?= ($row->is_action) ? 'bg-danger' : ''; ?> text-left">
                        <?php
                        if ($model->domain) {
                            $checked = (in_array($row->domain_name, $model->domain)) ? true : false;
                        } else {
                            $checked = false;
                        }
                        echo Html::checkbox('DomainCheckForm[domain][]', $checked, ['value' => $row->domain_name]);
                        ?>
                        <b><?= $row->domain_name ?></b> 
                        <?php if ($row->is_action) { ?>
                            <i class="icon-discount hint_popup text-info" data-toggle="hover" data-placement="right" data-trigger="hover" data-html="true" title="Скидка на <?= $row->domain_name; ?>" data-content="<?= $row->action_comment ?>"></i>

                        <?php } ?>

                    </td>
                    <td class="<?= ($row->is_action) ? 'bg-danger' : ''; ?> text-center" style="width:10%;">
                        <?php if ($row->is_action) { ?>
                        <span class="text-success"><?= $row->domain_price ?> грн.</span><br/>
                            <small class="text-danger"><span style="text-decoration: line-through;"><?= $row->original_price ?></span> грн.</small>
                        <?php } else { ?>
                            <span class="text-success"><?= $row->original_price ?> грн.</span>
                        <?php } ?>

                    </td>

                    <?php if ($i % 3 == 0) { ?>
                        <tr></tr>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
</div>
<?php ActiveForm::end(); ?>