<?php
add_action( 'blog_genius_wp_enqueue_scripts', 'blog_genius_enqueue_styles' );
function blog_genius_enqueue_styles() {
    wp_enqueue_style( 'blog-genius-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'blog-genius-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('blog-genius-parent-style')
    );
 wp_enqueue_style('blog-genius-font-cookie', 'https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap');

 add_theme_support( 'automatic-feed-links' );

    /**
 * Add a sidebar.
 */
    function blog_genius_theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'blog-genius' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'blog-genius' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'blog_genius_theme_slug_widgets_init' );
}
add_action('wp_enqueue_scripts','blog_genius_enqueue_styles');

function as_blog_genius_theme_setup() {

    // Adds <title> tag support
    add_theme_support( 'title-tag');  

}
add_action('after_setup_theme', 'as_blog_genius_theme_setup');
