<?php
use yii\helpers\Html;
use panix\engine\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use panix\ext\taginput\TagInput;
use panix\ext\tinymce\TinyMce;

\app\modules\seo\assets\SeoAsset::register($this);

?>


<script>
    $(function () {

        jQuery.fn.exists = function () {
            return this.length > 0;
        };

        $('.addparams').change(function () {
            var val = $('option:selected', this).val();
            var id = $(this).attr('data-id');
            var text = $('option:selected', this).text();
            rowID = text + id;
            rowID = rowID.replace(".", "");
            if (!$('#' + rowID).exists()) {
                $('#container-param-' + id).append('<tr id="' + rowID + '"><td><input type="hidden" name="param[' + id + '][' + val + ']" value="{' + text + '}" /><code>{' + text + '}</code></td><td class="text-center"><a href="javascript:void(0);" onclick="removeParam(this);" class="btn btn-xs btn-danger"><i class="icon-delete"></i></a></td></tr>');
            } else {
                common.notify('Уже добавлен!', 'error');
            }

        });
    });

    function removeParam(that) {
        $(that).parent().parent().remove();
    }
</script>


<?php
$form = ActiveForm::begin([
    'title' => Html::encode($this->context->pageName)
]);
?>


<?= $form->field($model, 'url')->textInput() ?>
<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'description')->textInput() ?>
<?= $form->field($model, 'keywords')->widget(TagInput::class, [
])->hint(Yii::t('seo/default', 'KEYWORDS_HINT'));
?>
<?= $form->field($model, 'h1')->textInput() ?>
<?= $form->field($model, 'text')->widget(TinyMce::class, [
    'options' => ['rows' => 6],

]); ?>


<div class="form-group">
    <div class="col-sm-4"></div>
    <div class="col-sm-8"><?php echo Html::dropDownList('title_param', "[$model->keywords]param", ArrayHelper::map($this->context->getParams(), "value", "name", 'group'), array("empty" => "Свойства", 'class' => 'selectpicker addparams', 'data-id' => $model->id)); ?>
        <?php echo $this->render('_formMetaParams', array('model' => $model)); ?></div>
</div>
<div class="form-group" style="display:none;">
    <div class="col-sm-4"><?php echo Html::dropDownList("name", "", array("robots" => "robots", "author" => "author", "copyright" => "copyright"), array("empty" => "change")) ?>
    </div>
    <div class="col-sm-8">
        <?php echo Html::button("add meta name", array('class' => "meta-name")); ?>
        <span id="load-meta-name"></span>
    </div>
</div>

<div class="form-group text-center">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'CREATE') : Yii::t('app', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
