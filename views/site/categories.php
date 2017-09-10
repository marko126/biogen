<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'DANSK MULTIPEL SCLEROSE Center';
?>
<div class="categories">
    <div class="row">
        <div class="category-subtitle col-lg-8">
            <?= Html::encode(strtoupper($this->title)) ?>
        </div>
        <div class="category-title col-lg-4">
            <div>
                <?= strtoupper($user->getFirstName()) ?>
            </div>
            <div>
                <?= strtoupper($user->getLastName()) ?>
            </div>
            
            <span>
                <?= strtoupper($user->getHospitalName()) ?>
            </span>
        </div>
    </div>
</div>
<div class="categories-container">
    <div class="slider">
        <?php
        foreach ($slides as $id => $slide) {
            echo $this->render('_'.$slide['category'].'_'.$slide['subcategory']);
        }
        ?>
    </div>
    <input type="hidden" id="page-number" value="0" />
    <input type="hidden" id="slide-number" value="0"/>
    <img src="<?= Yii::getAlias('@web') . '/images/categories/back.gif' ?>" class="back" style="display: none"/>
    <?= $this->render('menu') ?>
</div>
<?= $this->render('_popup_home') ?>
<?php
$this->registerJs("
    $(document).on('ready', function() {
        // get all categories from controller
        var categories = ".json_encode($categories).";
            
        // get all slides from controller
        var slides = ".json_encode($slides).";
        
        // get category subtitle when page is loaded
        $('.category-subtitle').html(categories[0]['subcategories'][1].toUpperCase());
        
        // animate menu
        $('.menu-text').click(function(){
            //$('#menu').slideToggle(1000);
            $('#menu').animate({
                width: 'toggle'
            });
        });
        
        // Events on category 1
        $('#popup-1-6-help').on('click', function(){
            setPopupEvent('popup-1-6', 'popup-1-6-help', 'popup-1-6-close');
        });

        $('#slide-1-2-toggler').on('click', function(){
            toggleNerves();
        });
        
        // Events on category 4
        $('.slide-4-1-item').each(function(i){
            this.style.height = $(this).width() * 0.716 + 'px';
        });
                    
        $('#popup-4-6-info').on('click', function(){
            setPopupEvent('popup-4-6', 'popup-4-6-info', 'popup-4-6-close');
        });
                    
        $('#popup-4-7-info').on('click', function(){
            setPopupEvent('popup-4-7', 'popup-4-7-info', 'popup-4-7-close');
        });
                    
        $('#left-top').on('click', function(){
            $('.slider').slick('slickUnfilter');
            $('.slider').slick('slickGoTo', 17, false);
        });
                    
        $('#right-top').on('click', function(){
            $('.slider').slick('slickUnfilter');
            $('.slider').slick('slickGoTo', 18, false);
        });
                    
        $('#left-bottom').on('click', function(){
            $('.slider').slick('slickUnfilter');
            $('.slider').slick('slickGoTo', 21, false);
        });
                    
        $('#right-bottom').on('click', function(){
            $('.slider').slick('slickUnfilter');
            $('.slider').slick('slickGoTo', 22, false);
        });
                    
        // Events on category 6
        $('#popup-6-4-help').on('click', function(){
            setPopupEvent('popup-6-4', 'popup-6-4-help', 'popup-6-4-close');
        });
                    
        $('#popup-6-5-help').on('click', function(){
            setPopupEvent('popup-6-5', 'popup-6-5-help', 'popup-6-5-close');
        });
        
        $('#slide-6-8-browse').on('click', function(){
            $('.slider').slick('slickUnfilter');
            $('.slider').slick('slickGoTo', 35, false);
        });
        
        $('#slide-6-9-back').on('click', function(){
            $('.slider').slick('slickGoTo', 34, false);
        });
        
        $('#popup-6-10-help').on('click', function(){
            setPopupEvent('popup-6-10', 'popup-6-10-help', 'popup-6-10-close');
        });
                    
        $('#popup-6-11-help').on('click', function(){
            setPopupEvent('popup-6-11', 'popup-6-11-help', 'popup-6-11-close');
        });
        
        $('#slide-6-11-browse').on('click', function(){
            $('.slider').slick('slickGoTo', 38, false);
        });
        
        $('#slide-6-12-back').on('click', function(){
            $('.slider').slick('slickGoTo', 37, false);
        });
        
        $('#popup-6-12-help').on('click', function(){
            setPopupEvent('popup-6-12', 'popup-6-12-help', 'popup-6-12-close');
        });
                    
        $('#popup-6-14-help').on('click', function(){
            setPopupEvent('popup-6-14', 'popup-6-14-help', 'popup-6-14-close');
        });
                    
        $('#popup-6-15-help').on('click', function(){
            setPopupEvent('popup-6-15', 'popup-6-15-help', 'popup-6-15-close');
        });
        
        $('#slide-6-16-browse').on('click', function(){
            $('.slider').slick('slickGoTo', 44, false);
        });
                    
        $('#slide-6-17-back').on('click', function(){
            $('.slider').slick('slickGoTo', 43, false);
        });
        
        $('#6-3-1-menu').on('click', function(){
            $('.slider').slick('slickGoTo', 31, false);
        });
                    
        $('#6-3-2-menu').on('click', function(){
            $('.slider').slick('slickGoTo', 32, false);
        });
                    
        $('#6-3-3-menu').on('click', function(){
            $('.slider').slick('slickGoTo', 33, false);
        });
                    
        $('#6-3-4-menu').on('click', function(){
            $('.slider').slick('slickGoTo', 38, false);
        });
                    
        $('#6-3-5-menu').on('click', function(){
            $('.slider').slick('slickGoTo', 40, false);
        });
                    
        $('#6-3-6-menu').on('click', function(){
            $('.slider').slick('slickGoTo', 43, false);
        });
        
        // on slide change
        $('.slider').on('afterChange', function (event, slick, currentSlide) {
        
            $('#slide-number').val(currentSlide);
            
            // get category
            var category = categories[slides[currentSlide]['category']];
            $('#page-number').val(slides[currentSlide]['category']);
            
            // set category title and subtitle
            $('.category-title').html(category['title'].toUpperCase());
            $('.category-subtitle').html(slides[currentSlide]['title'].toUpperCase());
            
            if (currentSlide != 0) {
                // get popup home
                $('.category-title').on('click', function(){
                    setPopupEvent('popup-home', 'popup-home', 'popup-home-close');
                });
                
                $('.footer').show();
                $('.menu-text').show();
            } else {
                $('.footer').hide();
                $('.menu-text').hide();
            }

            if (currentSlide == 1) {
                reloadImg('#gif-1-1');
                $('.pull-left').attr('style', 'display: none');
            } else {
                $('.pull-left').removeAttr('style');
            }
            
            if (currentSlide == 3) {
                reloadImg('#gif-1-3');
            }
            
            if (currentSlide == 6) {
                reloadImg('#gif-1-6');
            }
            
            if ((currentSlide > 16 && currentSlide < 23) || (currentSlide > 30 && currentSlide < 44)) {
                $('.back').show();
                if (currentSlide > 16 && currentSlide < 23) {
                    $('.back').attr('onclick', \"$('.slider').slick('slickGoTo', 16, false);\");
                } else {
                    $('.back').attr('onclick', \"$('.slider').slick('slickGoTo', 30, false);\");
                }
            } else {
                $('.back').hide();
            }
            
            if (currentSlide == 22) {
                reloadImg('#gif-4-7');
            }
            
            if (currentSlide == 31) {
                reloadImg('#gif-6-4');
            }
            
            if (currentSlide == 33) {
                reloadImg('#gif-6-6');
            }
            
            if (currentSlide == 35) {
                reloadImg('#gif-6-8');
                
            }
            
            if (currentSlide == 48) {
                $('.pull-right').attr('style', 'display: none');
            } else {
                $('.pull-right').removeAttr('style');
            }
            
        });
        
        
    });
    
    function reloadImg (id) {
        var img_src = $(id).attr('src');
        $(id).attr('src',img_src);
    }
");
