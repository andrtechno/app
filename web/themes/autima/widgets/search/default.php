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
    /*echo Html::textInput('q',$value,[
        'id' => 'searchInput-'.$id,
        'placeholder' => 'Поиск...',
        //'class' => 'form-control'
    ])*/
    ?>
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
<div id="search-input-search"></div>
<?php
/*
$this->registerJs("
    var xhr_search;
    var input = $('#searchInput-{$id}');
    var searchResult = $('#search-input-search');
    
    
    $(document).on('click',function (event) {
        //console.log($(this));
        searchResult.css({'display':'none'});
    });
    
    input.focus(function (event) {
        if(!searchResult.is(':empty')){
        searchResult.css({'display':'block'});
        }
    });
    
    input.keydown(function (event) {
        if (event.which == 13)
            $('search-form-'.$id).submit();
    });
    
    input.keyup(function(){
        var input = $(this);
        if(input.val().length >= 3){
                    
            if(xhr_search && xhr_search.readyState != 4){
                xhr_search.abort();
            }
            
            xhr_search = $.ajax({
                url: '" . Url::to(['/shop/search/ajax']) . "',
                data: {q: input.val()},
                dataType: 'json',
                success: function(response){

                    if(response.count){
                        searchResult.html(response.data).css({'display':'block'});
                    }
                },
                beforeSend: function(){
                    searchResult.css({'display':'none'});
                    input.addClass('loading');
                },
                complete: function(){
                    input.removeClass('loading');
                },
                error: function () {
                }
            });
        }
    });

    
", \yii\web\View::POS_END);
*/
?>
