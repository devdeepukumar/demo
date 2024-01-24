<?php
    $readmore = get_theme_mod('ai_news_read_more_label', __('Read More', 'blog-genius'));
    $showauthor = get_theme_mod('ai_news_archive_co_post_author', true);
    $showdate = get_theme_mod('ai_news_archive_co_post_date', true);
    $showimage = get_theme_mod('ai_news_archive_co_featured_image', true);
?>

<div class="col-lg-4">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="blog-area blog-genius-blog mb-5">
            <?php if ($showimage) { ?>
                <div class="blog-img">
                    <?php ai_news_post_thumbnail(); ?>
                </div>
            <?php } ?>
            <div class="blog-content content">
                <ul class="blog-user-details mb-20">
                    <?php if ($showdate) { ?>
                        <li><i class="fa fa-calendar-check-o"></i><?php ai_news_posted_on(); ?></li>
                    <?php } ?>
                </ul>
                <h3 class="title mb-20 mt-4">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <?php if ($showauthor != '' || $showdate != '') { ?>
                    <ul class="blog-user-details mb-20">
                        <?php if ($showauthor) { ?>
                            <li class="forad"><?php echo get_avatar(get_the_author_meta('email'), '30'); ?><?php ai_news_posted_by(); ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <?php the_excerpt(); ?>
                <?php if ($readmore != '') { ?>
                    <a class="read-more" href="<?php the_permalink(); ?>"><?php echo esc_html($readmore); ?><i class="fa fa-chevron-right"></i></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
