<?php get_header();
    
    $showslider=get_theme_mod('ai_news_slider_display',true);
?>
    
    <?php 
    
        if($showslider){
            include get_template_directory() . '/inc/slider.php';
        }
    ?>
    <section class="blog-sec-wp ptb-100" id="primary">
        <div class="container">
            <h4 class="news">Latest News</h4>
            <div class="row">
                    <?php if(have_posts()):
                            while(have_posts()):the_post();
                                get_template_part( 'template-parts/content', get_post_type() );
                            endwhile;
                        else:
                            echo "<p>No Content found</p>";

                        endif;
                        ?>
                    <div class="paging-navigation">
                        <nav class="navigation">
                            <?php
                             echo paginate_links();
                            ?> 
                        </nav>
                    </div>
            </div>
        </div>
    </section>
<?php get_footer();?>