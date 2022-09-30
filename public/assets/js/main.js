// Navbar transparent to solid
$(function () {
    $(window).on("scroll", function () {
        if ($(window).scrollTop() > 10) {
            $(".navbar").addClass("bg-theme");
        } else {
            $(".navbar").removeClass("bg-theme");
        }
    });
});

var multipleCardCarousel = document.querySelector("#slideNews");
if (window.matchMedia("(min-width: 768px)").matches) {
    var carousel = new bootstrap.Carousel(multipleCardCarousel, {
        interval: false,
    });
    var carouselWidth = $(".carousel-inner.slide-news")[0].scrollWidth;
    var cardWidth = $(".carousel-item.slide-news").width();
    var scrollPosition = 0;
    $("#slideNews .carousel-control-next.slide-news").on("click", function () {
        if (scrollPosition < carouselWidth - cardWidth * 4) {
            scrollPosition += cardWidth;
            $("#slideNews .carousel-inner.slide-news").animate(
                { scrollLeft: scrollPosition },
                600
            );
        }
    });
    $("#slideNews .carousel-control-prev.slide-news").on("click", function () {
        if (scrollPosition > 0) {
            scrollPosition -= cardWidth;
            $("#slideNews .carousel-inner.slide-news").animate(
                { scrollLeft: scrollPosition },
                600
            );
        }
    });
} else {
    $(multipleCardCarousel).addClass("slide");
}

var multipleCardCarouselArsip = document.querySelector("#slideArsip");
if (window.matchMedia("(min-width: 768px)").matches) {
    var carouselArsip = new bootstrap.Carousel(multipleCardCarouselArsip, {
        interval: false,
    });
    var carouselWidthArsip = $(".carousel-inner.slide-news")[0].scrollWidth;
    var cardWidthArsip = $(".carousel-item.slide-arsip").width();
    var scrollPositionArsip = 0;
    $("#slideArsip .carousel-control-next.slide-arsip").on(
        "click",
        function () {
            if (scrollPositionArsip < carouselWidthArsip - cardWidthArsip * 4) {
                scrollPositionArsip += cardWidthArsip;
                $("#slideArsip .carousel-inner.slide-arsip").animate(
                    { scrollLeft: scrollPositionArsip },
                    600
                );
            }
        }
    );
    $("#slideArsip .carousel-control-prev.slide-arsip").on(
        "click",
        function () {
            if (scrollPositionArsip > 0) {
                scrollPositionArsip -= cardWidthArsip;
                $("#slideArsip .carousel-inner.slide-arsip").animate(
                    { scrollLeft: scrollPositionArsip },
                    600
                );
            }
        }
    );
} else {
    $(multipleCardCarouselArsip).addClass("slide");
}
