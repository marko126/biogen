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
        if ($('#slide-number').val() == '2') {
            setDefaultNerves();
            $('.slider').slick("slickPrev");
        } else if($('#slide-number').val() == '23') {
            $('.slider').slick('slickGoTo', 16, false);
        } else if($('#slide-number').val() == '37') {
            $('.slider').slick('slickGoTo', 35, false);
        } else if($('#slide-number').val() == '40') {
            $('.slider').slick('slickGoTo', 38, false);
        } else if($('#slide-number').val() == '45') {
            $('.slider').slick('slickGoTo', 30, false);
        } else {    
            $('.slider').slick("slickPrev");
        }
    });

    $('.pull-right').on('click', function(){
        if ($('#slide-number').val() == '2') {
            setDefaultNerves();
            $('.slider').slick("slickNext");
        } else if ($('#slide-number').val() == '16') {
            $('.slider').slick('slickGoTo', 23, false);
        } else if ($('#slide-number').val() == '30') {
            $('.slider').slick('slickGoTo', 45, false);
        } else if ($('#slide-number').val() == '35') {
            $('.slider').slick('slickGoTo', 37, false);
            //$('.slider').slick('slickFilter',':not(#slide-6-9)');
        } else if ($('#slide-number').val() == '38') {
            $('.slider').slick('slickGoTo', 40, false);
        } else if ($('#slide-number').val() == '44' || $('#slide-number').val() == '43') {
            $('.slider').slick('slickGoTo', 45, false);
        } else {
            $('.slider').slick("slickNext");
        }
    });
    
    $('.cat-1').on('click', function(){
        $('.slider').slick('slickGoTo', 1, true);
        reloadImg('#gif-1-1');
    });
    
    $('.cat-2').on('click', function(){
        $('.slider').slick('slickGoTo', 7, true);
    });
    
    $('.cat-3').on('click', function(){
        $('.slider').slick('slickGoTo', 11, true);
    });
    
    $('.cat-4').on('click', function(){
        $('.slider').slick('slickGoTo', 16, true);
    });
    
    $('.cat-5').on('click', function(){
        $('.slider').slick('slickGoTo', 24, true);
    });
    
    $('.cat-6').on('click', function(){
        $('.slider').slick('slickGoTo', 27, true);
    });
    
    $('.cat-7').on('click', function(){
        $('.slider').slick('slickGoTo', 45, true);
    });
    
    $('.cat-8').on('click', function(){
        $('.slider').slick('slickGoTo', 46, true);
    });
    
    $('.menu-item').on('click', function(){
        $('.menu-text').trigger('click');
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
    
    var footer = document.getElementById('footer-2');

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
        //console.log($(event.target).attr('class')+' == '+modal.tagName);
        if (event.target == modal || $.inArray($(event.target).attr('class'), ['left-img', 'right-img']) > -1) {
            console.log($(event.target).attr('class'));
            modal.style.display = "none";
        }
    }
    
}

function toggleNerves() {
    $('.toggle').fadeToggle();
    //$('#damaged-myelin').fadeToggle(200);
    //$('#broken-nerve-wire').fadeToggle(200);
}
function setDefaultNerves() {
    if ($('#damaged-myelin').attr('style') == 'display: none;') {
        toggleNerves();
    }
}

function redirect(url) {
    window.location = url;
    return false;
}

function goToSlide(currentSlide, slideToGo) {
    
}

function reloadImg (id) {
        var img_src = $(id).attr('src');
        $(id).attr('src',img_src);
    }