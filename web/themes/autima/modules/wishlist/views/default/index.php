<?php
use panix\engine\bootstrap\Alert;

$component = Yii::$app->wishlist;
?>

    <h1><?= $this->context->pageName; ?></h1>


<?php if ($component->products) { ?>

    <a class="btn btn-primary"
       href="mailto:?body=<?= $component->getUrl() ?>&subject=<?= Yii::t('wishlist/default', 'SUBJECT_NAME') ?>"><?= Yii::t('app', 'SEND') ?></a>


    <div class="list-view _view_grid row shop_wrapper">
        <?php
        foreach ($component->products as $p) {
            echo '<div class="col-lg-4 col-md-4 col-sm-6">';
            echo $this->render('_product', [
                'model' => $p,
                'component' => $component
            ]);
            echo '</div>';
        }
        ?>
    </div>
    <div class="clearfix"></div>
<?php } else { ?>
    <?php
    echo Alert::widget([
        'options' => [
            'class' => 'alert-info',
        ],
        'closeButton' => false,
        'body' => Yii::t('wishlist/default', 'EMPTY_LIST'),
    ]);
    ?>
<?php } ?>