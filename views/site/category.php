<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $category['title'];
?>
<div class="categories">
    <div class="row">
        <div class="category-subtitle col-lg-8">
            <?= Html::encode(strtoupper($category['subcategories'][1])) ?>
        </div>
        <div class="category-title col-lg-4">
            <?= strtoupper($this->title) ?>
        </div>
    </div>
</div>
<div class="categories-container">
    <div class="slider">
    <?php 
        foreach ($category['subcategories'] as $key => $subcategory) {
            echo $this->render('_'.$id.'_'.$key);
        }
        $script = '';
        if ($id == 1) {
            $script = "
                    $('#popup-1-6-help').on('click', function(){
                        setPopupEvent('popup-1-6', 'popup-1-6-help', 'popup-1-6-close');
                    });

                    $('#slide-1-2-toggler').on('click', function(){
                        toggleNerves();
                    });
            ";
        }
        if ($id == 4) {
            $script = "
                    $('.slide-4-1-item').each(function(i){
                        this.style.height = $(this).width() * 0.716 + 'px';
                    });
                    
                    $('#popup-4-6-info').on('click', function(){
                        setPopupEvent('popup-4-6', 'popup-4-6-info', 'popup-4-6-close');
                    });
                    
                    $('#left-top').on('click', function(){
                        $('.slider').slick('slickGoTo',1, true);
                    });
                    
                    $('#right-top').on('click', function(){
                        $('.slider').slick('slickGoTo',2, true);
                    });
                    
                    $('#left-bottom').on('click', function(){
                        $('.slider').slick('slickGoTo',5, true);
                    });
                    
                    $('#right-bottom').on('click', function(){
                        $('.slider').slick('slickGoTo',6, true);
                    });
            ";
        }
         if ($id == 6) {
            $script = "
                    $('#popup-6-4-help').on('click', function(){
                        setPopupEvent('popup-6-4', 'popup-6-4-help', 'popup-6-4-close');
                    });
                    
                    $('#popup-6-5-help').on('click', function(){
                        setPopupEvent('popup-6-5', 'popup-6-5-help', 'popup-6-5-close');
                    });
                    
                    $('#slide-6-8-browse').on('click', function(){
                        $('.slider').slick('slickGoTo',8, true);
                    });
                    
                    $('#slide-6-9-back').on('click', function(){
                        $('.slider').slick('slickGoTo',7, true);
                    });
                    
                    $('#popup-6-10-help').on('click', function(){
                        setPopupEvent('popup-6-10', 'popup-6-10-help', 'popup-6-10-close');
                    });
                    
                    $('#popup-6-11-help').on('click', function(){
                        setPopupEvent('popup-6-11', 'popup-6-11-help', 'popup-6-11-close');
                    });
                    
                    $('#slide-6-11-browse').on('click', function(){
                        $('.slider').slick('slickGoTo',11, true);
                    });
                    
                    $('#slide-6-12-back').on('click', function(){
                        $('.slider').slick('slickGoTo',10, true);
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
                        $('.slider').slick('slickGoTo',16, true);
                    });
                    
                    $('#slide-6-17-back').on('click', function(){
                        $('.slider').slick('slickGoTo',15, true);
                    });
                    
                    $('#6-3-1-menu').on('click', function(){
                        $('.slider').slick('slickGoTo',3, true);
                    });
                    
                    $('#6-3-2-menu').on('click', function(){
                        $('.slider').slick('slickGoTo',4, true);
                    });
                    
                    $('#6-3-3-menu').on('click', function(){
                        $('.slider').slick('slickGoTo',5, true);
                    });
                    
                    $('#6-3-4-menu').on('click', function(){
                        $('.slider').slick('slickGoTo',10, true);
                    });
                    
                    $('#6-3-5-menu').on('click', function(){
                        $('.slider').slick('slickGoTo',12, true);
                    });
                    
                    $('#6-3-6-menu').on('click', function(){
                        $('.slider').slick('slickGoTo',15, true);
                    });
            ";
        }
        $this->registerJs("
                $(document).on('ready', function() {
                    var slideToGo = '".$slide."';
                    var categories = ".json_encode($category['subcategories']).";
                    $('.category-subtitle').html(categories[1].toUpperCase());
                    if (slideToGo == 'last') {
                        $('.slider').slick('slickGoTo', ".max(array_keys($category['subcategories']))."-1, true);
                        $('.pull-right').attr('onclick', \"redirect('".\yii\helpers\Url::to(['site/category', 'id' => $id+1])."')\");
                    } else {
                        if (1 == ".$id.") {
                            $('.pull-left').attr('style', 'display: none');
                        } else {
                            $('.pull-left').removeAttr('style');
                        }
                        $('.pull-left').attr('onclick', \"redirect('".\yii\helpers\Url::to(['site/category', 'id' => $id-1, 'slide' => 'last'])."')\");
                    }
                    if (9 == ".$id.") {
                        $('.pull-right').attr('style', 'display: none');
                    } else {
                        $('.pull-right').removeAttr('style');
                    }
                    $('.slider').on('afterChange', function (event, slick, currentSlide) {
                        $('#slide-number').val(currentSlide);
                        var categories = ".json_encode($category['subcategories']).";
                        var lastSlide = ".max(array_keys($category['subcategories']))."-1;
                        var key = currentSlide+1;
                        $('.category-subtitle').html(categories[key].toUpperCase());
                        if (1 == ".$id." && currentSlide == 0) {
                            var img_src = $('#gif-1-1').attr('src');
                            $('#gif-1-1').attr('src',img_src);
                            $('.pull-left').attr('style', 'display: none');
                        } else {
                            $('.pull-left').removeAttr('style');
                        }
                        if (1 == ".$id." && currentSlide == 5) {
                            var img_src = $('#gif-1-6').attr('src');
                            $('#gif-1-6').attr('src',img_src);
                        }
                        if (currentSlide == lastSlide || (6 == ".$id." && currentSlide == lastSlide - 1)) {
                            $('.pull-right').attr('onclick', \"redirect('".\yii\helpers\Url::to(['site/category', 'id' => $id+1])."')\");
                        } else {
                            $('.pull-right').removeAttr('onclick');
                        }
                        if (1 != ".$id." && currentSlide == 0) {
                            $('.pull-left').attr('onclick', \"redirect('".\yii\helpers\Url::to(['site/category', 'id' => $id-1, 'slide' => 'last'])."')\");
                        }
                        if (currentSlide != 0) {
                            
                            $('.pull-left').removeAttr('onclick');
                        }
                        if (4 == ".$id.") {
                            if (currentSlide == 0) {
                                $('.back').hide();
                            }
                            if (currentSlide == 6) {
                                var img_src = $('#gif-4-7').attr('src');
                                $('#gif-4-7').attr('src',img_src);
                            }
                            if (currentSlide == 7) {
                                $('.back').hide();
                            }
                            if (currentSlide > 0 && currentSlide < 7) {
                                $('.back').show();
                                $('.back').attr('onclick', \"$('.slider').slick('slickGoTo',0, true);\");
                            }
                        }
                        if (6 == ".$id.") {
                            if (currentSlide < 3) {
                                $('.back').hide();
                            } else {
                                $('.back').show();
                                $('.back').attr('onclick', \"$('.slider').slick('slickGoTo',2, true);\");
                            }
                            
                            if (currentSlide == 2) {
                                
                            }
                            
                            if (currentSlide == 3) {
                                var img_src = $('#gif-6-4').attr('src');
                                $('#gif-6-4').attr('src',img_src);
                            }
                            
                            if (currentSlide == 5) {
                                var img_src = $('#gif-6-6').attr('src');
                                $('#gif-6-6').attr('src',img_src);
                            }
                            
                            if (currentSlide == 7) {
                                var img_src = $('#gif-6-8').attr('src');
                                $('#gif-6-8').attr('src',img_src);
                            }
                        }
                    });
                    ".$script."   
                });
        ");
    ?>
    </div>
    <input type="hidden" id="page-number" value="<?= $id ?>" />
    <input type="hidden" id="slide-number" value="0"/>
    <?php if($id == 4 || $id == 6): ?>
    <img src="<?= Yii::getAlias('@web') . '/images/categories/back.gif' ?>" class="back"/>
    <?php endif; ?>
</div>
<?php 
if ($id == 1) {
    echo $this->render('_1_6_popup'); 
}
if ($id == 4) {
    echo $this->render('_4_6_popup'); 
}
if ($id == 6) {
    echo $this->render('_6_4_popup'); 
    echo $this->render('_6_5_popup'); 
    echo $this->render('_6_10_popup'); 
    echo $this->render('_6_11_popup');
    echo $this->render('_6_12_popup');
    echo $this->render('_6_14_popup');
    echo $this->render('_6_15_popup');
}

?>
