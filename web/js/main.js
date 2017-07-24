$(document).on('ready', function() {
    
    $(".slider").slick({
	dots: false,
	infinite: false,
	arrows: false,
	slidesToShow: 1,
	slidesToScroll: 1,
	draggable: false,
        touchMove: false,
        swipe: false,
    });
    
    $('.pull-left').on('click', function(){
        if ($('#page-number').val() == '4' && $('#slide-number').val() == '7') {
            $('.slider').slick('slickGoTo', 0, true);
        } else if($('#page-number').val() == '6' && $('#slide-number').val() == '9') {
            $('.slider').slick('slickGoTo', 7, true);
        } else if($('#page-number').val() == '6' && $('#slide-number').val() == '12') {
            $('.slider').slick('slickGoTo', 10, true);
        } else if($('#page-number').val() == '6' && $('#slide-number').val() == '17') {
            $('.slider').slick('slickGoTo', 15, true);
        } else {    
            $('.slider').slick("slickPrev");
        }
    });

    $('.pull-right').on('click', function(){
        if ($('#page-number').val() == '4' && $('#slide-number').val() == '0') {
            $('.slider').slick('slickGoTo', 7, true);
        } else if ($('#page-number').val() == '6' && $('#slide-number').val() == '2') {
            window.location = '/index.php/site/category?id=7';
        } else if ($('#page-number').val() == '6' && $('#slide-number').val() == '7') {
            $('.slider').slick('slickGoTo', 9, true);
        } else if ($('#page-number').val() == '6' && $('#slide-number').val() == '10') {
            $('.slider').slick('slickGoTo', 12, true);
        } else if ($('#page-number').val() == '6' && $('#slide-number').val() == '16') {
            $('.slider').slick('slickGoTo', 12, true);
        } else {
            $('.slider').slick("slickNext");
        }
    });
    
});

function setPopupEvent(name, btnId, closeId) {
    // Get the modal
    var modal = document.getElementById(name);

    // Get the button that opens the modal
    var btn = document.getElementById(btnId);

    // Get the <span> element that closes the modal
    var span = document.getElementById(closeId);
    var span2 = document.getElementById(name);

    // When the user clicks the button, open the modal 
    //btn.onclick = function() {
        modal.style.display = "block";
    //}

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        //console.log(event.target.id+' == '+modal.id);
        if (event.target == modal) {
            
            modal.style.display = "none";
        }
    }
}

function toggleNerves() {
    $('.toggle').fadeToggle();
    //$('#damaged-myelin').fadeToggle(200);
    //$('#broken-nerve-wire').fadeToggle(200);
}

function redirect(url) {
    window.location = url;
    return false;
}

function goToSlide(currentSlide, slideToGo) {
    
}