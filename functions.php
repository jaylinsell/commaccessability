<?php
/**
 * commaccessability functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package commaccessability
 */

 // Require the enque script for wpack bundler
require_once __DIR__ . '/inc/ca-enque.php';

// Instantiate wpack bundler
$enqueue = new caEnque('appName', 'outputPath', '1.0.0', 'theme', __FILE__);


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.1.1' );
}

if ( ! function_exists( 'commaccessability_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function commaccessability_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on commaccessability, use a find and replace
		 * to change 'commaccessability' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'commaccessability', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'commaccessability' ),
				'footer-menu-1' => esc_html__( 'Footer 1', 'commaccessability' ),
				'footer-menu-2' => esc_html__( 'Footer 2', 'commaccessability' ),
				'footer-menu-3' => esc_html__( 'Footer 3', 'commaccessability' ),
				'footer-menu-4' => esc_html__( 'Footer 4', 'commaccessability' ),
				'footer-menu-legals' => esc_html__( 'Footer Legals', 'commaccessability' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'commaccessability_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'commaccessability_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function commaccessability_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'commaccessability_content_width', 640 );
}
add_action( 'after_setup_theme', 'commaccessability_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function commaccessability_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'commaccessability' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'commaccessability' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'commaccessability_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function commaccessability_scripts() {
	wp_enqueue_style( 'commaccessability-style', get_stylesheet_uri(), array() );
	wp_style_add_data( 'commaccessability-style', 'rtl', 'replace' );

	wp_enqueue_script( 'commaccessability-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'tabs', get_template_directory_uri() . '/js/vanilla-js-tabs.js', array(), false, true );
	wp_enqueue_script( 'popperjs', 'https://unpkg.com/@popperjs/core@2', array(), null, true );
	wp_enqueue_script( 'tippy', 'https://unpkg.com/tippy.js@6', array(), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'commaccessability_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function add_page_categories() {
	register_taxonomy_for_object_type('category', 'page');
}
// Add to the admin_init hook of your theme functions.php file
add_action( 'init', 'add_page_categories' );

add_filter( 'walker_nav_menu_start_el', 'add_menu_btn',10,4);
function add_menu_btn( $output, $item, $depth, $args ){

	//Only add class to 'top level' items on the 'primary' menu.
	if('menu-1' == $args->theme_location && $depth === 0 ){
			if (in_array("menu-item-has-children", $item->classes)) {
					$output .='<button class="sub-menu-toggle" aria-label="Toggle Sub Menu"></button>';
			}
	}
	return $output;
}
