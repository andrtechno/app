<?php

use panix\engine\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\helpers\Url;
$id = $this->context->id;
?>
<div class="search_box">
    <?= Html::beginForm(Yii::$app->urlManager->createUrl(['/shop/search/index', 'q' => $value]), 'post', ['id' => 'search-form-'.$id]) ?>
    <?php
    echo AutoComplete::widget([
        'id' => 'searchInput-'.$id,
        'name' => 'q',
        'value' => $value,
        //'model'=>$searchModel,
        //'attribute' => 'name',
        'options' => ['placeholder' => 'Поиск...', 'class' => 'form-control'],
        'clientOptions' => [
            'source' => new JsExpression('function (request, response) {
                    $.ajax({
                        url: "' . Url::to(['/shop/search/ajax']) . '",
                        data: { q: request.term },
                        dataType: "json",
                        success: response,
                        beforeSend: function(){
                            $("#searchInput-'.$id.'").addClass("loading");
                        },
                        complete: function(){
                            $("#searchInput-'.$id.'").removeClass("loading");
                        },
                        error: function () {
                            response([]);
                        }
                    });
                }'),
            'minLength' => 0,
            'create' => new JsExpression('function( event, ui ) {
                    $("#searchInput-'.$id.'").autocomplete( "instance" )._renderItem = function( ul, item ) {
                        return $( "<li></li>" ).data( "item.autocomplete", item ).append(item.renderItem).appendTo( ul );
                    };
                }'),
            'select' => new JsExpression('function( event, ui ) {
                    window.location.href = ui.item.url;
                    return false;
                }'),
        ],
    ]);
    ?>

    <?= Html::submitButton(Html::icon('search'), ['class' => 'btn btn-secondary']); ?>
    <?= Html::endForm() ?>
</div>
<?php
$this->registerJs("
    $(function () {
        $('#searchQuery').keydown(function (event) {
            if (event.which == 13) {
                $('#search-form').submit();
            }
        });
    });
", \yii\web\View::POS_END);

?>
