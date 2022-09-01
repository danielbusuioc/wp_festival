<?php
/**
 * Asura WordPress theme.
 *
 * Please do not make any edits to this file. All edits should be done in a child theme.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set our theme version.
define( 'ASURA_VERSION', '1.2.0' );

if ( ! function_exists( 'asura_setup' ) ) {
	add_action( 'after_setup_theme', 'asura_setup' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 */
	function asura_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'asura' );

		// Add theme support for various features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'aside', 'image', 'quote', 'link', 'status' ) );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height' => 72,
			'width' => 240,
			'flex-height' => true,
			'flex-width' => true
		) );
		
		add_theme_support( "custom-background",
			array(
				'default-color' 		 => 'ffffff',
				'default-image'          => '',
				'default-repeat'         => 'repeat',
				'default-position-x'     => 'left',
				'default-position-y'     => 'top',
				'default-size'           => 'auto',
				'default-attachment'     => '',
				'wp-head-callback'       => '_custom_background_cb',
				'admin-head-callback'    => '',
				'admin-preview-callback' => ''
			)
		);
		
		add_theme_support( "custom-header",
			array(
				'default-image'          => '',
				'flex-height'            => false,
				'flex-width'             => false,
				'uploads'                => true,
				'random-default'         => false,
				'header-text'            => false,
				'wp-head-callback'       => '',
				'admin-head-callback'    => '',
				'admin-preview-callback' => '',
			)
		);

		// Register primary menu.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'asura' ),
		) );

		/**
		 * Set the content width to something large
		 * We set a more accurate width in asura_smart_content_width()
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1200; /* pixels */
		}

		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( 'css/admin/editor-style.css' );
	}
}

/**
 * Get all necessary theme files
 */
require get_template_directory() . '/inc/theme-functions.php';
require get_template_directory() . '/inc/defaults.php';
require get_template_directory() . '/inc/class-css.php';
require get_template_directory() . '/inc/css-output.php';
require get_template_directory() . '/inc/general.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/markup.php';
require get_template_directory() . '/inc/element-classes.php';
require get_template_directory() . '/inc/typography.php';
require get_template_directory() . '/inc/plugin-compat.php';
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

if ( is_admin() ) {
	require get_template_directory() . '/inc/meta-box.php';
	require get_template_directory() . '/inc/dashboard.php';
}

/**
 * Load our theme structure
 */
require get_template_directory() . '/inc/structure/archives.php';
require get_template_directory() . '/inc/structure/comments.php';
require get_template_directory() . '/inc/structure/featured-images.php';
require get_template_directory() . '/inc/structure/footer.php';
require get_template_directory() . '/inc/structure/header.php';
require get_template_directory() . '/inc/structure/navigation.php';
require get_template_directory() . '/inc/structure/post-meta.php';
require get_template_directory() . '/inc/structure/sidebars.php';
require get_template_directory() . '/inc/structure/social-bar.php';

define('ASURA_THEME_URL','https://wpkoi.com/asura-wpkoi-wordpress-theme/');
define('ASURA_WPKOI_AUTHOR_URL','https://wpkoi.com/');
define('ASURA_WPKOI_SOCIAL_URL','https://www.facebook.com/wpkoithemes/');
define('ASURA_WORDPRESS_REVIEW','https://wordpress.org/support/theme/asura/reviews/?filter=5');
define('ASURA_DOCUMENTATION','https://wpkoi.com/docs/');
define('ASURA_FONT_AWESOME_LINK','https://wpkoi.com/docs/custom-icons/');
