$(document).on('ready', function() {
    
    // initialize slick slider
    $(".regular").slick({
	dots: true,
	infinite: true,
	arrows: true,
	slidesToShow: 1,
	slidesToScroll: 1,
	draggable: false,
        touchMove: false,
        swipe: false,
        infinite: false,
        prevArrow: '<button type="button" data-role="none" class="slick-prev">Previous</button>'   
    });
    
    // set events after slide change
    $('.regular').on('afterChange', function (event, slick, currentSlide) {
        if(currentSlide === 0) {
            $('#previous-question').hide();
            $('#tilbage').attr('style','display:none');
        } else {
            $('#previous-question').show();
            $('#tilbage').attr('onclick','$(".slick-prev").trigger("click")');
            $('#tilbage').removeAttr('style');
            setSlickListHeight(240,73);
        }
    });
    
    // events when label is clicked
    $("label").click(function(e){
        e.preventDefault(); 
        $("#"+$(this).attr("for")).click().change(); 
        
        $("#"+$(this).attr("for")).prev().val($("#"+$(this).attr("for")).val());
        
        if ($("#"+$(this).attr("for")).attr('name') === 'TestQuestion[1][answer_id]') {    
            if (screen.width < 768) {
                $("#"+$(this).attr("for")).parent('div').parent('div').parent('div').parent('div').next('.slick-next').trigger('click');
            } else {
                $("#"+$(this).attr("for")).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').next('.slick-next').trigger('click');
            }
        } 
        
        if ($("#"+$(this).attr("for")).attr('name') == 'TestQuestion[2][answer_id][9]') {
            if ($("#"+$(this).attr("for")).is(':checked')) {
                $("#answer_text_85").removeAttr('disabled');
            } else {
                $("#answer_text_85").attr('disabled', 'disabled');
            }
        }
    });  
    
    // events when NEASTE button is clicked
    $('.question-next-a').on('click', function(){
        $('.slick-next').trigger('click');
        return false;
    });
    
    // submit form when CODE RAD button is clicked
    $('#next_button_link_comparison').on('click', function(){
        if (isNonEmptyCheckbox($(this).parent())) {
            $('#submit-test').trigger('click');
        }
    });
    
    $('#header-logo-img').on('click', function(){
        setPopupEvent('popup-info', 'header-logo-img', 'popup-info-close');
    });
    $('#header-home-img').on('click', function(){
        setPopupEvent('popup-home', 'header-home-img', 'popup-home-close');
    });
    
    function setSlickListHeight(height1,height2){
        if (screen.width < 768) {
            $(".slick-list").attr('style', 'max-height: '+height1+'vw');
            $(".slider").attr('style', 'max-height: '+height1+'vw');
        } else {
            $(".slick-list").attr('style', 'max-height:100vw; height: '+height2+'vw');
        }
    }
});

function isNonEmptyCheckbox(this1) {
    var valid = false;
    this1.parent().parent().prev().find("input[type='checkbox']").each(function(){
        if ($(this).is(":checked")) {
            valid = valid || true;
        } else {
            valid = valid || false;
        }
    });
    return valid;
}