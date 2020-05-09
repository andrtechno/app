<?php
use yii\helpers\Html;
use panix\mod\shop\models\Product;

$cm = Yii::$app->currency;
$minPrice = $this->context->priceMin;
$maxPrice = $this->context->priceMax;


//if (($minPrice && $maxPrice) && ($minPrice !== $maxPrice)) {
$getDefaultMin = floor($minPrice);
$getDefaultMax = ceil($maxPrice);
$getMax = $this->context->getCurrentMaxPrice();
$getMin = $this->context->getCurrentMinPrice();


$min = (int)floor($getMin);
$max = (int)ceil($getMax);

if ($getDefaultMin != $getDefaultMax) {
    ?>
    <div class="widget_list widget_filter filter-price">
        <h2>
            <a class="" data-toggle="collapse" href="#collapse-<?= md5('prices') ?>"
               aria-expanded="true" aria-controls="collapse-<?= md5('prices') ?>">
                <?= Yii::t('shop/default', 'FILTER_BY_PRICE') ?>
            </a>
        </h2>

        <div class="card-collapse collapse in" id="collapse-<?= md5('prices') ?>">

            <?php
            //echo Html::beginForm();
            ?>
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
            <div class="row min-max">
                <div class="col-6 text-left">
                    <?= Yii::t('app/default','FROM_BY','<span id="mn" class="price price-sm">'.Yii::$app->currency->number_format($getMin).'</span>'); ?>
                    (<?= Yii::$app->currency->active['symbol'] ?>)
                </div>
                <div class="col-6 text-right">
                    <?= Yii::t('app/default','FROM_BY','<span id="mx" class="price price-sm">'.Yii::$app->currency->number_format($getMax).'</span>'); ?>
                    (<?= Yii::$app->currency->active['symbol'] ?>)</span>
                </div>
            </div>
        </div>

    </div>
<?php } ?>