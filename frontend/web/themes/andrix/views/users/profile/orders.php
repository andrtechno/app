<div class="row">
    <div class="col-md-3">
        <?php $this->renderPartial('_nav'); ?>
    </div>
    <div class="col-md-9">
        <h1><?= $this->pageName ?></h1>
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'ordersListGrid',
            'itemsCssClass' => 'table table-striped table-condensed',
            // 'htmlOptions'=>array('class'=>'dasdsa'),
            'dataProvider' => $orders->search(),
            'template' => '{items}',
            'columns' => array(
                array(
                    'name' => 'user_name',
                    'type' => 'raw',
                    'value' => 'Html::link(Html::encode($data->user_name), array("/cart/default/view", "secret_key"=>$data->secret_key))',
                ),
                'user_email',
                'user_phone',
                array(
                    'name' => 'status_id',
                    'filter' => Html::listData(OrderStatus::model()->orderByPosition()->findAll(), 'id', 'name'),
                    'value' => '$data->status_name'
                ),
                array(
                    'name' => 'delivery_id',
                    'filter' => Html::listData(ShopDeliveryMethod::model()->orderByPosition()->findAll(), 'id', 'name'),
                    'value' => '$data->delivery_name'
                ),
                array(
                    'type' => 'raw',
                    'name' => 'full_price',
                    'value' => 'ShopProduct::formatPrice($data->full_price)',
                ),
            ),
        ));
        ?>
    </div>
</div>