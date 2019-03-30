<?php
use app\modules\seo\models\SeoParams;
use panix\engine\Html;
?>

<table class="table table-striped table-bordered table-condensed table-responsive" id="container-param-<?= $model->id ?>" style="margin-top:30px">
    <tr>
        <th>Шаблон</th>
        <th class="text-center" width="10%"><?= Yii::t('app', 'OPTIONS') ?></th>
    </tr>
    <?php
    $params = SeoParams::find()->where(['url_id' => $model->id])->all();
    foreach ($params as $param) {
        $paramrep = str_replace('{', '', $param->param);
        $paramrep = str_replace('}', '', $paramrep);
        $paramrep = str_replace('.', '', $paramrep);
        ?>
        <tr id="<?= $paramrep . $model->id ?>">
            <td>
                <?php echo Html::hiddenInput("param[$model->id][$param->obj]", $param->modelClass); ?>
                <?php //echo Html::hiddenField("param[$model->id][$model->name][]",$param->obj);?>
                <code>{<?= $param->param ?>}</code>
            </td>
            <td class="text-center">
                <a href="javascript:void(0);" class="btn btn-xs btn-danger deleteproperty"><i class="icon-delete"></i></a>
            </td>
        </tr>
    <?php } ?>
</table>