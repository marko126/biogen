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
        }
    ?>
    </div>
</div>
