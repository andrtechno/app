<div class="row">
    <div class="col-md-6 col-sm-6">
        <h4><?= $this->pageName; ?></h4>
        <p>Заполните пожалуйста поля ниже</p>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-register-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('class' => 'register-form outer-top-xs', 'role' => 'form-vertical')
        ));
        ?>

        <?php
        echo $form->errorSummary($user, '<i class="fa fa-warning fa-3x"></i>', null, array('class' => 'errorSummary alert alert-danger'));
        ?>
        <div class="form-group">
            <?= $form->labelEx($user, 'login', array('class' => 'info-title')); ?>
            <?= $form->textField($user, 'login', array('class' => 'form-control unicase-form-control text-input')); ?>
        </div>
        <div class="form-group">
            <?= $form->labelEx($user, 'username', array('class' => 'info-title')); ?>
            <?= $form->textField($user, 'username', array('class' => 'form-control unicase-form-control text-input')); ?>
        </div>
        <div class="form-group">
            <?= $form->labelEx($user, 'password', array('class' => 'info-title')); ?>
            <?= $form->passwordField($user, 'password', array('class' => 'form-control unicase-form-control text-input')); ?>
        </div>
        <div class="form-group">
            <?= $form->labelEx($user, 'confirm_password', array('class' => 'info-title')); ?>
            <?= $form->passwordField($user, 'confirm_password', array('class' => 'form-control unicase-form-control text-input')); ?>
        </div>
        <?php if (CCaptcha::checkRequirements() && false) { ?>
            <div class="form-group">
                <?= $form->labelEx($user, 'verifyCode', array('class' => 'info-title')); ?>
                <?php
                $this->widget('CCaptcha', array(
                    'clickableImage' => false,
                    'showRefreshButton' => true,
                    'buttonLabel' => '',
                    'buttonOptions' => array(
                        'class' => 'refresh_captcha icon-loop-2'
                    )
                ));
                ?>
                <?= $form->textField($user, 'verifyCode', array('style' => 'width:150px', 'class' => 'form-control unicase-form-control text-input', 'placeholder' => $user->getAttributeLabel('verifyCode'))); ?>
            </div>
        <?php } ?>
        <div class="form-group text-center">
        <?= Html::submitButton(Yii::t('UsersModule.default', 'BTN_REGISTER'), array('class' => 'btn-upper btn btn-primary checkout-page-button')); ?>
         </div>
             <?php $this->endWidget(); ?>


    </div>

    <div class="col-md-6 col-sm-6">
        <h4>Вход</h4>
        <p>Здравствуйте, войдите в свой аккаунт</p>
        <?php
        Yii::import('mod.users.forms.UserLoginForm');
        $this->renderPartial('login', array('model' => new UserLoginForm()));
        ?>

    </div>	
</div>

