<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model bttree\smypage\models\Page */

$this->title                   = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('smy.page', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">
    <h1>
        <?= Html::encode($model->name) ?>
    </h1>

    <?= $model->full_description ?>
</div>