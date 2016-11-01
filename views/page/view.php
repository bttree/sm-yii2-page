<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model koma136\smypage\models\Page */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('smy.page', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('smy.page', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('smy.page', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('smy.page', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'slug',
            'category_id',
            'status',
            'short_description:ntext',
            'full_description:ntext',
            'create_time',
            'update_time',
            'seo_title',
            'seo_keywords:ntext',
            'seo_description:ntext',
        ],
    ]) ?>

</div>
