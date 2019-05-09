<?php
use yii\bootstrap4\Alert;
use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
use panix\engine\behaviors\wizard\WizardMenu;
use panix\engine\CMS;

$this->title = 'Registration Wizard';


?>
<div class="row no-gutters">
<div class="col-sm-3">
    <?php
    echo WizardMenu::widget([
        'step' => $event->step,
        'wizard' => $event->sender,
        'options' => [
            'class' => 'list-unstyled nav-step'
        ]
    ]);
    ?>
</div>
<div class="col-sm-9">
    <div class="form-block clearfix">
        <?php
        $form = ActiveForm::begin([
            //  'id' => 'form',
            'options' => ['class' => 'form-horizontal'],
        ]);
        ?>
        <div class="form-horizontal">
            <?php if (PHP_VERSION_ID < 50300) { ?>

                <?=
                Alert::widget([
                    'options' => [
                        'class' => 'alert-danger',
                    ],
                    'closeButton' => false,
                    'body' => Yii::t('install/default', 'INSTALL_PHP_VER', array('{current}' => phpversion())),
                ]);
                ?>


            <?php } else { ?>
                <?=
                Alert::widget([
                    'options' => [
                        'class' => 'alert-info',
                    ],
                    'closeButton' => false,
                    'body' => Yii::t('install/default', 'INSTALL_INFO'),
                ]);
                ?>


                <table class="table table-striped table-bordered">
                    <?php foreach ($model->writeAble as $path) { ?>
                        <tr>
                            <td><?php echo $path ?></td>
                            <td class="text-center" width="10%">
                                <?php
                                $result = $model->isWritable($path);
                                if ($result)
                                    echo '<i class="icon-check text-success"></i>';
                                else {
                                    $model->errors = true;
                                    echo '<i class="icon-warning text-danger"></i>';
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th colspan="2" class="text-center"><?= Yii::t('install/default', 'ACCESS_FILE_DIR') ?></th>
                    </tr>
                    <?php
                    foreach ($model->chmod as $file => $ch) {
                        $check = CMS::isChmod(Yii::getAlias("@app") . DIRECTORY_SEPARATOR . $file, $ch);
                        ?>
                        <tr>
                            <td>
                                <?php echo $file ?>
                                <?php if (!$check) { ?>
                                    <small class="text-danger">
                                        <?php echo Yii::t('install/default', 'CHMOD_ERROR', array('chmod' => $ch)); ?>
                                    </small>
                                <?php }
                                ?>
                            </td>
                            <td class="text-center" width="10%">
                                <?php
                                $check = CMS::isChmod(Yii::getAlias("@app") . DIRECTORY_SEPARATOR . $file, $ch);
                                if ($check)
                                    echo '<i class="icon-check text-success"></i>';
                                else {
                                    $model->errors = true;
                                    echo '<i class="icon-warning text-danger"></i>';
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

                <?php if ($model->errors) { ?>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <?=
                            Alert::widget([
                                'options' => [
                                    'class' => 'alert-warning',
                                ],
                                'closeButton' => false,
                                'body' => Yii::t('install/default', 'CORRECT_ERROR'),
                            ]);
                            ?>


                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>


        <?=
        $form->field($model, 'warning')->hiddenInput()->label(false);
        ?>

        <div class="panel-footer text-center">
            <?= Html::a(Yii::t('install/default', 'BACK'), [Yii::$app->controller->id . '/index', 'step' => 'license'], ['class' => 'btn btn-link']) ?>
            <?= Html::submitButton(Yii::t('install/default', 'NEXT'), ['class' => 'btn btn-success']) ?>

        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
</div>