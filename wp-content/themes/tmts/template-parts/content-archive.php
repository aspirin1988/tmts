<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tmts
 */

?>
	<?php $currentCatPosts = get_posts(array(
		'posts_per_page'   => 6,
		'category' => 6,
	)); ?>
<ul id="just-switcher-panel">

	<?php foreach ( $currentCatPosts as $key => $value) : ?>
		<?php if($key != 0) :?>
			<li ><a href="<?=get_permalink($value->ID); ?>"><?=$value->post_title; ?></a></li>
		<?php endif; ?>
	<?php endforeach; ?>
</ul>

<!-- This is the container of the content items -->
<!-- This is the container of the content items -->
<section class="single-content"><?=$currentCatPosts[0]->post_content ?></section>



