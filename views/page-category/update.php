<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model koma136\smypage\models\PageCategory */

$this->title = Yii::t('smy.page', 'Update {modelClass}: ', [
    'modelClass' => 'Page Category',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('smy.page', 'Page Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('smy.page', 'Update');
?>
<div class="page-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
