<table class="table table-striped table-bordered table-condensed table-responsive" id="container-param-<?= $model->id ?>" style="margin-top:30px">
    <tr>
        <th>Шаблон</th>
        <th class="text-center" width="10%"><?= Yii::t('app', 'OPTIONS') ?></th>
    </tr>
    <?php
    $params = SeoParams::model()->findAllByAttributes(array('url_id' => $model->id));
    foreach ($params as $param) {
        $paramrep = str_replace('{', '', $param->param);
        $paramrep = str_replace('}', '', $paramrep);
        $paramrep = str_replace('.', '', $paramrep);
        ?>
        <tr id="<?= $paramrep . $model->id ?>">
            <td>
                <?php echo Html::hiddenField("param[$model->id][$param->obj]", $param->param); ?>
                <?php //echo Html::hiddenField("param[$model->id][$model->name][]",$param->obj);?>
                <?php echo $param->param ?> 
            </td>
            <td class="text-center">
                <a href="javascript:void(0);" onclick="removeParam(this);" class="btn btn-xs btn-danger"><i class="icon-delete"></i></a>
            </td>
        </tr>
    <?php } ?>
</table>