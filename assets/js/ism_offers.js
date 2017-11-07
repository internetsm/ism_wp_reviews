var ism = window.ism || {};

ism.initDatepickers = function () {

    jQuery("#datepicker-arrival").datepicker({
        dateFormat: 'dd-mm-yy',
    });

    jQuery("#datepicker-departure").datepicker({
        dateFormat: 'dd-mm-yy',
    });
};

ism.initCarousels = function () {
    jQuery(".slick-carousel").each(function () {
        var carousel = jQuery(this);
        var columns = carousel.data("columns");
        var scroll_columns = carousel.data("scroll_columns");
        var autoplay = carousel.data("autoplay");
        var arrows = carousel.data("arrows");
        var dots = carousel.data("dots");

        carousel.slick({
            slidesToShow: columns,
            slidesToScroll: scroll_columns,
            arrows: arrows,
            dots: dots,
            autoplay: autoplay,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]

        });
    });
};

jQuery(function () {
    ism.initDatepickers();
    ism.initCarousels();
});