<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model koma136\smypage\models\PageCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'description')->widget(Widget::className(),
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
