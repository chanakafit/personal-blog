<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::$app->name.' | Home';
?>

<section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
        <h1>Chanaka Karunrathne</h1>
        <h2>PHP Enthusiast | Software Engineer | Freelancer</h2>
        <?= Html::a('About Me',['about'],['class' => 'btn-about'])?>
    </div>
</section><!-- End Hero -->
