<?php $currentCategory = get_the_category(); ?>
<?php $newsPosts =  get_posts(array('cat'=> $currentCategory[0]->term_id)); ?>
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