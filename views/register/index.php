<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';

if(Yii::$app->session->hasFlash('success'))
?>
    <div class="col-lg-6">
        <div class="site-register">
        <h1>Регистрация</h1>


        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'fio')->textInput() ?>

            <?= $form->field($model, 'login')->textInput() ?>

            <?= $form->field($model, 'email')->Input('email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'chg_password')->passwordInput()->label("Повторите пароль") ?>
    </div>

    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
       

    <?php ActiveForm::end(); ?>
</div>
