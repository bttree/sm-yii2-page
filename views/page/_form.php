<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use bttree\smypage\models\PageCategory;
use bttree\smypage\models\Page;
use bttree\smywidgets\widgets\SlugWidget;

/* @var $this yii\web\View */
/* @var $model bttree\smypage\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->widget(SlugWidget::className(),
                                             [
                                                 'sourceFieldSelector' => '#page-name',
                                                 'url'                 => ['page/get-model-slug'],
                                                 'options' => ['class' => 'form-control']
                                             ]); ?>

    <?php if (!empty($model->image)): ?>
        <div class="form-group congcards-box text-center">
            <?= Html::img($model->getImageUrl(300, 300),
                          ['class' => 'img-thumbnail congcards-pic', 'alt' => $model->name]) ?>
        </div>
    <?php endif; ?>
    <?= $form->field($model, 'image')
             ->fileInput(['accept' => 'image/*']) ?>

    <?= $form->field($model, 'category_id')->dropDownList(PageCategory::getAllArrayForSelect(), ['prompt'=>'---']) ?>

    <?= $form->field($model, 'status')->dropDownList(Page::getStatusArray()) ?>

    <?= $form->field($model, 'type')->dropDownList(Page::getTypeArray()) ?>

    <?= $form->field($model, 'short_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'full_description')->widget(Widget::className(),
                                                         [
                                                             'settings' => [
                                                                 'lang' => 'ru',
                                                                 'minHeight' => 200,
                                                                 'plugins' => [
                                                                     'clips',
                                                                     'fullscreen'
                                                                 ]
                                                             ]
                                                         ]);
    ?>

    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seo_keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seo_description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('smy.page', 'Create') : Yii::t('smy.page', 'Update'),
                               ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
