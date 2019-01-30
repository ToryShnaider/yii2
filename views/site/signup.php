<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SignupForm */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Please fill out the following fields to signup:</p>
    <div class="row">
        <div class="col-lg-5">
    <?php $form = ActiveForm::begin(['id'=>'form-signup']); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'role')->dropDownList([
            'CUSTOMER'=>'Customer',
            'EXECUTOR'=>'Executor']
       )->label('Check your role.')?>


    <div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary','name'=>'sigup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
