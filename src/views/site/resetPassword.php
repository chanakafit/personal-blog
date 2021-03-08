<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<main id="main">
    <section id="resume" class="resume">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2><?= $this->title ?></h2>
            </div>

            <div class="row">
                <p class="login-box-msg">Please choose your new password:</p>
	            <?php $form = ActiveForm::begin([
	                    'id' => 'reset-password-form',
	                    'layout'      => 'horizontal',
	                    'fieldConfig' => [
		                    'template'     => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
		                    'labelOptions' => [ 'class' => 'col-lg-1 control-label' ],
	                    ],
                ]); ?>

	            <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="row">
                    <div class="col-12">
			            <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>

	            <?php ActiveForm::end(); ?>
                <p class="mt-3 mb-1">
		            <?= Html::a('Back to Login', Url::toRoute(['site/login']))?>
                </p>
            </div>
        </div>
    </section>
</main>
