$(document).on('ready', function() {

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
    
    // events when back button is clicked
    $('.regular').on('afterChange', function (event, slick, currentSlide) {
        if(currentSlide === 0) {
            $('#previous-question').hide();
        } else {
            $('#previous-question').show();
        } 
                                
        if (currentSlide === 0) {
            $('#tilbage').attr('onclick','$("#test-questions").hide();$("#general-questions").show();');
        } else if (currentSlide === 4) {
            $('#tilbage').attr('onclick','$(".slick-list").removeAttr("style");$(".slick-prev").trigger("click")');
        } else if (currentSlide === 5) {
            $('#tilbage').attr('onclick','if(screen.width < 768){$(".slick-list").attr("style", "max-height: 240vw");$(".slider").attr("style", "max-height: 240vw");}else{$(".slick-list").attr("style", "max-height:100vw; height: 86vw");}$(".slick-prev").trigger("click")');
        } else {
            $('#tilbage').attr('onclick','$(".slick-prev").trigger("click")');
        }
    });
    
    // event when answer label is clicked
    $("label").click(function(e){
        e.preventDefault(); 
        $("#"+$(this).attr("for")).click().change(); 
        
        $("#"+$(this).attr("for")).prev().val($("#"+$(this).attr("for")).val());
        //console.log('For question '+$("#"+$(this).attr("for")).attr('name')+' answer is '+$("#"+$(this).attr("for")).val());
        if($("#"+$(this).attr("for")).attr('name') === 'TestQuestion[9][answer_id]'){
            $('#submit-test').trigger('click');
        } else if ($("#"+$(this).attr("for")).attr('name') === 'TestQuestion[4][answer_id]') {
            if (screen.width < 768) {
                $(".slick-list").attr('style', 'max-height: 240vw');
                $(".slider").attr('style', 'max-height: 240vw');
                $("#"+$(this).attr("for")).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').next('.slick-next').trigger('click');
            } else {
                $(".slick-list").attr('style', 'max-height:100vw; height: 86vw');
                $("#"+$(this).attr("for")).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').next('.slick-next').trigger('click');
            }
        } else if ($("#"+$(this).attr("for")).attr('name').indexOf('TestQuestion[5][answer_id]') > -1 || $("#"+$(this).attr("for")).attr('name').indexOf('TestQuestion[8][answer_id]') > -1) {    
            if ($("#"+$(this).attr("for")).attr('name') == 'TestQuestion[5][answer_id][15]') {
                if ($("#"+$(this).attr("for")).is(':checked')) {
                    $("#answer_text_57").removeAttr('disabled');
                } else {
                    $("#answer_text_57").attr('disabled', 'disabled');
                }
            }
            if ($("#"+$(this).attr("for")).attr('name') == 'TestQuestion[5][answer_id][14]') {
                if ($("#"+$(this).attr("for")).is(':checked')) {
                    for (i=1; i<16; i++) {
                        if (i != 14 && $("#TestQuestion_5_"+i+"_answer_id").is(":checked")) {
                            $("#TestQuestion_5_"+i+"_answer_id").trigger("click");
                        }
                    }
                    $("#answer_text_57").attr('disabled', 'disabled');
                }
            } else if ($("#"+$(this).attr("for")).attr('name').indexOf('TestQuestion[5][answer_id]') > -1) {
                if ($("#"+$(this).attr("for")).is(':checked')) {
                    if ($("#TestQuestion_5_14_answer_id").is(":checked")) {
                        $("#TestQuestion_5_14_answer_id").trigger("click");
                    }
                }
            }
            if ($("#"+$(this).attr("for")).attr('name') == 'TestQuestion[8][answer_id][5]') {
                if ($("#"+$(this).attr("for")).is(':checked')) {
                    for (i=1; i<5; i++) {
                        if ($("#TestQuestion_8_"+i+"_answer_id").is(":checked")) {
                            $("#TestQuestion_8_"+i+"_answer_id").trigger("click");
                        }
                    }
                }
            } else if ($("#"+$(this).attr("for")).attr('name').indexOf('TestQuestion[8][answer_id]') > -1) {
                if ($("#"+$(this).attr("for")).is(':checked')) {
                    if ($("#TestQuestion_8_5_answer_id").is(":checked")) {
                        $("#TestQuestion_8_5_answer_id").trigger("click");
                    }
                }
            }
        } else {
            
            if (screen.width < 768) {
                console.log('radiiii');
                $("#"+$(this).attr("for")).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').next('.slick-next').trigger('click');
            } else {
                $("#"+$(this).attr("for")).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').next('.slick-next').trigger('click');
            }
        } 
    });
/*			  
    $('input[type=radio]').on('click', function(){
        $(this).prev().val($(this).val());
        console.log('For question '+$(this).attr('name')+' answer is '+$(this).val());
        if($(this).attr('name') === 'TestQuestion[8][answer_id]'){
            $('#submit-test').trigger('click');
        } else if ($(this).attr('name') === 'TestQuestion[7][answer_id]') {
            
        } else {
            if (window.screen < 768) {
                $(this).parent('div').parent('div').parent('div').parent('div').next('.slick-next').trigger('click');
            } else {
                $(this).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').next('.slick-next').trigger('click');
            }
        }                                        
    });
    */
    
    
    $('.question-next-a').on('click', function(){
        if (isNonEmptyCheckbox($(this))) {
            if ($(this).attr('id') == 'question-5-next') {
                $('.slick-list').removeAttr('style');
                $('.slider').removeAttr('style');
            }
            $('.slick-next').trigger('click');
        }
        
        return false;
    });
    
    $('#header-logo-img').on('click', function(){
        setPopupEvent('popup-info', 'header-logo-img', 'popup-info-close');
    });
    $('#genstand-logo-img').on('click', function(){
        setPopupEvent('popup-genstand', 'genstand-logo-img', 'popup-genstand-close');
    });
    $('#header-home-img').on('click', function(){
        setPopupEvent('popup-home', 'header-home-img', 'popup-home-close');
    });
    $('#disclaimer').on('click', function(){
        setPopupEvent('popup-disclaimer', 'disclaimer', 'disclaimer-close');
    });
    
    $('input[type=text]').keyup(function(){
        if ($(this).val() === '') {
            $('#next_button').attr('class', 'next-button-disabled');
        } else {
            isEmptyInputs();
        }
    });
    $('#female-test-img').on('click', function(){
        $("#Test_gender_f").trigger("click");
        isEmptyInputs();
    });

    $('#man-test-img').on('click', function(){
        $("#Test_gender_m").trigger("click");
        isEmptyInputs();
    });

    $('#Test_school').on('change', function(){
        isEmptyInputs();
    });

    $('#next_button_link').on('click', function(e){
        e.preventDefault();
        if ($(this).parent().parent().attr('class') == 'next-button'){
            $('#general-questions').hide();
            $('#test-questions').css('visibility', 'hidden');
            $('#test-questions').show();
            $('.slick-dots .slick-active button').click();
            setTimeout(function(){
                $('#test-questions').css('visibility', 'visible');
            }, 500);
            //$(window).trigger('resize');
        }
        return false;
    });
    
});



