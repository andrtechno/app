
<h2><?php echo Yii::t('UsersModule.default', 'PROFILE_NAME', array('{user_name}' => ($user->username)?$user->username:$user->email)) ?></h2>
<?php
$label = $user->attributeLabels();
?>
<?php if (!$user->banned) { ?>
    <div class="row">
        <div class="col-md-3 text-center"><img src="<?= $user->avatarUrl('50x50'); ?>" alt="<?= $user->username ?>" /></div>
        <div class="col-md-9">
            <table class="table table-striped">
                <?php if($user->username){ ?>
                <tr>
                    <td><?= $label['username']; ?></td>
                    <td><?= $user->username; ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td><?= $label['email']; ?></td>
                    <td><?= $user->email; ?></td>
                </tr>
                <tr>
                    <td><?= $label['date_registration']; ?></td>
                    <td><?= CMS::date($user->date_registration); ?></td>
                </tr>
                <tr>
                    <td><?= $label['last_login']; ?></td>
                    <td><?= CMS::date($user->last_login); ?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
} else {
    Yii::app()->tpl->alert('info', 'Пользователь заблокирован');
}
?>

