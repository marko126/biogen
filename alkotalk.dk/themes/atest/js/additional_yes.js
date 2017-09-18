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
        prevArrow: '<button type="button" data-role="none" class="slick-prev">Previous</button>'   
    });
    
    // set initial slick-list height
    setSlickListHeight(240,68);
    
    // set events after slide change
    $('.regular').on('afterChange', function (event, slick, currentSlide) {
        if(currentSlide === 0) {
            $('#previous-question').hide();
            $('#tilbage').attr('style','display:none');
            setSlickListHeight(240,68);
        } else {
            $('#previous-question').show();
            if (currentSlide === 3) {
                $('#tilbage').attr('onclick','$(".regular").slick("slickGoTo",1)');
            } else if (currentSlide === 4) {
                if ($('#TestQuestion_2_1_answer_id').is(':checked')) {
                    $('#tilbage').attr('onclick','$(".regular").slick("slickGoTo",2)');
                } else {
                    $('#tilbage').attr('onclick','$(".slick-prev").trigger("click")');
                }
            } else {
                $('#tilbage').attr('onclick','$(".slick-prev").trigger("click")');
            }
            $('#tilbage').removeAttr('style');
            if (currentSlide === 1) {
                $('.slick-list').removeAttr('style');
                $('.slider').removeAttr('style');
            } else if((currentSlide === 2)) {
                setSlickListHeight(240,68);
            } else if((currentSlide === 4)) {
                setSlickListHeight(240,73);
            } else {
                setSlickListHeight(240,58);
            }
        }
    });
    
    // events when label is clicked
    $("label").click(function(e){
        e.preventDefault(); 
        $("#"+$(this).attr("for")).click().change(); 
        
        //$("#"+$(this).attr("for")).prev().val($("#"+$(this).attr("for")).val());
        
        if ($("#"+$(this).attr("for")).is(':checked')) {
            $("#"+$(this).attr("for")).prev().val($("#"+$(this).attr("for")).val());
        } else {
            $("#"+$(this).attr("for")).prev().val('');
        }
        
        // on slide nr. 2 checking if pressed button is Ja (69) or Nej (70)
        if ($("#"+$(this).attr("for")).attr('value') == 69) {  
            // if Ja is pressed trigger click to next slide nr. 2
            if (screen.width < 768) {
                $("#"+$(this).attr("for")).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').next('.slick-next').trigger('click');
            } else {
                $("#"+$(this).attr("for")).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').next('.slick-next').trigger('click');
            }
        // if Nej is pressed go to slide nr. 4 and rename input on slide nr. 3
        } else if ($("#"+$(this).attr("for")).attr('value') == 70) {
            $('.regular').slick('slickGoTo',3);
            //$('#TestQuestion_3_question_id').attr('name', 'TestQuestion1[3][question_id]');
        }
        
        if ($("#"+$(this).attr("for")).attr('name') == 'TestQuestion[1][answer_id][9]') {
            if ($("#"+$(this).attr("for")).is(':checked')) {
                $("#answer_text_68").removeAttr('disabled');
            } else {
                $("#answer_text_68").attr('disabled', 'disabled');
            }
        }
        if ($("#"+$(this).attr("for")).attr('name') == 'TestQuestion[5][answer_id][9]') {
            if ($("#"+$(this).attr("for")).is(':checked')) {
                $("#answer_text_85").removeAttr('disabled');
            } else {
                $("#answer_text_85").attr('disabled', 'disabled');
            }
        }
        
    });  
    
    // events when NEASTE button is clicked
    $('.question-next-a').on('click', function(){
        if (isNonEmptyCheckbox($(this)) && $(this).attr('id') != 'submit-test') {
            if ($(this).attr('id') == 'question-3-next') {
                $('.regular').slick('slickGoTo',4);
            }
            $('.slick-next').trigger('click'); 
        }
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
    if (this1.parent().parent().parent().children('.form-column').find("input[type='checkbox']").length > 0) {
        this1.parent().parent().parent().children('.form-column').find("input[type='checkbox']").each(function(){
            if ($(this).is(":checked")) {
                valid = valid || true;
            } else {
                valid = valid || false;
            }
        });
    } else {
        valid = valid || true;
    }
    
    return valid;
}