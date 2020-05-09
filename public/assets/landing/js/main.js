$(document).ready(function () {

    //Nav Mobile 
    $(".jsNavMobile").click(function () {
        $(".main-navigation").slideToggle(200);
        $(this).toggleClass("nav-mobile-close");
    });



    //Expand image
    $('.expand-image').click(function () {
        $('.modal-hero-image').slideDown(300);
        var selectedImage = $('#owl-hero').find('.active').find('img').attr('src');
        $('.modal-hero-image').find('img').attr('src', selectedImage);
    });
    $('.modal-close').click(function () {
        $('.modal-hero-image').slideUp(300);
    });

    //Portfolio filter custom
    $('.js-pf-link').click(function () {

        $('.js-pf-link').removeClass('current');
        $(this).addClass('current');

        var seletedItem = $(this).text();

        $('.video').removeClass('disabled');
        $('.photo').removeClass('disabled');

        if (seletedItem.indexOf("Photo") >= 0) {
            $('.video').addClass('disabled');
        } else if (seletedItem.indexOf("Video") >= 0) {
            $('.photo').addClass('disabled');
        }
    });




    //Main navigation focus to secion
    $('.main-navigation > li > a[href*="#"]')
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (event) {
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname
            ) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

                if (target.length) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function () {
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });


});