$(function() {

        var $document = $(document);
        var selector = '[data-rangeslider]';
        var $element = $(selector);

        // For ie8 support
        var textContent = ('textContent' in document) ? 'textContent' : 'innerText';

	$('#Test_age').on('change', function(){
		$('#js-example-change-value button').trigger('click');
	});

        // Example functionality to demonstrate programmatic value changes
        $document.on('change', '#Test_age', function(e) {
            var $inputRange = $(selector, e.target.parentNode);
            var value = $('input[type="text"]', e.target.parentNode)[0].value;

            $inputRange.val(value).change();
        });

        // Basic rangeslider initialization
        $element.rangeslider({

            // Deactivate the feature detection
            polyfill: false,

            // Callback function
            onSlide: function(position, value) {
		$('#Test_age').val(value);
            }
        });

});
    
function isEmptyInputs(){
    if (($('#Test_gender_f').is(':checked') || $('#Test_gender_m').is(':checked')) && $('#Test_age').val() !== '' && $('#Test_school').val() !== '') {
        $('#next_button').attr('class', 'next-button');
        $('#next_button_link').attr('class', 'next-button-link');
    } else {
        $('#next_button').attr('class', 'next-button-disabled');
        $('#next_button_link').attr('class', 'next-button-disabled-link');
    }
}

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

/*$('.rangeslider__handle').on('click', function(){
    alert('testing slider click');
});*/