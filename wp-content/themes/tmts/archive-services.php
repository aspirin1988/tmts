<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tmts
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php


		if ( have_posts() ) : ?>


			<?php $paneThumb =   wp_get_attachment_url( get_post_thumbnail_id(11));?>
			<?php $currentCategory = get_the_category(); ?>

			<!--ul class="uk-slideshow imgBg-nav uk-overlay-active" data-uk-slideshow="{kenburns:true}">
				<li>
					<img src="<?=$paneThumb; ?>" alt="">
					<div class="uk-overlay-panel uk-overlay-background uk-overlay-slide-top">
						<div class="uk-container uk-container-center">
							<div class="uk-grid">
								<article class="uk-width-1-1 uk-width-medium-1-1 uk-width-large-1-1">
									<p><img src="<?php the_field('icon'); ?>" alt=""></p>
									<?php the_field('main-img-text')?>
								</article>
							</div>
						</div>
					</div>
				</li>
			</ul-->

			<!-- Between text -->
			<section class="between-text">
				<div class="uk-container uk-container-center">
					<h2><?=category_description();?></h2>
				</div>
			</section><!-- Between text end -->

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

		  	<!-- Main content -->
			<section class="content page-404" style="margin-top: 5%;">
				<div class="uk-container uk-container-center">
					<section class="content-inner uk-grid">
						<?php get_sidebar(); ?>

						<article class="home-advertise uk-width-medium-2-3 uk-width-large-2-3">
							<!-- Breadcrumbs -->
							<ul class="breadcrumb uk-list">
								<li><a href="/">Главная</a></li>
								<?php if(!is_home()) : ?>
									<?php if(is_category()) :?>
										<li class="uk-active"><a href="/category/<?=$currentCategory[0]->slug; ?>"><?=$currentCategory[0]->name;?></a></li>
									<?php endif; ?>
								<?php endif ;?>
							</ul><!-- Breadcrumbs end -->

							<section class="the-posts">
								<h3><?=$currentCategory[0]->name;?></h3>
								<?php get_template_part( 'template-parts/content-archive', get_post_format() ); ?>
							</section>

						</article>
					</section>
				</div>
			</section><!-- Main content end -->

			<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
