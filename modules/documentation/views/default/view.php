<?php
use app\modules\documentation\models\Documentation;
use panix\engine\CMS;
use panix\engine\Html;

?>
<script>
    $(function () {
        $('a[href*="#"]:not([href="#"])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - $('.navbar-fixed-top').height()
                    }, 1000);
                    return false;
                }
            }
        });
    });
</script>
<?php
//$this->widget('ext.fancybox.Fancybox', array(
 //   'target' => 'a.fancybox',
//));
?>
<?php


$subManual = Documentation::findOne($this->context->model->id)->children()->all();
if (isset($subManual)) {

    foreach ($subManual as $row) {
        ?>
        <div style="margin-bottom:20px;list-style: circle">
            <?= Html::a($row->name, $row->getUrl(), array('title' => $row->name, 'class' => 'h4')) ?>
            <div class="help-block"></div>
        </div>
        <?php
    }
}
?>


<?php if ($this->context->model->description) { ?>
    <div class="manual-view">
        <h1><?= $this->context->model->name; ?></h1>
        <div class="mce-content-body">
    <?= $this->context->model->description; ?>
        </div>

        <div class="panel-footer">
            <div class="date">
                <i class="flaticon-calendar-2"></i>
    <?= CMS::date($this->context->model->date_create) ?>
            </div>

        </div>
        <?php
        } else {

               echo 'Информация составляется.';
        }
        ?>


</div>











