<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
	    'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i',
	    'theme/assets/vendor/aos/aos.css',
	    'theme/assets/vendor/bootstrap/css/bootstrap.min.css',
	    'theme/assets/vendor/bootstrap-icons/bootstrap-icons.css',
	    'theme/assets/vendor/boxicons/css/boxicons.min.css',
	    'theme/assets/vendor/glightbox/css/glightbox.min.css',
	    'theme/assets/vendor/swiper/swiper-bundle.min.css',
	    'theme/assets/css/style.css',
    ];
    public $js = [
    	'theme/assets/vendor/aos/aos.js',
	    'theme/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
	    'theme/assets/vendor/glightbox/js/glightbox.min.js',
	    'theme/assets/vendor/isotope-layout/isotope.pkgd.min.js',
	    'theme/assets/vendor/php-email-form/validate.js',
	    'theme/assets/vendor/purecounter/purecounter.js',
	    'theme/assets/vendor/swiper/swiper-bundle.min.js',
	    'theme/assets/vendor/waypoints/noframework.waypoints.js',
	    'theme/assets/js/main.js'
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
