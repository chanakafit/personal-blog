<?php

use kartik\markdown\MarkdownEditor;
use mihaildev\ckeditor\CKEditor;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */
/* @var $form yii\bootstrap\ActiveForm */
?>


<?php $form = ActiveForm::begin( [
	'id'          => 'create-post',
	'layout'      => 'horizontal',
	'fieldConfig' => [
//		'template'     => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
		'template'     => "<div class=\"form-group row\">{label}<div class=\"col-sm-10\">{input}</div></div>\n<div class='col-lg-8' style='color: red'>{error}</div>",
		'labelOptions' => [ 'class' => 'col-lg-1 control-label' ],
	],
] ); ?>

<?= $form->field( $model, 'title' )->textInput( [
	'maxlength' => true,
] ) ?>

<?php if ( Yii::$app->params['editor'] == 'wysiwyg' ): ?>

	<?= $form->field( $model, 'content' )->widget( CKEditor:: class, [
		'editorOptions' => [
			'preset' => 'full',
			// standard settings developed basic, standard, full this feature is not required to use
			'inline' => false,
			// by default false
		],
	] ) ?>

<?php else: ?>

	<?= $form->field( $model, 'content' )->widget(
		MarkdownEditor::class,
		[ 'height' => 300, 'encodeLabels' => false ]
	) ?>

<?php endif; ?>

<?= $form->field( $model, 'slug' )->textInput( [ 'maxlength' => true ] ) ?>

<?= $form->field( $model, 'cover_image' )->textInput( [ 'maxlength' => true ] ) ?>

<?= $form->field( $model, 'category' )->textInput( [ 'maxlength' => true ] ) ?>

<?= $form->field( $model, 'tags' )->textInput( [ 'maxlength' => true ] ) ?>

<div class="form-group">
	<?= Html::submitButton( Yii::t( 'app', 'Save' ), [ 'class' => 'btn btn-success' ] ) ?>
</div>

<?php ActiveForm::end(); ?>
