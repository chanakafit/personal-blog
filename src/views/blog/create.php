<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */
/* @var $categories array */
/* @var $tags array */

$this->title                   = Yii::t( 'app', 'Create Blog' );
$this->params['breadcrumbs'][] = [ 'label' => Yii::t( 'app', 'Blog' ), 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<main id="main">
    <section id="resume" class="resume">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Create Post</h2>
            </div>

            <div class="row">
				<?= $this->render( '_form', [
					'model' => $model,
					'categories' => $categories,
					'tags' => $tags,
				] ) ?>

            </div>
        </div>
    </section>
</main>

