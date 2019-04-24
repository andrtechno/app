<?php

use panix\engine\Html;

$bundle = \app\web\themes\andrix\assets\ThemeAsset::register($this);

$this->registerJs("
            particlesJS.load('particles-js', '" . $bundle->baseUrl . "/js/particles.json', function() {
                     console.log('callback - particles.js config loaded');
});
     ", yii\web\View::POS_END, 'particles-js');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>"/>
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <script>

        </script>
        <!-- Start preloading -->
        <div id="loading" class="loading-invisible">
            <div class="loading-center">
                <div class="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>
                    <div class="object" id="object_five"></div>
                    <div class="object" id="object_six"></div>
                    <div class="object" id="object_seven"></div>
                    <div class="object" id="object_eight"></div>
                    <div class="object" id="object_big"></div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <script type="text/javascript">
            document.getElementById("loading").className = "loading-visible";
            var hideDiv = function () {
                document.getElementById("loading").className = "loading-invisible";
            };
            var oldLoad = window.onload;
            var newLoad = oldLoad ? function () {
                hideDiv.call(this);
                oldLoad.call(this);
            } : hideDiv;
            window.onload = newLoad;
        </script>
        <!-- End preloading -->

        saddsdsadsadsa

        <!-- Start Navbar -->
        <nav class="navbar yamm navbar-dark navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"></a>
                </div>


                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Работы <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="portfolio-alt1.html">Portfolio alt1</a></li>
                                <li><a href="portfolio-alt2.html">Portfolio alt2</a></li>
                                <li><a href="portfolio-alt3.html">Portfolio alt3</a></li>
                                <li><a href="portfolio-alt4.html">Portfolio alt4</a></li>
                                <li><a href="portfolio-alt5.html">Portfolio alt5</a></li>
                                <li><a href="portfolio-alt6.html">Portfolio alt6</a></li>
                                <li><a href="portfolio-alt7.html">Portfolio alt7</a></li>
                                <li><a href="portfolio-detail.html">Portfolio detail</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Blog <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="about.html" class="trigger">Left sidebar</a>
                                    <ul class="dropdown-menu sub-menu1">
                                        <li><a href="blog-leftsidebar.html">Blog leftsidebar alt1</a></li>
                                        <li><a href="blog-leftsidebar-alt1.html">Blog leftsidebar alt2</a></li>
                                        <li><a href="blog-leftsidebar-alt2.html">Blog leftsidebar alt3</a></li>
                                        <li><a href="blog-leftsidebar-alt3.html">Blog leftsidebar alt4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="services.html" class="trigger">Right sidebar</a>
                                    <ul class="dropdown-menu sub-menu1">
                                        <li><a href="blog-rightsidebar.html">Blog rightsidebaralt1</a></li>
                                        <li><a href="blog-rightsidebar-alt1.html">Blog rightsidebar alt2</a></li>
                                        <li><a href="blog-rightsidebar-alt2.html">Blog rightsidebar alt3</a></li>
                                        <li><a href="blog-rightsidebar-alt3.html">Blog rightsidebar alt4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="underconstruction.html" class="trigger">Fullwidth</a>
                                    <ul class="dropdown-menu sub-menu1">
                                        <li><a href="blog-nosidebar-alt1.html">Blog fullwidth alt1</a></li>
                                        <li><a href="blog-nosidebar-alt2.html">Blog fullwidth alt2</a></li>
                                        <li><a href="blog-nosidebar-alt3.html">Blog fullwidth alt3</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="underconstruction.html" class="trigger">Singlepost</a>
                                    <ul class="dropdown-menu sub-menu1">
                                        <li><a href="singlepost-leftsidebar.html">Singlepost alt1</a></li>
                                        <li><a href="singlepost-leftsidebar-alt1.html">Singlepost alt2</a></li>
                                        <li><a href="singlepost-rightsidebar.html">Singlepost alt3</a></li>
                                        <li><a href="singlepost-rightsidebar.html">Singlepost alt4</a></li>
                                        <li><a href="singlepost-fullwidth.html">Singlepost alt5</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown yamm-fullwidth">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Components <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="container">
                                    <div class="row">
                                        <div class="col-md-2 widget">
                                            <h6>Home index</h6>
                                            <ul class="yamm-link">
                                                <li><a href="index.html">Corporate alt1</a></li>
                                                <li><a href="index-alt1.html">Corporate alt2</a></li>
                                                <li><a href="index-alt2.html">Business alt1</a></li>
                                                <li><a href="index-alt3.html">Business alt2</a></li>
                                                <li><a href="index-alt4.html">Creative alt1</a></li>
                                                <li><a href="index-alt5.html">Creative alt2</a></li>
                                                <li><a href="index-alt6.html">Simple theme</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2 widget">
                                            <h6>Extra page</h6>
                                            <ul class="yamm-link">
                                                <li><a href="index-alt7.html">Ecommerce</a></li>
                                                <li><a href="index-alt8.html">Photography</a></li>
                                                <li><a href="index-alt9.html">App alt1</a></li>
                                                <li><a href="index-alt10.html">App alt2</a></li>
                                                <li><a href="index-alt11.html">Real estate</a></li>
                                                <li><a href="index-alt12.html">Traveling</a></li>
                                                <li><a href="index-alt13.html">Medical</a></li>
                                                <li><a href="index-alt14.html">Landingpage</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2 widget">
                                            <h6>Shopping page</h6>
                                            <ul class="yamm-link">
                                                <li><a href="shop.html">Shop page alt1</a></li>
                                                <li><a href="shop-rightsidebar.html">Shop page alt2</a></li>
                                                <li><a href="shop-detail.html">Product detail</a></li>
                                                <li><a href="shopping-cart.html">Shopping cart</a></li>
                                                <li><a href="shopping-checkout.html">Ccheckout</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2 widget">
                                            <h6>Interactive</h6>
                                            <ul class="yamm-link">
                                                <li><a href="call-to-action.html">Call to action</a></li>
                                                <li><a href="counter.html">Counter</a></li>
                                                <li><a href="maps.html">Google maps</a></li>
                                                <li><a href="modal.html">Modal</a></li>
                                                <li><a href="post.html">Blog post style</a></li>
                                                <li><a href="process.html">Process</a></li>
                                                <li><a href="progress-bar.html">Progress bar</a></li>
                                                <li><a href="team.html">Team style</a></li>
                                                <li><a href="pricing.html">Pricing table</a></li>
                                                <li><a href="testimoni.html">Testimoni style</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2 widget">
                                            <h6>Elements</h6>
                                            <ul class="yamm-link">
                                                <li><a href="accordion.html">Accordion</a></li>
                                                <li><a href="tabs.html">Tabs</a></li>
                                                <li><a href="button.html">Button</a></li>
                                                <li><a href="form.html">Form</a></li>
                                                <li><a href="icons.html">Icons</a></li>
                                                <li><a href="icon-box.html">Icon with box</a></li>
                                                <li><a href="icon-text.html">Icon with text</a></li>
                                                <li><a href="images.html">Image style</a></li>
                                                <li><a href="alerts.html">Alerts</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2 widget">
                                            <h6>Typography & Misc</h6>
                                            <ul class="yamm-link">
                                                <li><a href="typography.html">Typography</a></li>
                                                <li><a href="heading.html">Heading</a></li>
                                                <li><a href="highlights.html">Highlights</a></li>
                                                <li><a href="dropcaps.html">Dropcaps</a></li>
                                                <li><a href="blockquote.html">Blockquote</a></li>
                                                <li><a href="pagination.html">Pagination</a></li>
                                                <li><a href="list.html">List style</a></li>
                                                <li><a href="divider.html">Separators</a></li>
                                                <li><a href="columns.html">Columns</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- Start landing page heading -->

        <div class="landingpage-head">
            <div   id="particles-js"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading">
                            <h1>Register now...! and get best SEO tips</h1>
                            <p>
                                No adhuc tritani invidunt vix, pro lobortis hendrerit expetendis ut, ne nam tota mnesarchum consequuntur.
                            </p>
                        </div>
                        <form class="row">
                            <div class="col-xs-12 marginbot10">
                                <input type="text" class="form-control input-lg" placeholder="Enter your full name">
                            </div>
                            <div class="col-xs-12 marginbot10">
                                <input type="text" class="form-control input-lg" placeholder="Enter your email address">
                            </div>
                            <div class="col-xs-12 marginbot10">
                                <button class="btn btn-default btn-lg btn-block" type="submit">Register now</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <img src="<?= $bundle->baseUrl ?>/images/lady-business.png" class="img-responsive" alt="" />
                    </div>
                </div>
            </div>
        </div>

        <!-- End landing page heading -->

        <!-- Start contain wrapp -->
        <div class="contain-wrapp gray-container padding-bot60">
            <div class="container">
                <!-- Start clients -->
                <div class="row">
                    <div class="col-md-12 owl-column-wrapp">
                        <div id="clients" class="owl-carousel leftControls-right">
                            <div class="item text-center">
                                <a href="#" class="client-logo"><img src="img/clients/logo01.png" class="img-reponsive" alt="" /></a>						
                            </div>
                            <div class="item text-center">
                                <a href="#" class="client-logo"><img src="img/clients/logo02.png" class="img-reponsive" alt="" /></a>						
                            </div>
                            <div class="item text-center">
                                <a href="#" class="client-logo"><img src="img/clients/logo03.png" class="img-reponsive" alt="" /></a>						
                            </div>
                            <div class="item text-center">
                                <a href="#" class="client-logo"><img src="img/clients/logo01.png" class="img-reponsive" alt="" /></a>						
                            </div>
                            <div class="item text-center">
                                <a href="#" class="client-logo"><img src="img/clients/logo02.png" class="img-reponsive" alt="" /></a>						
                            </div>
                            <div class="item text-center">
                                <a href="#" class="client-logo"><img src="img/clients/logo03.png" class="img-reponsive" alt="" /></a>						
                            </div>
                            <div class="item text-center">
                                <a href="#" class="client-logo"><img src="img/clients/logo01.png" class="img-reponsive" alt="" /></a>						
                            </div>
                            <div class="item text-center">
                                <a href="#" class="client-logo"><img src="img/clients/logo02.png" class="img-reponsive" alt="" /></a>						
                            </div>
                            <div class="item">
                                <a href="#" class="client-logo"><img src="img/clients/logo03.png" class="img-reponsive" alt="" /></a>						
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End clients -->
            </div>
        </div>
        <!-- End contain wrapp -->

        <!-- Start contain wrapp -->
        <div class="contain-wrapp">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="heading marginbot20">
                            <h3>Marketing coaching & consulting</h3>
                            <p>Duo in tale omnis no elit iuvaret disputando per mea te decore malorum</p>
                        </div>
                        <p>
                            Alii commune per ei, quis nostro ne nec, ut duis porro rationibus vis. Cu nam prima delectus intellegat. Vim no solum consulatu, in pro tamquam placerat. Falli tibique no est, eum ei nisl iudico. Pri consulatu dignissim ei, an pri quas vivendo, ei ubique laoreet voluptaria qui cum possit molestie.
                        </p>
                        <p><a href="#" class="btn btn-primary">Get in touch with us</a></p>
                        <img src="<?= $bundle->baseUrl ?>/images/people-group.png" class="img-responsive" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!-- End contain wrapp -->

        <!-- Start half contain wrapp -->
        <div class="half-container padding-bot60">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pull-left">
                        <h5>What you get from this ebook</h5>	
                        <div id="progress-bar">
                            <div class="progress progress-primary progress-sm">
                                <div class="progress-bar" role="progressbar" data-value-progress="99">
                                    <span class="value-progress">S.E.O</span>
                                </div>
                            </div>
                            <div class="progress progress-primary progress-sm">
                                <div class="progress-bar" role="progressbar" data-value-progress="75">
                                    <span class="value-progress">Internet marketing</span>
                                </div>
                            </div>
                            <div class="progress progress-primary progress-sm">
                                <div class="progress-bar" role="progressbar" data-value-progress="65">
                                    <span class="value-progress">Social network</span>
                                </div>
                            </div>
                            <div class="progress progress-primary progress-sm">
                                <div class="progress-bar" role="progressbar" data-value-progress="55">
                                    <span class="value-progress">e-Commerce</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pull-right">
                        <h5>Sallira general licence</h5>
                        <p>
                            Omnesque atomorum, pro integre imperdiet in. Saperet perpetua ut mei, nibh sale meis eam cu. Ut vim modus zril, ex cum erat dictas urbanitas pertinacia eu eum. Usu in ullum omnesque atomorum, pro integre imperdiet in. Saperet perpetua ut mei, nibh sale meis eam cu omnium gloriatur te mei. Ex blandit volutpat consequuntur mel alia nihil at vel in.
                        </p>
                        <p><a href="#" class="btn btn-default btn-sm">Register for free</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End half contain wrapp -->

        <!-- Start parallax wrapp -->
        <div class="parallax bg1">
            <div class="parallax-container padding-bot30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <div class="heading">
                                <h3>People said about sallira</h3>
                                <p>Duo in tale omnis no elit iuvaret disputando per, mea te decore malorum</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 owl-column-wrapp">
                            <div id="testimoni-column3" class="owl-carousel topControls">
                                <div class="item">
                                    <div class="testimoni-wrapp">
                                        <div class="testimoni">
                                            <blockquote>
                                                Novum iuvaret principes ut vis, at mei tollit convenire. Pri autem solet delicata cu ad viris copiosae theophrastus.
                                            </blockquote>
                                            <span class="block"><a href="#">Edah jubaedah</a> - WP-Solution</span>
                                        </div>
                                        <span class="testimoni-sparator"></span>
                                        <img src="<?= $bundle->baseUrl ?>/images/avatar01.jpg" class="img-circle" alt="" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimoni-wrapp">
                                        <div class="testimoni">
                                            <blockquote>
                                                Detraxit quaerendum eu pri suas vocibus inimicus, eum eu etiam habemus copiosae, eu quas dicam decore qui cu solet.
                                            </blockquote>
                                            <span class="block"><a href="#">Tatang sanna</a> - JP-Obral</span>
                                        </div>
                                        <span class="testimoni-sparator"></span>
                                        <img src="<?= $bundle->baseUrl ?>/images/avatar02.jpg" class="img-circle" alt="" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimoni-wrapp">
                                        <div class="testimoni">
                                            <blockquote>
                                                Omnesque abhorreant at sea, quo partem feugiat instructior ne iudicabit ei has cu pri magna blandit. Luptatum impetus.
                                            </blockquote>
                                            <span class="block"><a href="#">Asep gobang</a> - Asal weh</span>
                                        </div>
                                        <span class="testimoni-sparator"></span>
                                        <img src="<?= $bundle->baseUrl ?>/images/avatar03.jpg" class="img-circle" alt="" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimoni-wrapp">
                                        <div class="testimoni">
                                            <blockquote>
                                                Eu vel reque eripuit sanctus. Mei ei erant soleat percipitur. Eam ipsum feugait eu, nec vero verear aliquid ex esse.
                                            </blockquote>
                                            <span class="block"><a href="#">Onah markonah</a> - Polution</span>
                                        </div>
                                        <span class="testimoni-sparator"></span>
                                        <img src="<?= $bundle->baseUrl ?>/images/avatar04.jpg" class="img-circle" alt="" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimoni-wrapp">
                                        <div class="testimoni">
                                            <blockquote>
                                                An ancillae qualisque ius, cu pri magna blandit. Luptatum omittantur duo ne. Impetus indoctum ad usu vim suscipit.
                                            </blockquote>
                                            <span class="block"><a href="#">Ujang helem</a> - DXM studios</span>
                                        </div>
                                        <span class="testimoni-sparator"></span>
                                        <img src="<?= $bundle->baseUrl ?>/images/avatar01.jpg" class="img-circle" alt="" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimoni-wrapp">
                                        <div class="testimoni">
                                            <blockquote>
                                                Usu in ullum omnesque atomorum, pro integre imperdiet in. Saperet perpetua ut mei, nibh sale meis eam cu modus zril.
                                            </blockquote>
                                            <span class="block"><a href="#">Icih sukaesih</a> - DoorMan</span>
                                        </div>
                                        <span class="testimoni-sparator"></span>
                                        <img src="<?= $bundle->baseUrl ?>/images/avatar06.jpg" class="img-circle" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End parallax wrapp -->

        <!-- Start contain wrapp -->
        <div class="contain-wrapp padding-bot60">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="heading">
                            <h3>The reason why choose us</h3>
                            <p>Alii commune per ei, quis nostro ne nec, ut duis porro rationibus vis. Cu nam prima delectus intellegat. Vim no solum consulatu, in pro</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="icon-box box-default">
                            <div class="icon-box-contain">
                                <i class="fa fa-laptop fa-3x"></i>
                                <h5>Responsive</h5>
                                <p>
                                    No erant soluta temporibus quo. An per discere invidunt dissentiunt, mel at audiam sensibus, mel velit inani ei.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="icon-box box-default">
                            <div class="icon-box-contain">
                                <i class="fa fa-magic fa-3x"></i>
                                <h5>Clean design</h5>
                                <p>
                                    No erant soluta temporibus quo. An per discere invidunt dissentiunt, mel at audiam sensibus, mel velit inani ei.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="icon-box box-default">
                            <div class="icon-box-contain">
                                <i class="fa fa-gift fa-3x"></i>
                                <h5>lot features</h5>
                                <p>
                                    No erant soluta temporibus quo. An per discere invidunt dissentiunt, mel at audiam sensibus, mel velit inani ei.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="icon-box box-default">
                            <div class="icon-box-contain">
                                <i class="fa fa-rocket fa-3x"></i>
                                <h5>Easy to use</h5>
                                <p>
                                    No erant soluta temporibus quo. An per discere invidunt dissentiunt, mel at audiam sensibus, mel velit inani ei.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="icon-box box-default">
                            <div class="icon-box-contain">
                                <i class="fa fa-paper-plane fa-3x"></i>
                                <h5>Multi purpose</h5>
                                <p>
                                    No erant soluta temporibus quo. An per discere invidunt dissentiunt, mel at audiam sensibus, mel velit inani ei.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="icon-box box-default">
                            <div class="icon-box-contain">
                                <i class="fa fa-file-text fa-3x"></i>
                                <h5>Full documentation</h5>
                                <p>
                                    No erant soluta temporibus quo. An per discere invidunt dissentiunt, mel at audiam sensibus, mel velit inani ei.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End contain wrapp -->

        <!-- Start gray contain wrapp -->
        <div class="contain-wrapp gray-container">	
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="heading">
                            <h3>Product screenshot</h3>
                            <p>Mea ex epicurei placerat, ut simul dictas mea his viris sadipscing ad.</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- Start gallery filter  -->
                        <ul class="filter-items">
                            <li><a href="#" data-filter="" class="active">All</a></li>
                            <li><a href="#" data-filter="web">Web</a></li>
                            <li><a href="#" data-filter="graphic">Graphic</a></li>
                            <li><a href="#" data-filter="logo">Logo</a></li>
                            <li><a href="#" data-filter="app">App</a></li>
                        </ul>
                        <!-- End gallery filter -->
                        <!-- Start Images Gallery -->
                        <div class="row">
                            <div id="gallery" class="masonry gallery">
                                <div class="grid-sizer col-md-4 col-sm-4 col-xs-6"></div>
                                <!-- Start Gallery 01 -->
                                <div data-filter="web" class="grid-item col-md-4 col-sm-4 col-xs-6">
                                    <div class="img-wrapper">
                                        <div class="img-caption capZoomInDown">
                                            <a href="<?= $bundle->baseUrl ?>/images/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer"><i class="fa fa-search"></i></a>
                                            <h6><a href="#">Vituperatoribus</a></h6>
                                            <a href="#" class="img-categorie">Web design</a>
                                        </div>
                                        <img src="<?= $bundle->baseUrl ?>/images/img05.jpg" class="img-responsive" alt="" />
                                    </div>
                                </div>
                                <!-- End Gallery 01 -->

                                <!-- Star Gallery 02 -->
                                <div data-filter="graphic" class="grid-item col-md-4 col-sm-4 col-xs-6">
                                    <div class="img-wrapper">
                                        <div class="img-caption capZoomInDown">
                                            <a href="<?= $bundle->baseUrl ?>/images/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer"><i class="fa fa-search"></i></a>
                                            <h6><a href="#">Vituperatoribus</a></h6>
                                            <a href="#" class="img-categorie">Web design</a>
                                        </div>
                                        <img src="<?= $bundle->baseUrl ?>/images/img02.jpg" class="img-responsive" alt="" />
                                    </div>
                                </div>
                                <!-- End Gallery 02 -->

                                <!-- Start Gallery 03 -->
                                <div data-filter="app" class="grid-item col-md-4 col-sm-4 col-xs-6">
                                    <div class="img-wrapper">
                                        <div class="img-caption capZoomInDown">
                                            <a href="<?= $bundle->baseUrl ?>/images/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer"><i class="fa fa-search"></i></a>
                                            <h6><a href="#">Persequeris</a></h6>
                                            <a href="#" class="img-categorie">App design</a>
                                        </div>
                                        <img src="<?= $bundle->baseUrl ?>/images/img03.jpg" class="img-responsive" alt="" />
                                    </div>
                                </div>
                                <!-- End Gallery 03 -->

                                <!-- Start Gallery 04 -->
                                <div data-filter="logo" class="grid-item col-md-4 col-sm-4 col-xs-6">
                                    <div class="img-wrapper">
                                        <div class="img-caption capZoomInDown">
                                            <a href="<?= $bundle->baseUrl ?>/images/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer"><i class="fa fa-search"></i></a>
                                            <h6><a href="#">An ancillae</a></h6>
                                            <a href="#" class="img-categorie">logo design</a>
                                        </div>
                                        <img src="<?= $bundle->baseUrl ?>/images/img04.jpg" class="img-responsive" alt="" />
                                    </div>
                                </div>
                                <!-- End Gallery 04 -->

                                <!-- Start Gallery 05 -->
                                <div data-filter="logo" class="grid-item col-md-4 col-sm-4 col-xs-6">
                                    <div class="img-wrapper">
                                        <div class="img-caption capZoomInDown">
                                            <a href="<?= $bundle->baseUrl ?>/images/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer"><i class="fa fa-search"></i></a>
                                            <h6><a href="#">Viris copiosae</a></h6>
                                            <a href="#" class="img-categorie">Logo design</a>
                                        </div>
                                        <img src="<?= $bundle->baseUrl ?>/images/img05.jpg" class="img-responsive" alt="" />
                                    </div>
                                </div>
                                <!-- End Gallery 05 -->

                                <!-- Start Gallery 06 -->
                                <div data-filter="web" class="grid-item col-md-4 col-sm-4 col-xs-6">
                                    <div class="img-wrapper">
                                        <div class="img-caption capZoomInDown">
                                            <a href="<?= $bundle->baseUrl ?>/images/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer"><i class="fa fa-search"></i></a>
                                            <h6><a href="#">Reprimique</a></h6>
                                            <a href="#" class="img-categorie">Web design</a>
                                        </div>
                                        <img src="<?= $bundle->baseUrl ?>/images/img06.jpg" class="img-responsive" alt="" />
                                    </div>
                                </div>
                                <!-- End Gallery 06 -->

                                <!-- Start Gallery 07 -->
                                <div data-filter="graphic" class="grid-item col-md-4 col-sm-4 col-xs-6">
                                    <div class="img-wrapper">
                                        <div class="img-caption capZoomInDown">
                                            <a href="<?= $bundle->baseUrl ?>/images/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer"><i class="fa fa-search"></i></a>
                                            <h6><a href="#">Simul labitur</a></h6>
                                            <a href="#" class="img-categorie">Graphic design</a>
                                        </div>
                                        <img src="<?= $bundle->baseUrl ?>/images/img07.jpg" class="img-responsive" alt="" />
                                    </div>
                                </div>
                                <!-- End Gallery 07 -->

                                <!-- Start Gallery 08 -->
                                <div data-filter="app" class="grid-item col-md-4 col-sm-4 col-xs-6">
                                    <div class="img-wrapper">
                                        <div class="img-caption capZoomInDown">
                                            <a href="<?= $bundle->baseUrl ?>/images/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer"><i class="fa fa-search"></i></a>
                                            <h6><a href="#">Consetetur</a></h6>
                                            <a href="#" class="img-categorie">App design</a>
                                        </div>
                                        <img src="<?= $bundle->baseUrl ?>/images/img08.jpg" class="img-responsive" alt="" />
                                    </div>
                                </div>
                                <!-- End Gallery 08 -->

                                <!-- Start Gallery 09 -->
                                <div data-filter="logo" class="grid-item col-md-4 col-sm-4 col-xs-6">
                                    <div class="img-wrapper">
                                        <div class="img-caption capZoomInDown">
                                            <a href="<?= $bundle->baseUrl ?>/images/zoom980x980.jpg" data-pretty="prettyPhoto" class="zoomer"><i class="fa fa-search"></i></a>
                                            <h6><a href="#">Posidonium</a></h6>
                                            <a href="#" class="img-categorie">Logo design</a>
                                        </div>
                                        <img src="<?= $bundle->baseUrl ?>/images/img09.jpg" class="img-responsive" alt="" />
                                    </div>
                                </div>
                                <!-- End Gallery 09 -->
                            </div>
                        </div>
                        <!-- End Images Gallery -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End gray contain wrapp -->


        <!-- Start parallax counter -->	
        <div class="parallax parallax-two bg2">
            <div class="parallax-container">
                <div class="container">
                    <div class="row count">
                        <div class="col-md-4 col-md-offset-4 marginbot20">
                            <div class="counter-item counter-lg">
                                <span class="fa fa-download fa-4x"></span>
                                <div class="count-value" data-count="10215"><span class="start-count">0</span></div>
                                <p>Downloader</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <div class="heading marginbot20">
                                <h1>Surfing with new experiences</h1>
                                <p>No timeam sanctus iudicabit nec, eum ut dicam insolens impetus gloriatur.</p>
                            </div>
                            <form>
                                <div class="form-group">
                                    <input type="email" class="form-control input-lg" id="exampleInputEmail1" placeholder="Enter your email address" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg">Download now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End parallax counter -->


          <?= $this->render('partials/_footer'); ?>



        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>