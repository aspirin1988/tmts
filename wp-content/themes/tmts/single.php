<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package tmts
 */

get_header(); ?>
<?php $paneThumb = wp_get_attachment_url( get_post_thumbnail_id(258));?>

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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
