
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><?= Yii::app()->settings->get('app', 'site_name') ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><?= Html::link('Обо мне', array('/contacts')) ?></li>
                <li><?= Html::link('Услуги', array('/contacts')) ?></li>
                <li><?= Html::link('Работы', array('/contacts')) ?></li>
                <li><?= Html::link('Контакты', array('/contacts')) ?></li>

            </ul>
        </div>
    </div>
</div>
</nav>



