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
                    $('.slider').on('afterChange', function (event, slick, currentSlide) {
                        $('#slide-number').val(currentSlide);
                        var categories = ".json_encode($category['subcategories']).";
                        var lastSlide = ".max(array_keys($category['subcategories']))."-1;
                        var key = currentSlide+1;
                        $('.category-subtitle').html(categories[key].toUpperCase());
                        if (1 == ".$id." && currentSlide == 0) {
                            var img_src = $('.slide-1-1').children('.slide-part-right').children('img').attr('src');
                            $('.slide-1-1').children('.slide-part-right').children('img').attr('src',img_src);
                            $('.pull-left').attr('style', 'display: none');
                        } else {
                            $('.pull-left').removeAttr('style');
                        }
                        if (1 == ".$id." && currentSlide == 5) {
                            var img_src = $('.slide-1-6').children('.slide-part-right').find('img:first').attr('src');
                            $('.slide-1-6').children('.slide-part-right').find('img:first').attr('src',img_src);
                        }
                        if (currentSlide == lastSlide) {
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
                                var img_src = $('.slide-4-7').children('.slide-part-right').find('img:first').attr('src');
                                $('.slide-4-7').children('.slide-part-right').find('img:first').attr('src',img_src);
                            }
                            if (currentSlide == 7) {
                                $('.back').hide();
                            }
                            if (currentSlide > 0 && currentSlide < 7) {
                                $('.back').show();
                                $('.back').attr('onclick', \"console.log('radiiiiii');$('.slider').slick('slickGoTo',0, true);\");
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
    <?php if($id == 4): ?>
    <img src="<?= Yii::getAlias('@web') . '/images/categories/back.gif' ?>" class="back-to-4-1 back"/>
    <?php endif; ?>
</div>
<?php 
if ($id == 1) {
    echo $this->render('_1_6_popup'); 
}
if ($id == 4) {
    echo $this->render('_4_6_popup'); 
}

?>
