<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'Take new order';
?>
<div class="site-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--    <p>-->
    <!--        --><? //= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>
    <!--    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'text:ntext',
//            Html::a('Take Order', ['taken'], ['class' => 'btn btn-success']),

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} '
            ]
        ],
    ]); ?>
</div>
