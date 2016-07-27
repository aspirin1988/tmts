<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tmts
 */

?>
<?php if (get_field('line-text', 5)) : ?>
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

                <section class="news-widget">
                    <h4 class="new-widget-title"><?php the_title();?></h4>
                    <div class="page-block uk-block">
                        <article class="uk-article">
                            <?php $currentPOST = get_post(); ?>
                            <div class="news-article-content uk-clearfix">
                                <img class="uk-align-medium-left" src="<?=get_the_post_thumbnail_url($currentPOST->ID); ?>" alt="">
                                <div>
                                    <?=get_the_content(); ?>
                                    <!--?php
                                        $contentA = get_the_content();;
                                        $contentA = htmlentities($contentA, null, 'utf-8');
                                        $contentA = str_replace('&nbsp;', ' ', $contentA);
                                        $contentA = str_replace("\n", '<br>', $contentA);
                                        $contentA = html_entity_decode($contentA);
                                        echo $contentA;
                                    ?-->
                                </div>
                                <?php  ?>
                            </div>
                        </article><!-- News article end -->
                    </div>
                </section>
            </article>
        </section>
    </div>
</section><!-- Main content end -->
<br>


