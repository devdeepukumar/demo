<div class="blog-area mb-5">
    <div class="blog-img">
        <?php ai_news_post_thumbnail();?>
    </div>
    <div class="blog-content content">
        
        <?php the_title( sprintf( '<h3 class="title mb-20 mt-4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
        <ul class="blog-user-details mb-20">
            <li><?php echo get_avatar( get_the_author_meta('email'), '30' );?><?php ai_news_posted_by();?></li>
            <li><i class="fa fa-calendar-check-o"></i><?php ai_news_posted_on();?></li>
        </ul>
        <?php the_excerpt();?>
        <a class="read-more" href="<?php (the_permalink());?>"><?php esc_html_e('Read More','ai-news');?><i class="fa fa-chevron-right"></i></a>
    </div>
    <footer class="entry-footer">
        <?php ai_news_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</div>