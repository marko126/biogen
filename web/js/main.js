$(document).on('ready', function() {
    $(".slider").slick({
	dots: false,
	infinite: true,
	arrows: false,
	slidesToShow: 1,
	slidesToScroll: 1,
	draggable: false,
        touchMove: false,
        swipe: false,
    });
    
    $('.left-arrow').click(function(){
        $('.slider').slick("slickPrev");
    });

    $('.right-arrow').click(function(){
        $('.slider').slick("slickNext");
    });
});