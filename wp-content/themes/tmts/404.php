<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package tmts
 */

get_header(); ?>
<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tmts
 */

?>
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
	<section class="page-404 content">
		<div class="uk-container uk-container-center">
			<section class="content-inner uk-grid">
				<?php get_sidebar(); ?>

				<article class="home-advertise uk-width-medium-2-3 uk-width-large-2-3">
					<section class="news-widget">
						<h4 class="new-widget-title">Ошибка 404</h4>
						<div class="page-block uk-block uk-text-center">
							<h4>Страница не найдена</h4>
							<p>Вы перешли по неправильной ссылке
								или страница была удалена</p>
						</div>
					</section>
				</article>
			</section>
		</div>
	</section><!-- Main content end -->
	<br>

<?php
get_footer();
