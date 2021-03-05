<?php
/**
 * Created by PhpStorm.
 * User: chana
 * Date: 3/4/2021
 * Time: 10:12 PM
 */

use yii\helpers\Url;

$navItems = [
	[
		'label'  => 'Home',
		'url'    => [ 'site/index' ],
		'active' => ( Yii::$app->requestedRoute == 'site/index' ),
	],
	[
		'label'  => 'About',
		'url'    => [ 'site/about' ],
		'active' => ( Yii::$app->requestedRoute == 'site/about' ),
	],
	[
		'label'  => 'Resume',
		'url'    => [ 'site/resume' ],
		'active' => ( Yii::$app->requestedRoute == 'site/resume' ),
	],
	[
		'label'  => 'Services',
		'url'    => [ 'site/services' ],
		'active' => ( Yii::$app->requestedRoute == 'site/services' ),
	],
	[
		'label'  => 'Contribution',
		'url'    => [ 'site/contribution' ],
		'active' => ( Yii::$app->requestedRoute == 'site/contribution' ),
	],
	[
		'label'  => 'Blog',
		'url'    => [ 'blog/index' ],
		'active' => ( Yii::$app->controller->id == 'blog' ),
	],
];
?>

<nav id="navbar" class="navbar order-last order-lg-0">
	<ul>		<!-- Add icons to the links using the .nav-icon class
			 with font-awesome or any other icon font library -->
		<?php foreach ($navItems as $item): ?>
		<li>
			<a href="<?= Url::to($item['url']) ?>" class="<?= ($item['active'])? 'active' : ''?>">
				<?= $item['label']?>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>
	<i class="bi bi-list mobile-nav-toggle"></i>
</nav>