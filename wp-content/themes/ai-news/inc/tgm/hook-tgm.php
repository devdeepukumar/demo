<?php
/**
 * Recommended plugins
 *
 * @package Chatgpt
 */

if ( ! function_exists( 'ai_news_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function ai_news_recommended_plugins() {

        $plugins = array(
			array(
                'name'     => esc_html__( 'Blog Manager', 'ai-news' ),
                'slug'     => 'blog-manager-wp',
                'required' => false,
            ),
			array(
                'name'     => esc_html__( 'ChatGPT Content Generator', 'ai-news' ),
                'slug'     => 'ai-engine',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'ai_news_recommended_plugins' );