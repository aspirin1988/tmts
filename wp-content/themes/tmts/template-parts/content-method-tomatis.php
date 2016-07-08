<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tmts
 */

?>
<?php $paneThumb =   wp_get_attachment_url( get_post_thumbnail_id(get_post( $post )->ID));?>

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


<?php if (get_field('line-text')) : ?>
    <!-- Between text -->
    <section class="between-text">
        <div class="uk-container uk-container-center">
            <h2><?php the_field('line-text')?></h2>
        </div>
    </section><!-- Between text end -->
<?php endif; ?>

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
                        <li class="uk-active"><a href="<?php the_permalink() ?>"><?php the_title();?></a></li>
                    <?php endif ;?>
                </ul><!-- Breadcrumbs end -->

                <section class="news-widget">
                    <h4 class="new-widget-title"><?php the_title();?></h4>
                    <div class="page-block uk-block"><?php the_content(); ?></div>
                </section>
            </article>
        </section>
    </div>
</section><!-- Main content end -->
<br>


