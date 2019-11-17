<?php

use yii\helpers\Url;
use yii\helpers\Html;
use panix\mod\shop\widgets\categories\CategoriesWidget;
use panix\mod\shop\widgets\filtersnew\FiltersWidget;

?>
<div class="col-lg-3 col-md-12">
    <!--sidebar widget start-->
    <aside class="sidebar_widget">
        <div class="widget_inner">
            <div class="widget_list widget_filter">
                <h2>Filter by price</h2>
                <form action="#">
                    <div id="slider-range"></div>
                    <button type="submit">Filter</button>
                    <input type="text" name="text" id="amount"/>

                </form>
            </div>
            <div id="filters-container">
                <a class="d-md-none btn-filter-close close" href="javascript:void(0)"
                   onclick="$('#filters-container').toggleClass('open'); return false;">
                    <span>&times;</span>
                </a>


                <?php
                echo FiltersWidget::widget([
                    'model' => $this->context->dataModel,
                    'attributes' => $this->context->eavAttributes,
                    'viewPath' => '@app/widgets/filters'
                ]);

                ?>
            </div>
        </div>
        <div class="shop_sidebar_banner">
            banner
        </div>
    </aside>
    <!--sidebar widget end-->
</div>
<div class="col-lg-9 col-md-12">
    <!--shop wrapper start-->
    <!--shop toolbar start-->
    <div class="shop_banner">
        banner
    </div>
    <div class="shop_title">
        <h1><?= Html::encode(($this->h1) ? $this->h1 : $this->context->pageName); ?></h1>
    </div>
    <div class="shop_toolbar_wrapper">
        <?php echo $this->render('_sorting', ['itemView' => $itemView]); ?>

    </div>
    <!--shop toolbar end-->


    <div id="listview-ajax">
        <?php
        echo $this->render('listview', [
            'itemView' => $itemView,
            'provider' => $provider,
        ]);
        ?>
    </div>


    <div class="shop_toolbar t_bottom">
        <div class="pagination">
            <ul>
                <li class="current">1</li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="next"><a href="#">next</a></li>
                <li><a href="#">>></a></li>
            </ul>
        </div>
    </div>
    <!--shop toolbar end-->
    <!--shop wrapper end-->
</div>
