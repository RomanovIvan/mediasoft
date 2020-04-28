<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';

?>
    <div class="col-lg-6">
        <div class="site-register">
        <h1>Авторизация</h1>


        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model_login, 'login')->textInput() ?>

            <?= $form->field($model_login, 'password')->passwordInput() ?>
    </div>

    <?= Html::submitButton('Авторизоваться', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
       

    <?php ActiveForm::end(); ?>
</div>
