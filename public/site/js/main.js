/*Nav Bar
==============================*/
$(document).ready(function () {
    "use strict";
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('header').addClass("move");
        } else {
            $('header').removeClass("move");   
        }  
    });
});

/* Header Hover
============================*/
$(document).ready(function () {
    "use strict";
    var hoverBgHalfWidth = $("#hover-bg").width() / 2,
        hoverActivePosition = $(".navbar-nav li.active").outerWidth() / 2 - hoverBgHalfWidth,
        b = 20;
    $("#hover-bg").css({
        left: $(".navbar-nav li.active").position().left + hoverActivePosition
    });
    $(".navbar-nav li").hover(function () {
        var thisHoverItem = $(this).outerWidth() / 2 - hoverBgHalfWidth;
        $("#hover-bg").css({
            left: $(this).position().left + thisHoverItem
        });
    }, function () {
        $("#hover-bg").css({
            left: $(".navbar-nav li.active").position().left + hoverActivePosition
        });
    });    
});

/* OWL  slide
================================*/
$(document).ready(function () {
    "use strict";
    $(".projects").owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        smartSpeed: 3000,
        autoplayHoverPause: true,
        margin: 25,
        navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'],
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            991: {
                items: 2
            },
            1200: {
                items: 3
            },
            1400: {
                items: 4
            }
            
        }
    });
    $(".partners").owlCarousel({
        loop: false,
        nav: false,
        dots: true,
        smartSpeed: 3000,
        autoplayHoverPause: true,
        margin: 0,
        navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'],
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            767: {
                items: 4
            },
            991: {
                items: 5
            },
            1200: {
                items: 6
            },
            1400: {
                items: 7
            }
            
        }
    });
    $(".testimonials").owlCarousel({
        loop: false,
        nav: false,
        dots: true,
        smartSpeed: 3000,
        autoplayHoverPause: true,
        margin: 0,
        navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'],
        autoplay: true,
        responsive: {
            0: {
                items: 1
            }
        }
    });
});

/* Top
=============================*/
$(document).ready(function () {
    "use strict";
    var scrollbutton = $(".up-btn");
    $(window).scroll(function () {
        $(this).scrollTop() >= 500 ? scrollbutton.show() : scrollbutton.hide();
    });
    scrollbutton.click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 600);
    });
});

/*Smooth Scroll
================================*/
$(document).ready(function () {
    "use strict";
    function goToByScroll(id) {
        $('html , body').animate({
            scrollTop: $(id).offset().top
        }, 'slow');
    }
    $('.scroll').click(function () {
        goToByScroll($(this).attr('href'));
        return false;
    });
});

/* Gallery
=================================*/
$(document).ready(function () {
    "use strict";
    $('.popup-youtube').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 10,
        preloader: true,
        fixedContentPos: false
    });
     $('[data-fancybox="gallery"]').fancybox();
});

/*Loading
==========================*/
$(window).on("load", function () {  
    "use strict";
    $(".loader-inner").fadeOut(function () {
    $(this).parent().fadeOut();
        $("body").css({"overflow-y" : "visible"});
    });
});