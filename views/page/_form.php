<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use koma136\smypage\models\PageCategory;
use koma136\smypage\models\Page;

/* @var $this yii\web\View */
/* @var $model koma136\smypage\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(PageCategory::getAllArrayForSelect(), ['prompt'=>'---']) ?>

    <?= $form->field($model, 'status')->dropDownList(Page::getStatusArray()) ?>

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
