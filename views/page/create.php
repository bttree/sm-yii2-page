<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model bttree\smypage\models\Page */

$this->title = Yii::t('smy.page', 'Create Page');
$this->params['breadcrumbs'][] = ['label' => Yii::t('smy.page', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
