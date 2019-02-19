<?php

use yii\helpers\Html;
use yii\grid\GridView;
use limion\jqueryfileupload\JQueryFileUpload;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'text:ntext',
            'status',
//            'user.login'
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


<!--    --><?php //$form = ActiveForm::begin(); ?>
<!--    --><?//= JQueryFileUpload::widget([
//        'model' => $model,
//        'attribute' => 'img',
//        'url' => ['upload', 'someparam' => 'somevalue'], // your route for saving images,
//        'appearance'=>'ui', // available values: 'ui','plus' or 'basic'
//        'gallery'=>true, // whether to use the Bluimp Gallery on the images or not
//        'formId'=>$form->id,
//        'options' => [
//            'accept' => 'image/*'
//        ],
//        'clientOptions' => [
//            'maxFileSize' => 2000000,
//            'dataType' => 'json',
//            'acceptFileTypes'=>new yii\web\JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
//            'autoUpload'=>false
//        ]
//    ]);?>
<!--    --><?php //ActiveForm::end(); ?>
</div>
