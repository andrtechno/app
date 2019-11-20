<?php

use panix\engine\CMS;
use panix\engine\Html;
use yii\bootstrap4\ActiveForm;
use panix\mod\contacts\models\SettingsForm;

$config = Yii::$app->settings->get('contacts');


?>
<!--contact map start-->
<div class="contact_map mt-30">

    <?php
    echo panix\mod\contacts\widgets\map\MapWidget::widget(['map_id' => 1]);
    ?>

</div>
<!--contact map end-->



<?php if (Yii::$app->session->hasFlash('success')) { ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php } ?>

<!--contact area start-->
<div class="contact_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact_message content">
                    <h3><?= Yii::t('contacts/default', 'CONTACT_INFO'); ?></h3>

                    <ul>
                        <?php if (isset($config->address) && isset($config->address[Yii::$app->language])) { ?>
                            <li><i class="icon-location"></i> <?= $config->address[Yii::$app->language]; ?></li>
                        <?php } ?>
                        <?php if (isset($config->phone)) { ?>

                                <?php foreach ($config->phone as $phone) { ?>
                                <li><i class="icon-phone"></i><?= Html::tel($phone['number'], ['class' => 'phone ' . CMS::slug(CMS::phoneOperator($phone['number']))]); ?> <?= $phone['name']; ?></li>
                                <?php } ?>

                        <?php } ?>

                        <?php if (isset($config->email)) { ?>
                            <li><i class="icon-envelope"></i>
                                <?php foreach (explode(',', $config->email) as $email) { ?>
                                    <?= Html::mailto($email); ?>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>


                    <?php if (isset($config->schedule)) { ?>
                        <h4 class="mt-4"><?= Yii::t('contacts/default', 'SCHEDULE'); ?></h4>
                        <?php foreach ($config->schedule as $key => $schedule) { ?>
                            <div class="mb-1 pl-md-3">
                                <strong><?= SettingsForm::dayList()[$key]; ?>.</strong>

                                <?php if (!empty($schedule['start_time']) || !empty($schedule['end_time'])) { ?>

                                    с <?= $schedule['start_time']; ?> до <?= $schedule['end_time']; ?>
                                <?php } else { ?>
                                    <?= SettingsForm::t('DAY_OFF'); ?>
                                <?php } ?>
                                <?php if (date('N') == $key + 1) { ?>
                                    <?php if (time() >= strtotime($schedule['end_time'])) { ?>
                                        <span class="font-italic text-danger">(<?= Yii::t('contacts/default', 'IS_CLOSE'); ?>
                                            )</span>
                                    <?php } else { ?>
                                        <span class="font-italic text-success">(<?= Yii::t('contacts/default', 'IS_OPEN'); ?>
                                            )</span>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="contact_message form">
                    <h3><?= Yii::t('contacts/default', 'FORM_TITLE'); ?></h3>


                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                    <?php if (Yii::$app->user->isGuest) { ?>
                        <?= $form->field($model, 'name') ?>
                        <?= $form->field($model, 'email') ?>
                    <?php } ?>

                    <?php
                    if (!Yii::$app->user->phone)
                        echo $form->field($model, 'phone')->widget(\panix\ext\inputmask\InputMask::class);
                    ?>
                    <?= $form->field($model, 'text')->textArea(['rows' => 6]) ?>
                    <?php if ($config->feedback_captcha || Yii::$app->user->isGuest) { ?>
                        <?php
                        /*echo $form->field($model, 'verifyCode')->widget(yii\captcha\Captcha::class, [
                            'captchaAction' => 'default/captcha',
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ])*/
                        ?>
                    <?php } ?>




                    <?php echo $form->field($model, 'verifyCode')->widget(Yii::$app->settings->get('app', 'captcha_class')); ?>


                    <div class="form-group text-center">
                        <?= Html::submitButton(Yii::t('app', 'SEND'), ['class' => 'btn btn-warning', 'name' => 'contact-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>



                </div>
            </div>
        </div>
    </div>
</div>

<!--contact area end-->


<?php
/* $coords = [];
  $coords[] = new LatLng(['lat' => 46.468252, 'lng' => 30.740576]);
  $coords[] = new LatLng(['lat' => 46.453163, 'lng' => 30.751179]);

  $coord = new LatLng(['lat' => 46.458252, 'lng' => 30.742576]);
  $map = new Map([
  'center' => $coord,
  'zoom' => 14,
  ]);
  $markers = [];
  foreach ($coords as $coord) {

  $markers = new Marker([
  'position' => $coord,
  'title' => 'My Home Town',
  ]);

  $markers->attachInfoWindow(
  new InfoWindow([
  'content' => '<p>This is my super cool content</p>'
  ])
  );

  $map->addOverlay($markers);
  }

  echo $map->display(); */
?>
