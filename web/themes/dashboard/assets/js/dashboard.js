function footerCssPadding(selector) {
    $('.footer').css({'padding-left': ($(selector).hasClass('active')) ? 250 : 0});
}
function changeCSS(cssFile, cssLinkIndex) {

    var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);

    var newlink = document.createElement("link");
    newlink.setAttribute("rel", "stylesheet");
    newlink.setAttribute("type", "text/css");
    newlink.setAttribute("href", cssFile);

    document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
}
$(function () {
    $('[data-toggle="popover"]').popover({
        //trigger: 'hover'
        container: 'body'
    });

    //Slidebar
    var toggle_selector = '#wrapper';
    var cook_name = toggle_selector.replace(/#/g, "");

    footerCssPadding(toggle_selector);

    var dashboard = {
        saveMenuCookie: function (data) {
            console.log(data);
            $.cookie(cook_name, data, {
                expires: 7,
                path: '/' //window.location.href
            });
        }
    };
    if (!$('#sidebar-wrapper').length) {
        $(toggle_selector).removeClass('active');
        dashboard.saveMenuCookie(false);
    } else {
        dashboard.saveMenuCookie($(toggle_selector).hasClass('active'));
    }

    $(document).on('click', "#menu-toggle", function (e) {
        $(toggle_selector).toggleClass("active");
        //$('#menu ul').hide();
        footerCssPadding(toggle_selector);
        dashboard.saveMenuCookie($(toggle_selector).hasClass('active'));
        e.preventDefault();
    });
});

