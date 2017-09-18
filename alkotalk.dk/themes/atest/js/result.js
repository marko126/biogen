$('#header-logo-img').on('click', function(){
	setPopupEvent('popup-info', 'header-logo-img', 'popup-info-close');
});

$('#genstand-result-logo-img').on('click', function(){
	setPopupEvent('popup-genstand', 'genstand-result-logo-img', 'popup-genstand-close');
});

$('#header-home-img').on('click', function(){
	setPopupEvent('popup-home', 'header-home-img', 'popup-home-close');
});
    
$('#next_button_link_result').on('click', function(e){
    e.preventDefault();
    $('#result-container').hide();
    $('#result-comparison').show();
    $('#header-title').text('PENGE, KILO & TRÆNING');
    $(window).trigger('resize');
});

$('#next_button_link_comparison').on('click', function(e){
    e.preventDefault();
    $('#result-comparison').hide();
    $('#result-tips').show();
    $('#header-title').text('gode råd');
    $(window).trigger('resize');
});

$(document).on('ready', function() {
    if (screen.width > 767 && parseFloat($('#result-score-text').html()) > 9) {
        $('.next-button-penge').attr('style', 'margin-bottom: 6vw; margin-top:-11vw');
    }
});

$('#ja-answer').on('click', function(){
    $('#Answer11').trigger('click');
});

$('#nej-answer').on('click', function(){
    $('#Answer12').trigger('click');
});