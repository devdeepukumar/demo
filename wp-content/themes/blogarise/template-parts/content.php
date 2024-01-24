<?php
/**
 * The template for displaying the content.
 * @package blogarise
 */
?>
<div class="row">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php while(have_posts()){ the_post(); ?>
    <!--col-md-12-->
    <div class="col-md-12 fadeInDown wow" data-wow-delay="0.1s">
        <!-- bs-posts-sec-inner -->
        
        <?php $url = blogarise_get_freatured_image_url($post->ID, 'blogarise-medium');
        if($url) { ?>
        <div class="bs-blog-post list-blog">
            <?php } else { ?>
        <div class="bs-blog-post list-blog d-flex">
            <?php } blogarise_post_image_display_type($post); ?>
            <article class="small col text-xs">
              <?php 
                    $blogarise_global_category_enable = get_theme_mod('blogarise_global_category_enable','true');
                    if($blogarise_global_category_enable == 'true') { ?>
                    <div class="bs-blog-category">
                        <?php blogarise_post_categories(); ?>
                    </div>
                    <?php } ?>
                    <h4 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                    <?php blogarise_post_meta();
                        blogarise_posted_content(); wp_link_pages( ); ?>
            </article>
          </div>
    <!-- // bs-posts-sec block_6 -->
    </div>
    <?php }
        blogarise_page_pagination(); ?>
</div>
</div>