<?php
/**
 * Template part for displaying posts.
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
                    <?php if(is_category()) : ?>
                        <li class="uk-active"><a href="<?php the_permalink() ?>"><?php the_title();?></a></li>
                    <?php endif ;?>
                    <?php
                        if(is_single()):
                            $category = get_the_category();
                            $catParent = $category[0];
                    ?>
                        <li><a href="/category/<?=$catParent->slug; ?>"><?=$catParent->name; ?></a></li>
                        <li class="uk-active"><a href="<?php the_permalink() ?>"><?php the_title();?></a></li>
                    <?php endif; ?>
                </ul><!-- Breadcrumbs end -->

                <?php $currentCatPosts = get_posts(array(
                    'posts_per_page'   => 5,
                    'category' => 6,
                    'order' => 'ASC',
                )); ?>
                <ul id="just-switcher-panel">
                    <?php foreach ( array_reverse($currentCatPosts) as $key => $value) : ?>
                        <?php
                            $class = "";
                            if(get_the_ID() == $value->ID) {
                                $class = 'uk-active';
                            }
                        ?>
                        <li class="<?=$class; ?>"><a href="<?=get_permalink($value->ID); ?>"><?=$value->post_title; ?></a></li>
                    <?php endforeach; ?>
                </ul>

                <!-- This is the container of the content items -->
                <section class="single-content">
                    <?=$post->post_content; ?>
                    <!--?php
                        $contentA = $post->post_content;
                        $contentA = htmlentities($contentA, null, 'utf-8');
                        $contentA = str_replace('&nbsp;', ' ', $contentA);
                        $contentA = str_replace("\n", '<br>', $contentA);
                        $contentA = html_entity_decode($contentA);
                        echo $contentA;
                    ?-->
                </section>
            </article>

        </section>
    </div>
</section><!-- Main content end -->