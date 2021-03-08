<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title                   = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<main id="main">
    <section id="resume" class="resume">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Login</h2>
            </div>

            <div class="row">
	            <?php $form = ActiveForm::begin([
		            'id' => 'login-form',
		            'layout' => 'horizontal',
		            'fieldConfig' => [
			            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
			            'labelOptions' => ['class' => 'col-lg-1 control-label'],
		            ],
	            ]); ?>

	            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

	            <?= $form->field($model, 'password')->passwordInput() ?>

	            <?= $form->field($model, 'rememberMe')->checkbox([
		            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
	            ]) ?>

                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
			            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>

	            <?php ActiveForm::end(); ?>

                <p class="mb-1">
		            <?= Html::a('I forgot my password', ['site/request-password-reset']) ?>
                </p>
            </div>
        </div>
    </section>
</main>