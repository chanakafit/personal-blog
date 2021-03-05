<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register( $this );
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode( $this->title ) ?></title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <h1 class="logo me-auto me-lg-0"><?= Html::a('Chanaka', ['index'])?></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

	    <?php include( '_navbar.php' ) ?>

        <div class="header-social-links">
<!--            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>-->
            <a href="https://facebook.com/chanaka.suranga" class="facebook" target="_blank" data-toggle="tooltip" title="Facebook"><i class="bi bi-facebook"></i></a>
<!--            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>-->
            <a href="https://linkedin.com/in/chanakalk" class="linkedin" target="_blank" data-toggle="tooltip" title="Linked In"><i class="bi bi-linkedin"></i></i></a>
            <a href="https://stackoverflow.com/users/4309588/chanaka-karunarathne" class="" target="_blank" data-toggle="tooltip" title="Stack Overflow"><i class="bi bi-stack"></i></i></a>
            <a href="https://www.freelancer.com/u/chanakasuranga91" class="" target="_blank" data-toggle="tooltip" title="Freelancer"><i class="bi bi-laptop-fill"></i></i></a>
        </div>

    </div>

</header><!-- End Header -->

<?= $content ?>
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Chanaka</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-html-template/ -->
            Design Credits <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End  Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
