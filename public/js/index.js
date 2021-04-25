jQuery(document).ready(function ($) {

    $('.main-slider-content').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        rtl: true,
        items: 1,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
    });

    $('.main-content-box-slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        rtl: true,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            768: {
                items: 2,
                nav: true
            },
            900: {
                items: 3,
                nav: true,

            }
        }
    });

    $('.ads-banner-box .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        rtl: true,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],

        responsive: {
            0: {
                items: 1,

            },
            768: {
                items: 2,

            },
            1340: {
                items: 3,

            }
        }

    });

    $('.main-slider .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        nav: false,
        autoplayHoverPause: true,
        rtl: true,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],

        responsive: {
            0: {
                items: 1,

            },
            768: {
                items: 2,

            },
            1340: {
                items: 3,

            }
        }

    });

    $("#sidebar1").stick_in_parent();

    $('.onlinechat_content header').click(function () {

        $('.main_chat').slideToggle(200);


    });

    $('.main-slider4 .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        nav: false,
        autoplayHoverPause: true,
        rtl: true,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],

        responsive: {
            0: {
                items: 1,

            },
            768: {
                items: 2,

            },
            1340: {
                items: 1,

            }
        }

    });

    setTimeout(function () {

        $('.main_chat').slideToggle();

    }, 600000);


});