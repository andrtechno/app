<?= $form->field($model, 'price_penny')->checkbox(); ?>
<?= $form->field($model, 'price_decimal')->dropDownList($model::priceSeparator()); ?>
<?= $form->field($model, 'price_thousand')->dropDownList($model::priceSeparator()); ?>

