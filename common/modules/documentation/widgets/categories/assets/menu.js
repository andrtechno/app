$(function(){
    $('li.parent > a').click(function(){
        $(this).prev().toggleClass('active');
        $(this).toggleClass('active');
        $(this).next('ul.button2').slideToggle('slow');
        return false;
    });
});




