<?php

use app\Models\Works;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\Models\WorksSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Works';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="works-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Works', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            'name',
            'link',
            [
               'attribute' => 'thumb',
               'format' => 'html',
               'value' => function($data) {
                    return Html::img(Yii::getAlias('@web').'/uploads/thumb/'. $data['thumb'],
                    ['width' => '70px']);
               }
            ],
            [
                    'attribute' => 'image',
                    'format' => 'html',
                    'value' => function($data) {
                        return Html::img(Yii::getAlias('@web'). '/uploads/'. $data['image'],
                        ['width' => '70px']);
                    }
],
            //'thumb',
            //'image',
            //'description:ntext',
            //'content:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Works $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
