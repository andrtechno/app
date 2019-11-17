<?php
use yii\helpers\Html;
use panix\mod\shop\models\Product;

$cm = Yii::$app->currency;
$minPrice = Yii::$app->controller->getMinPrice();
$maxPrice = Yii::$app->controller->getMaxPrice();


//if (($minPrice && $maxPrice) && ($minPrice !== $maxPrice)) {
$getDefaultMin = floor($minPrice);
$getDefaultMax = ceil($maxPrice);
$getMax = Yii::$app->controller->getCurrentMaxPrice();
$getMin = Yii::$app->controller->getCurrentMinPrice();


$min = (int)floor($getMin); //$cm->convert()
$max = (int)ceil($getMax);

var_dump($getDefaultMin);
var_dump($getDefaultMax);
if($getDefaultMin != $getDefaultMax){
?>

    <div class="card filter filter-price">
        <a class="card-header collapsed h5" data-toggle="collapse"
           href="#collapse-<?= md5('prices') ?>" aria-expanded="true"
           aria-controls="collapse-<?= md5('prices') ?>">
            <?= Yii::t('shop/default', 'FILTER_BY_PRICE') ?>
        </a>
        <div class="card-collapse collapse in" id="collapse-<?= md5('prices') ?>">
            <div class="card-body">
                <?php
                //echo Html::beginForm(); ?>
                <div class="row">
                    <div class="col-6">
                        <?php
                        echo Html::textInput('filter[price][]', (isset(Yii::$app->controller->prices[0])) ? $getMin : null, ['id' => 'min_price', 'class' => '']);
                        ?>
                    </div>
                    <div class="col-6">
                        <?php
                        echo Html::textInput('filter[price][]', (isset(Yii::$app->controller->prices[1])) ? $getMax : null, ['id' => 'max_price', 'class' => '']);
                        ?>
                    </div>


                    <div class="col-6">
                        <?php
                        //echo Html::textInput('min_price', (isset($_GET['min_price'])) ? $getMin : null, ['id' => 'min_price', 'class' => '']);
                        ?>
                    </div>
                    <div class="col-6">
                        <?php
                        //echo Html::textInput('max_price', (isset($_GET['max_price'])) ? $getMax : null, ['id' => 'max_price', 'class' => '']);
                        ?>
                    </div>
                </div>
                <?php echo \yii\jui\Slider::widget([
                    'clientOptions' => [
                        'range' => true,
                        // 'disabled' => $getDefaultMin === $getDefaultMax,
                        'min' => $getDefaultMin, //$prices['min'],//$min,
                        'max' => $getDefaultMax, //$prices['max'],//$max,
                        'values' => [$getMin, $getMax],
                    ],
                    'clientEvents' => [
                        'stop' => 'function(event, ui){
                           // console.log(ui.values[0], ui.values[1]);
                            filter_ajax();
            //$.ajax({
           //     url:$("#filter-form").attr("action")+"/min_price/"+ui.values[0]+"/max_price/"+ui.values[1]+"",
           //     type:$("#filter-form").attr("method"),
           //     success:function (data) {
           //         $("#listview-ajax").html(data);
                    //$("#filter-form").attr("method")
           //         //history.pushState(null, $("title").html(), url);
           //     }
            //});
            
                        }',
                        'slide' => 'function(event, ui) {
                            $("#min_price").val(ui.values[0]);
                            $("#max_price").val(ui.values[1]);
                            $("#mn").text(price_format(ui.values[0]));
                            $("#mx").text(price_format(ui.values[1]));
			            }',
                        'create' => 'function(event, ui){
                            $("#min_price").val(' . $min . ');
                            $("#max_price").val(' . $max . ');
                            $("#mn").text("' . Yii::$app->currency->number_format($min) . '");
                            $("#mx").text("' . Yii::$app->currency->number_format($max) . '");
                        }'
                    ],
                ]);
                ?>
                <div class="row">
                    <div class="col-6 text-left">
                        от
                        <span id="mn" class="price price-sm"><?= Yii::$app->currency->number_format($getMin); ?></span>
                    </div>
                    <div class="col-6 text-right">
                        до   <span id="mx" class="price price-sm"><?= Yii::$app->currency->number_format($getMax); ?></span>
                        (<?= Yii::$app->currency->active['symbol'] ?>)</span>
                    </div>
                </div>
                <span class="min-max">
        Цена от
        <span id="mn" class="price price-sm"><?= Yii::$app->currency->number_format($getMin); ?></span>
        до   <span id="mx" class="price price-sm"><?= Yii::$app->currency->number_format($getMax); ?></span>
        (<?= Yii::$app->currency->active['symbol'] ?>)</span>

                <?php //echo Html::submitButton('OK', ['class' => 'btn btn-sm btn-warning']); ?>
                <?php //echo Html::endForm(); ?>
            </div>
        </div>
    </div>
<?php  } ?>