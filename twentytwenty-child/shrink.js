jQuery(document).ready(function($) {
    $(window).scroll(function () {
        if ($(window).scrollTop() > 150) { 
            $('header').addClass('shrink');
        }
        else{
            $('header').removeClass('shrink');
        }
    });
});