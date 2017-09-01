<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bttree\smywidgets\widgets\TextEditorWidget;
use bttree\smypage\models\PageCategory;
use bttree\smypage\models\Page;
use bttree\smywidgets\widgets\SlugWidget;

/* @var $this yii\web\View */
/* @var $model bttree\smypage\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6"><?= $form->field($model, 'slug')->widget(SlugWidget::className(),
                                                                       [
                                                                           'sourceFieldSelector' => '#page-name',
                                                                           'url'                 => ['page/get-model-slug'],
                                                                           'options'             => ['class' => 'form-control']
                                                                       ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'status')->dropDownList(Page::getStatusArray()) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'category_id')
                     ->dropDownList(PageCategory::getAllArrayForSelect(), ['prompt' => '---']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'type')->dropDownList(Page::getTypeArray()) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'image')
                     ->fileInput(['accept' => 'image/*']) ?>
        </div>
        <div class="col-sm-6">
            <?php if (!empty($model->image)): ?>
                <div class="form-group congcards-box text-center">
                    <?= Html::img($model->getImageUrl(300, 300),
                                  ['class' => 'img-thumbnail congcards-pic', 'alt' => $model->name]) ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?= $form->field($model, 'short_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'full_description')->widget(TextEditorWidget::className(),
                                                         [
                                                             'editor'   => 'imperavi',
                                                             'settings' => [
                                                                 'lang'      => 'ru',
                                                                 'minHeight' => 200,
                                                             ]
                                                         ]);
    ?>

    <?= $form->field($model, 'tags')->widget(\bttree\smytag\widgets\TagWidget::className(),
                                             []);
    ?>

    <hr>

    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'seo_keywords')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'seo_description')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'layout')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'view')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('smy.page', 'Create') : Yii::t('smy.page', 'Update'),
                               ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
