$(document).ready(function () {

    $('#owl-hero').owlCarousel({
        margin: 0,
        singleItem: true,
        loop: true,
        items: 1,
        nav: true,
        navText: ["<span class='slide-prev'></span>", "<span class='slide-next'></span>"],
        dots: false,
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: true,
        onInitialized: counter, //When the plugin has initialized.
        onTranslated: counter //When the translation of the stage has finished.
    });

    function counter(event) {
        var element = event.target; // DOM element, in this example .owl-carousel
        var items = event.item.count; // Number of items
        var item = event.item.index + 1; // Position of the current item

        // it loop is true then reset counter from 1
        if (item > items) {
            item = item - items
        }
        $('.slide-counter').html(item + "/" + items);
    }


    $('#owl-testimonials').owlCarousel({
        margin: 0,
        loop: true,
        items: 1,
        nav: true,
        navText: ["<span class='slide-prev'></span>", "<span class='slide-next'></span>"],
        dots: false,
        autoplay: true,
        autoplayTimeout: 12000,
        autoplayHoverPause: true,
        onInitialized: counterT, //When the plugin has initialized.
        onTranslated: counterT, //When the translation of the stage has finished.

    });

    function counterT(event) {
        var element = event.target; // DOM element, in this example .owl-carousel
        var items = event.item.count; // Number of items
        var item = event.item.index + 1; // Position of the current item

        // it loop is true then reset counter from 1
        if (item > items) {
            item = item - items
        }
        $('.slide-counterT').html(item + "/" + items);
    }

});
