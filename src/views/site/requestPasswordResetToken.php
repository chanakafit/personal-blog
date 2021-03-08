<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \app\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title                   = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>

<main id="main">
    <section id="resume" class="resume">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2><?= $this->title ?></h2>
            </div>

            <div class="row">
                <p class="login-box-msg">You forgot your password? Here you can easily reset your password.</p>
				<?php $form = ActiveForm::begin( [
					'id'          => 'request-password-reset-form',
					'layout'      => 'horizontal',
					'fieldConfig' => [
						'template'     => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
						'labelOptions' => [ 'class' => 'col-lg-1 control-label' ],
					],
				] ); ?>

				<?= $form->field( $model, 'email' )->textInput( [ 'autofocus' => true ] ) ?>

                <div class="row">
                    <div class="col-12">
						<?= Html::submitButton( 'Request new password', [ 'class' => 'btn btn-primary btn-block' ] ) ?>
                    </div>
                </div>

				<?php ActiveForm::end(); ?>
                <p class="mt-3 mb-1">
					<?= Html::a( 'Back to Login', Url::toRoute( [ 'site/login' ] ) ) ?>
                </p>
            </div>
        </div>
    </section>
</main>
