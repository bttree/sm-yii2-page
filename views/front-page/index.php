<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel bttree\smypage\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('smy.page', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <?= ListView::widget([
                             'dataProvider' => $dataProvider,
                             'itemView'     => '_page_item'
                         ]); ?>
</div>