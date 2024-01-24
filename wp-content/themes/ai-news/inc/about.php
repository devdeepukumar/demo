<?php
/**
 * Alchemist Theme page
 *
 * @package Chique
 */

function ai_news_about_admin_style( $hook ) {
	if ( 'appearance_page_ai-news-about' === $hook ) {
		wp_enqueue_style( 'ai-news-about-admin', get_theme_file_uri( 'assets/css/about-admin.css' ), null, '1.0' );
	}
}
add_action( 'admin_enqueue_scripts', 'ai_news_about_admin_style' );

/**
 * Add theme page
 */
function ai_news_menu() {
	add_theme_page( esc_html__( 'About Theme', 'ai-news' ), esc_html__( 'About Theme', 'ai-news' ), 'edit_theme_options', 'ai-news-about', 'ai_news_about_display' );
}
add_action( 'admin_menu', 'ai_news_menu' );

/**
 * Display About page
 */
function ai_news_about_display() {
	$theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$description = explode( '. ', $theme->get( 'Description' ) );

					array_pop( $description );

					$description = implode( '. ', $description );

					echo esc_html( $description . '.' );
				?></p>
				<p class="actions">
					<a href="http://blogwpthemes.com/ai-news-wp-theme/" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'ai-news' ); ?></a>

					<a href="http://blogwpthemes.com/demo/ai-news/" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'ai-news' ); ?></a>

					<a href="http://blogwpthemes.com/demo/theme-docs/docs/ai-news-documentation/" class="button button-primary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'ai-news' ); ?></a>

					<a href="http://wordpress.org/support/theme/ai-news/#new-post" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'ai-news' ); ?></a>

					<a href="http://blogwpthemes.com/product/ai-news-blog-pro-wordpress-theme/" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'ai-news' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'ai-news' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'ai-news-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'ai-news-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'ai-news' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'ai-news-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Free Vs Pro', 'ai-news' ); ?></a>
		</nav>

		<?php
			ai_news_main_screen();

			ai_news_free_vs_pro_screen();

		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'ai-news' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'ai-news' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'ai-news' ) : esc_html_e( 'Go to Dashboard', 'ai-news' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function ai_news_main_screen() {
	if ( isset( $_GET['page'] ) && 'ai-news-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'ai-news' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'ai-news' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'ai-news' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'ai-news' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'ai-news' ) ?></p>
				<p><a href="http://blogwpthemes.com/forums/forum/theme-support/" class="button button-primary"><?php esc_html_e( 'Support Forum', 'ai-news' ); ?></a></p>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function ai_news_free_vs_pro_screen() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap vs-theme-table">
			<div id="compare" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" style="display: block;" aria-hidden="false">
			   <div class="tab-containter">
			      <div class="wrapper">
			         <div class="tab-header">
			            <h2 class="entry-title">Free Vs Pro (Premium)</h2>
			         </div>
			         <div class="compare-table">
			            <div class="hentry">
			            	<table>
							    <thead>
							        <tr>
							            <th>Free</th>
							            <th>Features</th>
							            <th>Pro (Premium)</th>
							        </tr>
							    </thead>
							    <tbody>
							        <tr>
							            <td><i class="dashicons dashicons-yes"></i></td>
							            <td>Responsive Design</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
							        <tr>
							            <td><i class="dashicons dashicons-yes"></i></td>
							            <td>Super Easy Setup</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
									<tr>
							            <td><i class="dashicons dashicons-yes"></i></td>
							            <td>Woocommerce Compatible</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
							        <tr>
							            <td><i class="dashicons dashicons-yes"></i></td>
							            <td>Premium Support</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
									<tr>
							            <td><i class="dashicons dashicons-yes"></i></td>
							            <td>Excerpt Options</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
							        <tr>
							            <td><i class="dashicons dashicons-no"></i></td>
							            <td>Multiple Home Pages</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
							        <tr>
							            <td><i class="dashicons dashicons-no"></i></td>
							            <td>Unlimites Color Scheme</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
							        <tr>
							            <td><i class="dashicons dashicons-no"></i></td>
							            <td>Multiple Header Layouts</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
							        <tr>
							            <td><i class="dashicons dashicons-no"></i></td>
							            <td>Multiple Footer Layouts</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
							        <tr>
							            <td><i class="dashicons dashicons-no"></i></td>
							            <td>Footer Menu</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
							        <tr>
							            <td><i class="dashicons dashicons-no"></i></td>
							            <td>Premium Widgets</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
							        <tr>
							            <td><i class="dashicons dashicons-no"></i></td>
							            <td>Contact Form</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
							        <tr>
							            <td><i class="dashicons dashicons-no"></i></td>
							            <td>Social Shares</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
							        
							        <tr>
							            <td><i class="dashicons dashicons-no"></i></td>
							            <td>Premium Plugins</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
							        <tr>
							            <td><i class="dashicons dashicons-no"></i></td>
							            <td>Page Customiztion</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
							        
							        <tr>
							            <td><i class="dashicons dashicons-no"></i></td>
							            <td>Multiple Sidebar</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
							        <tr>
							            <td><i class="dashicons dashicons-no"></i></td>
							            <td>Multiple Page Layout</td>
							            <td><i class="dashicons dashicons-yes"></i></td>
							        </tr>
							        
							    </tbody>
							</table>
			            </div>
			         </div>
			      </div>
			   </div>
			</div>
		</div>
	<?php
	}
} 