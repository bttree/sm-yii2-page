<?php
/* @var $this \yii\web\View */
/* @var $pages \bttree\smypage\models\Page[] */
/* @var $category \bttree\smypage\models\PageCategory */

?>

<section id='<?= isset($category) ? "slider-". $category->id : uniqid('slider-', true) ?>' class="sliderTwo">
    <div class="container">
        <div class="row sliderTwo__head">
            <div class="col-xs-8 col-xl-6">
                <h2 class="sliderTwo__header">
                    <?= isset($category) ?  $category->name : '' ?>
                </h2>
            </div>
            <div class="col-xs-4 col-xl-6 text-xs-right">
                <div class="sliderTwo__arrows">
                    <a href="#" class="sliderTwo__arrow sliderTwo__arrow-prev"></a>
                    <a href="#" class="sliderTwo__arrow sliderTwo__arrow-next"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="sliderTwo__items">
                <?php foreach ($pages as $page): ?>
                    <div class="sliderTwo__item">
                        <div class="sliderTwo__item-grey">
                            <div class="sliderTwo__item__head">
                                <img src=" <?= $page->getImageUrl() ?>" alt="" class="sliderTwo__item__img">
                                <p class="sliderTwo__item__name">
                                    <?= $page->name ?>
                                </p>
                            </div>
                            <p class="sliderTwo__item__text sliderTwo__item__text-big">
                                <?= $page->short_description ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>