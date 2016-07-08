<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tmts
 */
include_once ('gallery.php');
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php wp_head(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bower_components/uikit/css/uikit.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bower_components/uikit/css/components/slidenav.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bower_components/uikit/css/components/slideshow.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/public/css/app.css">
</head>
<body>
<!-- Header -->
<header>

	<!-- Header top section -->
	<section class="header-top">
		<div class="uk-container uk-container-center">
			<div class="uk-grid">
				<a href="/" class="uk-hidden-small uk-width-medium-1-6 uk-width-large-1-6"><img src="<?php the_field('logo', 5)?>" alt="" class="logo"></a>
				<h1 class="uk-hidden-small uk-width-medium-5-6 uk-width-large-5-6"><i><img style="height: 35px; width: auto;" src="<?php the_field('header-main-text', 5)?>" alt=""></i></h1>
			</div>
		</div>

		<!-- Small Device navigation top bar -->
		<nav class="header-top-bar-menu main-navigation uk-navbar uk-visible-small">
			<a href="#mobile-nav" class="uk-navbar-toggle uk-hidden-large" data-uk-offcanvas></a>
			<a href="#" class="uk-navbar-brand uk-navbar-center uk-hidden-large">zhanuya.kz</a>
		</nav><!-- Small Device navigation top bar end -->

	</section><!-- Header top section end -->

	<!-- Header bottom section -->
	<section class="header-info uk-hidden-small">
		<div class="uk-container uk-container-center">
			<div class="uk-clearfix">
				<ul class="header-info-ul uk-align-right">
					<!--li class="uk-visible-large"><a href="#callback" class="uk-button uk-button-primary" data-uk-modal>Перезвоните нам!</a></li -->
					<li><i class="uk-icon-map-marker"></i><p><?php the_field('address', 5)?></p></li>
					<li>
						<i class="uk-icon-phone"></i>
						<p><p><?php the_field('phone-1', 5)?></p></p><br>
						<p><p><?php the_field('phone-2', 5)?></p></p>
					</li>
					<li><i class="uk-icon-envelope-o"></i><p><p><?php the_field('email', 5)?></p></p></li>
				</ul>
			</div>
		</div>
	</section><!-- Header bottom section end -->
</header><!-- Header end -->

<!-- Mobile Navigation -->
<div id="mobile-nav" class="uk-offcanvas">
	<div class="uk-offcanvas-bar">
		<?php wp_nav_menu(array(
			'menu' => 'primary',
			'menu_class' => 'uk-nav uk-nav-offcanvas',
			'container' => false,
		)); ?>
	</div>
</div><!-- Mobile Navigation end -->
