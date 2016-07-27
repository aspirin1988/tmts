<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tmts
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<!-- Sidebar -->
<article class="home-advertise-side uk-width-medium-1-3 uk-width-large-1-3">
	<!-- Navigation -->
	<?php wp_nav_menu(array(
		'menu' => 'primary',
		'menu_class' => 'main-navigation uk-list uk-hidden-small',
		'container' => false,
	)); ?>
	<!-- Navigation end -->

	<?php $advertisingItems =  get_posts( array( 'order' => 'ASC', 'posts_per_page' => 4, 'category_name'=> 'advertising' ) ); ?>
	<?php foreach($advertisingItems as $key => $value) :?>
		<?php $advertiseImg = wp_get_attachment_url( get_post_thumbnail_id($value->ID) ); ?>
		<!-- Advertise article -->
		<article class="uk-article">
			<a href="<?=get_permalink($value->ID); ?>"><h1 class="uk-article-title"><?=$value->post_title; ?></h1></a>
			<div class="article-content-inner uk-clearfix">
				<a href="<?=get_permalink($value->ID); ?>"><img src="<?=$advertiseImg; ?>" alt="" class="uk-hidden-small"></a>
				<div><?=$value->post_excerpt; ?></div>
			</div>
		</article><!-- Advertise article end -->
	<?php endforeach ;?>

</article><!-- Sidebar end -->

