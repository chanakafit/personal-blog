<?php

use kartik\markdown\Markdown;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */

$this->title                   = $model->title;
$this->params['breadcrumbs'][] = [ 'label' => Yii::t( 'app', 'Blogs' ), 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register( $this );
?>
<main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2><?= $this->title ?></h2>
            </div>
            <p>
				<?= Html::a( Yii::t( 'app', 'Update' ), [
					'update',
					'id' => $model->id
				], [ 'class' => 'btn btn-primary' ] ) ?>
				<?= Html::a( Yii::t( 'app', 'Delete' ), [ 'delete', 'id' => $model->id ], [
					'class' => 'btn btn-danger',
					'data'  => [
						'confirm' => Yii::t( 'app', 'Are you sure you want to delete this item?' ),
						'method'  => 'post',
					],
				] ) ?>
            </p>

            <p><?= Markdown::convert($model->content)?></p>
        </div>
    </section>
</main>

