<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="breadcrumb_content">
        <?php
        if (isset($this->context->breadcrumbs)) {
            echo \panix\engine\widgets\Breadcrumbs::widget([
                'links' => $this->context->breadcrumbs,
            ]);
        }
        ?>


    </div>
</div>
<!--breadcrumbs area end-->