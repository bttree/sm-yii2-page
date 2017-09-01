<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ListView;

/* @var $this yii\web\View
 * @var $model  \bttree\smypage\models\Page, the data model
 * @var $key    mixed, the key value associated with the data item
 * @var $index  integer, the zero-based index of the data item in the items array returned by $dataProvider.
 * @var $widget ListView, this widget instance
 * */

$this->title                   = Yii::t('smy.page', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index-item">
    <a href="">
        <?= Html::encode($model->name) ?>
    </a>
</div>