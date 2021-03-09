<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */

$this->title = Yii::t('app', 'Update Blog: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<main id="main">
    <section id="resume" class="resume">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2><?= Html::encode($this->title) ?></h2>
            </div>

            <div class="row">
	            <?= $this->render('_form', [
		            'model' => $model,
	            ]) ?>

            </div>
        </div>
    </section>
</main>
