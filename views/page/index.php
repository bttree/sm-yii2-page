<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel bttree\smypage\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('smy.page', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('smy.page', 'Create Page'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
                                                        'dataProvider' => $dataProvider,
                                                        'filterModel' => $searchModel,
                                                        'columns' => [
                                                            ['class' => 'yii\grid\SerialColumn'],

                                                            'id',
                                                            'name',
                                                            'slug',
                                                            'category_id',
                                                            'status',
                                                            'type',
                                                            // 'short_description:ntext',
                                                            // 'full_description:ntext',
                                                            // 'create_time',
                                                            // 'update_time',
                                                            // 'seo_title',
                                                            // 'seo_keywords:ntext',
                                                            // 'seo_description:ntext',

                                                            ['class' => 'yii\grid\ActionColumn'],
                                                        ],
                                                    ]); ?>
    <?php Pjax::end(); ?>
</div>