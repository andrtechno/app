(function ($) {
    "use strict";

    //new WOW().init();

    /*---background image---*/
    function dataBackgroundImage() {
        $('[data-bgimg]').each(function () {
            var bgImgUrl = $(this).data('bgimg');
            $(this).css({
                'background-image': 'url(' + bgImgUrl + ')', // + meaning concat
            });
        });
    }

    $(window).on('load', function () {
        dataBackgroundImage();
    });

    /*---stickey menu---*/
    $(window).on('scroll',function() {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $(".sticky-header").removeClass("sticky");
        }else{
            $(".sticky-header").addClass("sticky");
        }
    });


    /*---slider activation---*/
    $('.slider_area').owlCarousel({
        animateOut: 'fadeOut',
        autoplay: true,
        loop: true,
        nav: false,
        autoplayTimeout: 8000,
        items: 1,
        dots:true,
    });




    /*---product column4 activation---*/
    $('.product_sidebar_column4').on('changed.owl.carousel initialized.owl.carousel', function (event) {
        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')}).owlCarousel({
        autoplay: true,
        loop: true,
        nav: true,
        autoplayTimeout: 8000,
        items: 4,
        margin:20,
        dots:false,
        navText: ['<i class="icon-arrow-left"></i>','<i class="icon-arrow-right"></i>'],
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            576:{
                items:2,
            },
            768:{
                items:3,
            },

            1200:{
                items:4,
            },
        }
    });

    /*---featured column3 activation---*/
    $('.featured_column3').on('changed.owl.carousel initialized.owl.carousel', function (event) {
        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')}).owlCarousel({
        autoplay: true,
        loop: true,
        nav: false,
        autoplayTimeout: 8000,
        items: 3,
        dots:false,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            768:{
                items:2,
            },
            992:{
                items:3,
            },

        }
    });



    /*---blog thumb activation---*/
    $('.blog_thumb_active').owlCarousel({
        autoplay: true,
        loop: true,
        nav: true,
        autoplayTimeout: 8000,
        items: 1,
        margin:20,
        navText: ['<i class="ion-ios-arrow-thin-left"></i>','<i class="ion-ios-arrow-thin-right"></i>'],
    });

    /*---brand container activation---*/
    $('.brand_container').on('changed.owl.carousel initialized.owl.carousel', function (event) {
        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')}).owlCarousel({
        autoplay: true,
        loop: true,
        nav: false,
        autoplayTimeout: 8000,
        items: 5,
        dots:false,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            480:{
                items:2,
            },
            768:{
                items:3,
            },
            992:{
                items:4,
            },
            1200:{
                items:5,
            },

        }
    });

    /*---small product activation---*/
    $('.small_product_active').slick({
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 1,
        arrows:false,
        rows: 3,
        responsive:[
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            },
        ]
    });

    /*---single product activation---*/
    $('.single-product-active').owlCarousel({
        autoplay: true,
        loop: true,
        nav: true,
        autoplayTimeout: 8000,
        items: 4,
        margin:15,
        dots:false,
        navText: ['<i class="icon-arrow-left"></i>','<i class="icon-arrow-right"></i>'],
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            320:{
                items:2,
            },
            992:{
                items:3,
            },
            1200:{
                items:4,
            },


        }
    });

    /*---testimonial active activation---*/
    $('.testimonial_active').owlCarousel({
        autoplay: true,
        loop: true,
        nav: false,
        autoplayTimeout: 8000,
        items: 1,
        dots:true,
    });

    /*---product navactive activation---*/
    $('.product_navactive').owlCarousel({
        autoplay: true,
        loop: true,
        nav: true,
        autoplayTimeout: 8000,
        items: 4,
        dots:false,
        navText: ['<i class="icon-arrow-left"></i>','<i class="icon-arrow-right"></i>'],
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            250:{
                items:2,
            },
            480:{
                items:3,
            },
            768:{
                items:4,
            },

        }
    });

    $('.modal').on('shown.bs.modal', function () {
        $('.product_navactive').resize();
    });

    $('.product_navactive a').on('click',function(e){
        e.preventDefault();

        var $href = $(this).attr('href');

        $('.product_navactive a').removeClass('active');
        $(this).addClass('active');

        $('.product-details-large .tab-pane').removeClass('active show');
        $('.product-details-large '+ $href ).addClass('active show');

    });

    /*---  Accordion---*/
    $(".faequently-accordion").collapse({
        accordion:true,
        open: function() {
            this.slideDown(300);
        },
        close: function() {
            this.slideUp(300);
        }
    });


    /*---countdown activation---*/

    $('[data-countdown]').each(function() {
        var $this = $(this), finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<div class="countdown_area"><div class="single_countdown"><div class="countdown_number">%D</div><div class="countdown_title">Days</div></div><div class="single_countdown"><div class="countdown_number">%H</div><div class="countdown_title">Hours</div></div><div class="single_countdown"><div class="countdown_number">%M</div><div class="countdown_title">Mins</div></div><div class="single_countdown"><div class="countdown_number">%S</div><div class="countdown_title">Secs</div></div></div>'));

        });
    });



    /*---slide toggle activation---*/
    $('.mini_cart_wrapper > a').on('click', function(){
        if($(window).width() < 991){
            $('.mini_cart').slideToggle('medium');
        }
    });

    /*categories slideToggle*/
    $(".categories_title").on("click", function() {
        $(this).toggleClass('active');
        $('.categories_menu_toggle').slideToggle('medium');
    });

    /*------addClass/removeClass categories-------*/
    $("#cat_toggle.has-sub > a").on("click", function() {
        $(this).removeAttr('href');
        $(this).toggleClass('open').next('.categorie_sub').toggleClass('open');
        $(this).parents().siblings().find('#cat_toggle.has-sub > a').removeClass('open');
    });


    /* ---------------------
     Category menu
     --------------------- */


    function categorySubMenuToggle(){
        var $categoryMenuLink = $('.categories_menu_toggle li.menu_item_children > a');
        $categoryMenuLink.on('click', function(){
            if($(window).width() < 991){
                $(this).removeAttr('href');
                var element = $(this).parent('li');
                if (element.hasClass('open')) {
                    element.removeClass('open');
                    element.find('li').removeClass('open');
                    element.find('ul').slideUp();
                }
                else {
                    element.addClass('open');
                    element.children('ul').slideDown();
                    element.siblings('li').children('ul').slideUp();
                    element.siblings('li').removeClass('open');
                    element.siblings('li').find('li').removeClass('open');
                    element.siblings('li').find('ul').slideUp();
                }
            }
        });
        $categoryMenuLink.append('<span class="expand"></span>');
    }
    categorySubMenuToggle();





    /*---canvas menu activation---*/
    $('.canvas_open').on('click', function(){
        $('.Offcanvas_menu_wrapper,.off_canvars_overlay').addClass('active')
    });

    $('.canvas_close,.off_canvars_overlay').on('click', function(){
        $('.Offcanvas_menu_wrapper,.off_canvars_overlay').removeClass('active')
    });



    /*---Off Canvas Menu---*/
    var $offcanvasNav = $('.offcanvas_main_menu'),
        $offcanvasNavSubMenu = $offcanvasNav.find('.sub-menu');
    $offcanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i class="fa fa-angle-down"></i></span>');

    $offcanvasNavSubMenu.slideUp();

    $offcanvasNav.on('click', 'li a, li .menu-expand', function(e) {
        var $this = $(this);
        if ( ($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand')) ) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length){
                $this.siblings('ul').slideUp('slow');
            }else {
                $this.closest('li').siblings('li').find('ul:visible').slideUp('slow');
                $this.siblings('ul').slideDown('slow');
            }
        }
        if( $this.is('a') || $this.is('span') || $this.attr('clas').match(/\b(menu-expand)\b/) ){
            $this.parent().toggleClass('menu-open');
        }else if( $this.is('li') && $this.attr('class').match(/\b('menu-item-has-children')\b/) ){
            $this.toggleClass('menu-open');
        }
    });


    /*js ripples activation
    $('.js-ripples').ripples({
        resolution: 512,
        dropRadius: 20,
        perturbance: 0.04
    });*/


})(jQuery);	