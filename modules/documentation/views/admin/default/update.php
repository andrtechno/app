<?php
$this->widget('ext.fancybox.Fancybox', array(
    'target' => 'a.overview-image',
    'config' => array(),
));


$checkRoot = Documentation::model()
        ->findByPk(1);
if (!$checkRoot) {
    // throw new CHttpException(404,'no root');
    Yii::app()->tpl->alert('warning', 'Необходимо создать root категорию. <a href="/admin/documentation/default/createRoot">создать</a>', false);
} else {
    ?>
    <div class="row">
                <div class="col-lg-12">
            <?php $this->renderPartial('_categories', array('model' => $model)); ?>
        </div>
        <div class="col-lg-12">
            <?php
            Yii::app()->tpl->openWidget(array(
                'title' => $this->pageName,
            ));
            echo $form->tabs();
            Yii::app()->tpl->closeWidget();
            ?>
        </div>



    </div>
    <script type="text/javascript">init_translitter('Documentation', '<?= $model->primaryKey; ?>', false);</script>

    <?php
}

