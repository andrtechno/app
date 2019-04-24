<?php

function activeClass($v){
    echo (Yii::app()->controller->id == $v)?'active':'';
}
?>
<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="<?php activeClass('profile')?>"><a href="/users/profile">Профиль</a></li>
    <li role="presentation" class="<?php activeClass('messages')?>"><a href="/users/profile">Сообщения <span class="badge fr">3</span></a></li>
    <li role="presentation" class="<?php activeClass('friends')?>"><a href="/users/friends">Друзья</a></li>
    <li role="presentation" class="<?php activeClass('favorites')?>"><a href="/users/favorites">Зкладки</a></li>
    <li role="presentation" class="<?php activeClass('favorites')?>"><a href="/users/profile/orders">Мои заказы</a></li>
</ul>