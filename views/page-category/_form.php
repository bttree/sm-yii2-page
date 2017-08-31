<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bttree\smywidgets\widgets\TextEditorWidget;
use bttree\smypage\models\PageCategory;
use bttree\smywidgets\widgets\SlugWidget;

/* @var $this yii\web\View */
/* @var $model bttree\smypage\models\PageCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->widget(SlugWidget::className(),
                                             [
                                                 'sourceFieldSelector' => '#pagecategory-name',
                                                 'url'                 => ['page-category/get-model-slug'],
                                                 'options' => ['class' => 'form-control']
                                             ]); ?>

    <?= $form->field($model, 'parent_id')->dropDownList(PageCategory::getAllArrayForSelect($model->id), ['prompt'=>'---']) ?>

    <?= $form->field($model, 'status')->dropDownList(PageCategory::getStatusArray()) ?>

    <?= $form->field($model, 'description')->widget(TextEditorWidget::className(),
                                                    [
                                                        'editor'   => 'imperavi',
                                                        'settings' => [
                                                            'lang'      => 'ru',
                                                            'minHeight' => 200,
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
