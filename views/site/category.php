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
            echo $this->render('_'.$id.'_'.$key, [
                
            ]);
            $this->registerJs("
                $(document).on('ready', function() {
                    $('.slider').on('afterChange', function (event, slick, currentSlide) {
                        if (currentSlide == ".($key - 1).") {
                            $('.category-subtitle').html('".strtoupper($subcategory)."');
                        }
                        if (currentSlide == 0) {
                            var img_src = $('.slide-1-1').children('.slide-part-right').children('img').attr('src');
                            $('.slide-1-1').children('.slide-part-right').children('img').attr('src',img_src);
                        }
                        if (currentSlide == 5) {
                            var img_src = $('.slide-1-6').children('.slide-part-right').find('img:first').attr('src');
                            $('.slide-1-6').children('.slide-part-right').find('img:first').attr('src',img_src);
                        }
                    });
                });
            ");
        }
    ?>
    </div>
</div>
<?= $this->render('_1_6_popup'); ?>
<?php

$this->registerJs("
    $(document).on('ready', function() {
        $('#popup-1-6-info').on('click', function(){
            setPopupEvent('popup-1-6', 'popup-1-6-info', 'popup-1-6-close');
        });
    });
");

?>