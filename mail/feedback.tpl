{use class="panix\engine\Html"}

{if $model.name }
    <p>{$model->getAttributeLabel('name')}: <strong>{Html::mailto($model.name)}</strong></p>
{/if}
{if $model.email }
    <p>{$model->getAttributeLabel('email')}: <strong>{Html::mailto($model.email)}</strong></p>
{/if}
{if $model.phone }
    <p>{$model->getAttributeLabel('phone')}: <strong>{Html::tel($model.phone)}</strong></p>
{/if}
{if $model.text }
    <p>{$model->getAttributeLabel('text')}:<br/>{$model.text}</p>
{/if}

