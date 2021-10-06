$(function () {
    'use strict';

    // Adjust
    var winHi = $(window).height(),
        upperHi = $('.upper-bar').innerHeight();

    $('.slider, .carousel-item').height(winHi - upperHi - 100);

    // Box effects
    boxEffects();

    function boxEffects() {

        $('.box .row h4 ,.digram .card-body .not-active span').fadeOut(1000, function () {

            $(this).fadeIn(1000);
            boxEffects();
        });
    }

    // Buttons With Effets
    $('.button-effect').each(function () {
        $(this).prepend('<span></apan>');
    });

    $('.from-top').hover(function () {

        $(this).find('span').eq(0).animate({

            height: '100%'

        }, 300)

    }, function () {

        $(this).find('span').eq(0).animate({

            height: 0

        }, 300)
    });


    // add border buttom in nav-bar
    $('.navbar ul .nav-item').hover(function () {

        $(this).append('<span></span>');

        $(this).find('span').eq(0).animate({

            width: '20px'

        }, 300)

    }, function () {

        $(this).find('span').eq(0).animate({

            width: 0
        },300);

    });


        $('.latest-post .row .image').hover(function () {

            $(this).find('div').eq(0).animate({

                height: '100%',
                display: 'block'

            }, 300);

        }, function () {

            $(this).find('div').eq(0).animate({

                height: 0,

            }, 300)
        });

        // $('.latest-post .row .image:hover over', function () {
        //     $(this).animate({
        //         height: '100%'
        //     }, 300);
        // }, function () {
        //     $(this).animate({
        //         height: 0
        //     }, 300);
        // })


        // $('.latest-post .row .image').hover(function () {

        //     $('.latest-post .row .image over').animate({

        //         height: '100%'

        //     }, 300);

        // }, function () {

        //     $(this).animate({

        //         height: 0

        //     }, 300)

        // });


        $('.call-us button').hover(function () {

            $(this).animate({

                marginTop: '10px'

            }, 300);

        }, function () {

            $(this).animate({

                marginTop: 0

            }, 300);
        });


        // Trigger NiceScroll
        $('body').niceScroll({
            cursorcolor: '#f03',
            cursorwidth: '10px',
            cursorborder: 'none',
            cursorborderradius: '0',
            zindex: '99999999',
            smoothscroll: 'true',
        });


        // Scroll To Up Button And Navbar
        let navScroll = $('.scriptnavbar');
        let dropdownMenu = $('.scriptnavbar .collapse .scriptdropdown');
        let scrollTop = $('.scrollTop');

        $(window).scroll(function () {

            if ($(window).scrollTop() >= 400) {

                navScroll.css({
                    position: 'fixed',
                    width: '100%',
                    height: '56.4px',
                    top: 0,
                    boxShadow: '0 0 24px rgba(0, 0, 0, .9)',
                    transition: '1s',

                }, 300);

                dropdownMenu.css({

                    backgroundColor: '#212529',
                })
            } else {

                if ($(window).height(0)) {
                    navScroll.css({
                        height: 0,
                        padding: 0,
                        zindex: '10',
                        top: '100px',
                        transition: '1s'

                    }, 300);
                }
            }


            if ($(window).scrollTop() >= 1000) {

                if (scrollTop.is(':hidden')) {

                    scrollTop.fadeIn(400);

                }

            } else {

                scrollTop.fadeOut(400);
            }
        });

        // Click on Scroll Up to Go Up
        $('.screenTop').on('click', function (e) {

            e.prevendDefault();

            $('html , body').animate({

                scrollTop: 0

            }, 1000);
        });

    });