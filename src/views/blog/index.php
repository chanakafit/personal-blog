<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t( 'app', 'Blog' );
$this->params['breadcrumbs'][] = $this->title;
?>
<main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2><?= $this->title ?></h2>
                <p>
                    <?php if(!Yii::$app->user->isGuest): ?>
                    <?= Html::a( Yii::t( 'app', 'Create Post' ), [ 'create' ], [ 'class' => 'btn btn-success' ] ) ?>
                    <?php endif; ?>
                </p>
                <p>
		            <?php if($dataProvider->count == 0): ?>
			            Coming Soon...
		            <?php endif; ?>
                </p>
            </div>

        </div>
    </section><!-- End Portfolio Section -->

</main><!-- End #main -->
