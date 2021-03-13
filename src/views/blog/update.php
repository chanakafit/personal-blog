<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */
/* @var $categories array */
/* @var $tags array */

$this->title = Yii::t('app', 'Update Post: {name}', [
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
		            'categories' => $categories,
		            'tags' => $tags,
	            ]) ?>

            </div>
        </div>
    </section>
</main>
