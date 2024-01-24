<?php
/**
 * BlogPress Theme Customizer
 *
 * @package BlogPress
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */



function ai_news_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'ai_news_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'ai_news_customize_partial_blogdescription',
			)
		);
	}
	/**
	 * AI News Theme Options Panel
	 */
	$wp_customize->add_panel( 'ai_news_theme_options', array(
	    'title'     => esc_html__( 'AI News Settings', 'ai-news' ),
	    'priority'  => 2,
	) );

	//Header Socail Icon Section

	$wp_customize->add_section( 'ai_news_header_social_icon_section', array (
		'title'     => esc_html__( 'AI News Social Icon setting', 'ai-news' ),
		'panel'     => 'ai_news_theme_options',
		'priority'  => 10
	) );

	// Top Header Menu Social Icon Display Control
	$wp_customize->add_setting ( 'ai_news_left_header_social_icon_display', array (
		'default'           => true,
		'sanitize_callback' => 'ai_news_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'ai_news_left_header_social_icon_display', array (
		'label'           => esc_html__( 'Display Left Header Social Icons', 'ai-news' ),
		'section'         => 'ai_news_header_social_icon_section',
		'priority'        => 4,
		'type'            => 'checkbox'
	) );

	// Social URL Target Display Control
	$wp_customize->add_setting ( 'ai_news_social_icon_target_display', array (
		'default'           => true,
		'sanitize_callback' => 'ai_news_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'ai_news_social_icon_target_display', array (
		'label'           => esc_html__( 'Display Social URL in new Window', 'ai-news' ),
		'section'         => 'ai_news_header_social_icon_section',
		'priority'        => 5,
		'type'            => 'checkbox',
		'active_callback' => 'ai_news_header_social_active_callback'
	) );

	// Facebook URL
	$wp_customize->add_setting ( 'ai_news_social_icon_fb_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control ( 'ai_news_social_icon_fb_url', array(
		'label'    => esc_html__( 'Facebook URL', 'ai-news' ),
		'section'  => 'ai_news_header_social_icon_section',
		'priority' => 6,
		'type'     => 'url',
		'active_callback' => 'ai_news_header_social_active_callback'
	) );

	// Twitter URL
	$wp_customize->add_setting ( 'ai_news_social_icon_twitter_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control ( 'ai_news_social_icon_twitter_url', array(
		'label'    => esc_html__( 'Twitter URL', 'ai-news' ),
		'section'  => 'ai_news_header_social_icon_section',
		'priority' => 7,
		'type'     => 'url',
		'active_callback' => 'ai_news_header_social_active_callback'
	) );

	// Youtube URL
	$wp_customize->add_setting ( 'ai_news_social_icon_youtube_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control ( 'ai_news_social_icon_youtube_url', array(
		'label'    => esc_html__( 'Youtube URL', 'ai-news' ),
		'section'  => 'ai_news_header_social_icon_section',
		'priority' => 8,
		'type'     => 'url',
		'active_callback' => 'ai_news_header_social_active_callback'
	) );

	// Instagram URL
	$wp_customize->add_setting ( 'ai_news_social_icon_instagram_url', array(
		'default'           => '',

		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control ( 'ai_news_social_icon_instagram_url', array(
		'label'    => esc_html__( 'Instagram URL', 'ai-news' ),
		'section'  => 'ai_news_header_social_icon_section',
		'priority' => 9,
		'type'     => 'url',
		'active_callback' => 'ai_news_header_social_active_callback'
	) );

	

	/*Header Menu Section*/
	$wp_customize->add_section( 'ai_news_header_menu_section', array (
		'title'     => esc_html__( 'Header Top Menu Section', 'ai-news' ),
		'panel'     => 'ai_news_theme_options',
		'priority'  => 10,
		'description' => esc_html__( 'Personalize the settings header Menu.', 'ai-news' ),
	) );
	// Header Right Menu Display Control
	$wp_customize->add_setting ( 'ai_news_header_menu_display', array (
		'default'           => true,
		'sanitize_callback' => 'ai_news_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'ai_news_header_menu_display', array (
		'label'           => esc_html__( 'Display Header Right Menu', 'ai-news' ),
		'section'         => 'ai_news_header_menu_section',
		'priority'        => 2,
		'type'            => 'checkbox'
	) );

	/*enable sticky*/
	$wp_customize->add_setting( 'ai_news_sticky_menu_enable', array(
	    'default'			=> true,
	    'sanitize_callback' => 'ai_news_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'ai_news_sticky_menu_enable', array(
	    'label'		=> esc_html__( 'Enable Sticky Menu', 'ai-news' ),
	    'section'   => 'ai_news_header_menu_section',
	    'settings'  => 'ai_news_sticky_menu_enable',
	    'type'	  	=> 'checkbox'
	) );

	//Slider Section

	$wp_customize->add_section( 'ai_news_slider_section', array (
		'title'     => esc_html__( 'AI News Slider setting', 'ai-news' ),
		'panel'     => 'ai_news_theme_options',
		'priority'  => 10
	) );

	$wp_customize->add_setting ( 'ai_news_slider_display', array (
		'default'           => true,
		'sanitize_callback' => 'ai_news_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'ai_news_slider_display', array (
		'label'           => esc_html__( 'Display Slider', 'ai-news' ),
		'section'         => 'ai_news_slider_section',
		'priority'        => 2,
		'type'            => 'checkbox',
	
	) );

	//category wise post
	$categories = get_categories();

	$cats = array();
	$i = 0;
	foreach($categories as $category){
	    if($i==0){
	        $default = $category->slug;
	        $i++;
	    }
	    $cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('ai_news_featured_category', array(
	    'default'        => $default,
	    'sanitize_callback' => 'ai_news_sanitize_select',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ai_news_featured_category', array(
	    'label' => 'Select category vise post',
	    'description' => '',
	    'section' => 'ai_news_slider_section',
	    'settings' => 'ai_news_featured_category',
	    'priority'        => 4,
	    'type'    => 'select',
	    'choices' => $cats,
	    'active_callback' => 'ai_news_slider_callback'
	)));


	// Number of post
	$wp_customize->add_setting ( 'ai_news_number_of_post', array(
		'default'           => 10,
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control ( 'ai_news_number_of_post', array(
		'label'    => esc_html__( 'Number of Post', 'ai-news' ),
		'section'  => 'ai_news_slider_section',
		'priority' => 7,
		'type'     => 'number',
		'active_callback' => 'ai_news_slider_callback'
	) );


	/*Blog Post Options Section*/
	$wp_customize->add_section( 'ai_news_general_options', array (
		'title'     => esc_html__( 'General Options', 'ai-news' ),
		'panel'     => 'ai_news_theme_options',
		'priority'  => 10,
		'description' => esc_html__( 'Personalize the settings of your theme.', 'ai-news' ),
	) );

	

	// Read More Label
	$wp_customize->add_setting ( 'ai_news_read_more_label', array(
		'default'           => esc_html__( 'Read More', 'ai-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control ( 'ai_news_read_more_label', array(
		'label'    => esc_html__( 'Read More Label', 'ai-news' ),
		'section'  => 'ai_news_general_options',
		'priority' => 1,
		'type'     => 'text',
	) );

	// Excerpt Length
	$wp_customize->add_setting ( 'ai_news_excerpt_length', array(
		'default'           => esc_html__( '55', 'ai-news' ),
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control ( 'ai_news_excerpt_length', array(
		'label'    => esc_html__( 'Excerpt Length', 'ai-news' ),
		'description' => esc_html__( '0 will not show the excerpt.', 'ai-news' ),
		'section'  => 'ai_news_general_options',
		'priority' => 2,
		'type'     => 'number',
	) );

	/*Blog Post Options*/
	$wp_customize->add_section( 'ai_news_archive_content_options', array (
		'title'     => esc_html__( 'Blog Post Options', 'ai-news' ),
		'panel'     => 'ai_news_theme_options',
		'priority'  => 10,
		'description' => esc_html__( 'Setting will also apply on archieve and search page.', 'ai-news' ),
	) );

	/*======================*/

	// Post Author Display Control
	$wp_customize->add_setting ( 'ai_news_archive_co_post_author', array (
		'default'           => true,
		'sanitize_callback' => 'ai_news_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'ai_news_archive_co_post_author', array (
		'label'           => esc_html__( 'Display Author', 'ai-news' ),
		'section'         => 'ai_news_archive_content_options',
		'priority'        => 2,
		'type'            => 'checkbox',
	) );

	// Post Date Display Control
	$wp_customize->add_setting ( 'ai_news_archive_co_post_date', array (
		'default'           =>  true,
		'sanitize_callback' => 'ai_news_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'ai_news_archive_co_post_date', array (
		'label'           => esc_html__( 'Display Date', 'ai-news' ),
		'section'         => 'ai_news_archive_content_options',
		'priority'        => 3,
		'type'            => 'checkbox',
	) );

	// Featured Image Archive Control
	$wp_customize->add_setting ( 'ai_news_archive_co_featured_image', array (
		'default'           => true,
		'sanitize_callback' => 'ai_news_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'ai_news_archive_co_featured_image', array (
		'label'           => esc_html__( 'Display Featured Image', 'ai-news' ),
		'section'         => 'ai_news_archive_content_options',
		'priority'        => 5,
		'type'            => 'checkbox',
	) );

	/*Single Post Options*/
	$wp_customize->add_section( 'ai_news_single_content_options', array (
		'title'     => esc_html__( 'Single Post Options', 'ai-news' ),
		'panel'     => 'ai_news_theme_options',
		'priority'  => 10,
		'description' => esc_html__( 'Setting will apply on the content of single posts.', 'ai-news' ),
	) );


	// Post Author Display Control
	$wp_customize->add_setting ( 'ai_news_single_co_post_author', array (
		'default'           => true,
		'sanitize_callback' => 'ai_news_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'ai_news_single_co_post_author', array (
		'label'           => esc_html__( 'Display Author', 'ai-news' ),
		'section'         => 'ai_news_single_content_options',
		'priority'        => 2,
		'type'            => 'checkbox',
	) );

	// Post Date Display Control
	$wp_customize->add_setting ( 'ai_news_single_co_post_date', array (
		'default'           => true,
		'sanitize_callback' => 'ai_news_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'ai_news_single_co_post_date', array (
		'label'           => esc_html__( 'Display Date', 'ai-news' ),
		'section'         => 'ai_news_single_content_options',
		'priority'        => 3,
		'type'            => 'checkbox',
	) );


	// Single Post Tags Display Control
	$wp_customize->add_setting ( 'ai_news_single_co_post_tags', array (
		'default'           => true,
		'sanitize_callback' => 'ai_news_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'ai_news_single_co_post_tags', array (
		'label'           => esc_html__( 'Display Tags', 'ai-news' ),
		'section'         => 'ai_news_single_content_options',
		'priority'        => 5,
		'type'            => 'checkbox',
	) );

	// Featured Image Post Display Control
	$wp_customize->add_setting ( 'ai_news_single_co_featured_image_post', array (
		'default'           => true,
		'sanitize_callback' => 'ai_news_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'ai_news_single_co_featured_image_post', array (
		'label'           => esc_html__( 'Display Featured Image', 'ai-news' ),
		'section'         => 'ai_news_single_content_options',
		'priority'        => 7,
		'type'            => 'checkbox',
	) );


	//Sidebar Section

	$wp_customize->add_section( 'ai_news_sidebar_section', array (
		'title'     => esc_html__( 'AI News Sidebar setting', 'ai-news' ),
		'panel'     => 'ai_news_theme_options',
		'priority'  => 10
	) );
	
	// Main Sidebar Position
	$wp_customize->add_setting ( 'ai_news_sidebar_position', array (
		'default'           => esc_html__( 'right', 'ai-news' ),
		'sanitize_callback' => 'ai_news_sanitize_select',
	) );

	$wp_customize->add_control ( 'ai_news_sidebar_position', array (
		'label'    => esc_html__( 'Sidebar Position', 'ai-news' ),
		'section'  => 'ai_news_sidebar_section',
		'priority' => 2,
		'type'     => 'select',
		'choices'  => array(
			'right' => esc_html__( 'Right Sidebar', 'ai-news'),
			'left'  => esc_html__( 'Left Sidebar',  'ai-news'),
			'no'  => esc_html__( 'No Sidebar',  'ai-news'),
		),
	) );

	//Footer Section

	$wp_customize->add_section( 'ai_news_footer_section', array (
		'title'     => esc_html__( 'AI News Footer setting', 'ai-news' ),
		'panel'     => 'ai_news_theme_options',
		'priority'  => 10
	) );

	//Footer bottom Copyright Display Control
	$wp_customize->add_setting ( 'ai_news_footer_copyright_display', array (
		'default'           => true,
		'sanitize_callback' => 'ai_news_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'ai_news_footer_copyright_display', array (
		'label'           => esc_html__( 'Display Copyright Footer', 'ai-news' ),
		'section'         => 'ai_news_footer_section',
		'priority'        => 1,
		'type'            => 'checkbox',
	) );

	// Copyright Control
	$wp_customize->add_setting ( 'ai_news_copyright', array (
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control ( 'ai_news_copyright', array (
		'label'    => esc_html__( 'Copyright', 'ai-news' ),
		'section'  => 'ai_news_footer_section',
		'priority' => 2,
		'type'     => 'textarea',
		'active_callback'=> 'ai_news_footer_copyright_callback'
	) );




}
add_action( 'customize_register', 'ai_news_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ai_news_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ai_news_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ai_news_customize_preview_js() {
	wp_enqueue_script( 'ai-news-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'ai_news_customize_preview_js' );
/*callback function for top header section*/

if ( !function_exists('ai_news_header_social_active_callback') ) :
  function ai_news_header_social_active_callback(){
  	  $show_social = get_theme_mod('ai_news_left_header_social_icon_display',true);
      
      if( $show_social){
          return true;
      }
      else{
          return false;
      }
  }
endif;

if ( !function_exists('ai_news_footer_copyright_callback') ) :
  function ai_news_footer_copyright_callback(){
  
  	  $show_copyright = get_theme_mod('ai_news_footer_copyright_display',true);
      
      if( true == $show_copyright ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

if ( !function_exists('ai_news_slider_callback') ) :
  function ai_news_slider_callback(){
  
  	  $show_copyright = get_theme_mod('ai_news_slider_display',true);
      
      if( true == $show_copyright ){
          return true;
      }
      else{
          return false;
      }
  }
endif;