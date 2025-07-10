$(".slider").slick({
    arrows: true,
    infinite: true,
    prevArrow: $(".prev-arrow"),
    nextArrow: $(".next-arrow"),
});
$(".slider-2").slick({
    arrows: true,
    infinite: true,
    prevArrow: $(".prev-arrow-2"),
    nextArrow: $(".next-arrow-2"),
});
$(".slider-3").slick({
    arrows: true,
    infinite: true,
    prevArrow: $(".prev-arrow-3"),
    nextArrow: $(".next-arrow-3"),
});
// $(".slider-4").slick({
//     arrows: true,
//     infinite: true,
//     prevArrow: $(".prev-arrow.prev-arrow-2"),
//     nextArrow: $(".next-arrow.next-arrow-2"),
// });

$(".building-slider").slick({
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 2,
    responsive: [
        {
            breakpoint: 640,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});
$(".location-slider").slick({
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
});

$(".apartments-slider").slick({
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 999,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 640,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});

$(".navigator-slider").slick({
    dots: false,
    arrows: true,
    autoplay: false,
    infinite: false,
    slidesToShow: 8,
    slidesToScroll: 1,
    variableWidth: true,
    swipeToSlide: true,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: true,
                swipeToSlide: true,
                infinite: false,
            },
        },
    ],
});

Fancybox.bind("[data-fancybox]", {});
