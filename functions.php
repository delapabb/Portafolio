<?php
/**
 * portafolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package portafolio
 */

if ( ! function_exists( 'portafolio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function portafolio_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on portafolio, use a find and replace
	 * to change 'portafolio' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'portafolio', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'portafolio' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'portafolio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'portafolio_setup' );

if ( ! function_exists('case_study_post_type') ) {
/*
 * Register Case Study custom post type
 *
*/

function case_study_post_type() {

	$labels = array(
		'name'                  => _x( 'Case Studies', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Caste Studies', 'text_domain' ),
		'name_admin_bar'        => __( 'Case Study', 'text_domain' ),
		'archives'              => __( 'Case Study Archives', 'text_domain' ),
		'attributes'            => __( 'Case Study Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Case Study:', 'text_domain' ),
		'all_items'             => __( 'All Case Studies', 'text_domain' ),
		'add_new_item'          => __( 'Add New Case Study', 'text_domain' ),
		'add_new'               => __( 'New Case Study', 'text_domain' ),
		'new_item'              => __( 'New Case Study', 'text_domain' ),
		'edit_item'             => __( 'Edit Caste Study', 'text_domain' ),
		'update_item'           => __( 'Update Case Study', 'text_domain' ),
		'view_item'             => __( 'View Case Study', 'text_domain' ),
		'view_items'            => __( 'View Case Studies', 'text_domain' ),
		'search_items'          => __( 'Search Case Study', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into case study', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this case study', 'text_domain' ),
		'items_list'            => __( 'Case studies', 'text_domain' ),
		'items_list_navigation' => __( 'Case studies list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter case studies', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'portfolio',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Case Study', 'text_domain' ),
		'description'           => __( 'A portfolio case study', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-widgets-menus',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rest_controller_class' => 'WP_REST_Case_Studies_Controller',
	);
	register_post_type( 'case_study', $args );

}
add_action( 'init', 'case_study_post_type', 0 );

}

function my_rewrite_flush() {
    case_study_post_type();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function portafolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'portafolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'portafolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function portafolio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'portafolio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'portafolio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'portafolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function portafolio_scripts() {
	wp_enqueue_style( 'portafolio-style', get_stylesheet_uri() );

	wp_enqueue_script( 'portafolio-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '20151215', false );

	wp_enqueue_script( 'portafolio-jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array(), '20151215', false );

	wp_enqueue_script( 'portafolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'portafolio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'portafolio-foundation-js', get_template_directory_uri() . '/js/foundation.js', array(), '20151215', true );

	wp_enqueue_script( 'portafolio-themes-js', get_template_directory_uri() . '/js/theme.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'portafolio_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
