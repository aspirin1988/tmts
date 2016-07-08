<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tmts
 */

?>
<?php $galleryImages = get_gall('slider gallery'); ?>

<div class="uk-slidenav-position" data-uk-slideshow="{autoplay:true}">
    <ul class="uk-slideshow imgBg-nav uk-overlay-active">
        <?php foreach(array_reverse($galleryImages) as $key => $val) : ?>
            <?php if($key == 1) : ?>
                <li>
                    <img src="<?=$val['path']; ?>" width="" height="" alt="">
                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-fade">
                        <div class="uk-container uk-container-center">
                            <div class="uk-grid">
                                <article class="article-left uk-width-1-1 uk-width-medium-1-1 uk-width-large-1-1">
                                    <?=$val['caption1'];?>
                                </article>
                            </div>
                        </div>
                    </div>
                </li>
            <?php else : ?>
                <li>
                    <img src="<?=$val['path']; ?>" width="" height="" alt="">
                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-fade">
                        <div class="uk-container uk-container-center">
                            <div class="uk-grid">
                                <article class="uk-width-1-1 uk-width-medium-1-1 uk-width-large-1-1">
                                    <p><img src="<?php the_field('icon'); ?>" alt=""></p>
                                    <?=$val['caption1'];?>
                                </article>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
</div>


<?php if (get_field('line-text')) : ?>
<!-- Between text -->
<section class="between-text">
    <div class="uk-container uk-container-center">
        <h2><?php the_field('line-text')?></h2>
    </div>
</section><!-- Between text end -->
<?php endif; ?>

<!-- Main content -->
<section class="content">
    <div class="uk-container uk-container-center">
        <section class="content-inner uk-grid">
            <?php get_sidebar(); ?>

            <article class="home-advertise uk-width-medium-2-3 uk-width-large-2-3">

                <!-- Breadcrumbs -->
                <ul class="breadcrumb uk-list">
                    <li><a href="/">Главная</a></li>
                </ul><!-- Breadcrumbs end -->

                <!-- Our offers -->
                <div class="services-block uk-panel uk-panel-box">
                    <?php $ppImages =  pp_gallery_get(359); $homePageCur = get_post(359); ?>
                    <div>
                        <?=$homePageCur->post_content; ?>
                        <hr>
                    </div>
                    <div class="uk-grid uk-grid-width-small-1-2">
                        <?php foreach($ppImages as $val): ?>
                            <div>
                                <p class="uk-text-center"><?=$val->name; ?></p>
                                <a href="<?=$val->url; ?>" data-uk-lightbox="{group:'my-group'}" title="" class="thumb-link">
                                    <div style="background-image: url('<?=$val->url;?>');" class="thumb"></div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div><!-- Our offers end -->

                <!-- News -->
                <section class="news-widget">
                    <h4 class="new-widget-title"><?=get_category_by_slug('articles')->name ;?></h4>

                    <?php $newsPosts =  get_posts( array( 'order' => 'ASC', 'posts_per_page' => 2, 'category_name'=> 'articles' ) ); ?>
                    <?php foreach($newsPosts as $key => $value) :?>
                        <?php $newsImg = wp_get_attachment_url( get_post_thumbnail_id($value->ID) ); ?>
                        <!-- News article -->
                        <article class="uk-article">
                            <h2 class="uk-article-title"><a href="<?=get_permalink($value->ID); ?>"><?=$value->post_title; ?></a></h2>
                            <p class="uk-article-meta"><?=$value->post_date; ?></p>
                            <div class="news-article-content uk-clearfix">
                                <a href="<?=get_permalink($value->ID); ?>"><img class="uk-align-medium-left" src="<?=$newsImg; ?>" alt=""></a>
                                <?=$value->post_excerpt; ?>
                            </div>
                            <hr class="uk-article-divider">
                        </article><!-- News article end -->
                    <?php endforeach ;?>

                </section><!-- News end -->

            </article>
        </section>
    </div>
</section><!-- Main content end -->


