<?php
/**
 * rise functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rise 
 */

/**
 * register the theme update
 */ 
require 'theme-updates/theme-update-checker.php';
$MyThemeUpdateChecker = new ThemeUpdateChecker(
'rise', //Theme slug. Usually the same as the name of its directory.
'http://modernthemes.net/updates/?action=get_metadata&slug=rise' //Metadata URL.
);

if ( ! function_exists( 'rise_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rise_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on rise, use a find and replace
	 * to change 'rise' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'rise', get_template_directory() . '/languages' );

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
	add_image_size( 'rise-home-project', 400, 400, array( 'center', 'center' ) ); 
	add_image_size( 'rise-home-blog', 400, 250, true );

	// This theme uses wp_nav_menu() in one location. 
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'rise' ),
		'social'  => esc_html__( 'Social', 'rise' ), 
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'gallery',
		'quote', 
	) );
	
	/* Editor styles. */
	add_editor_style( rise_get_editor_styles() ); 

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rise_custom_background_args', array(
		'default-color' => 'f9f9f9',
		'default-image' => '',
	) ) );
	
	add_theme_support( 'custom-header', apply_filters( 'rise_custom_header_args', array(
		'default-text-color'     => 'ffffff',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'rise_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rise_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rise_content_width', 640 );
}
add_action( 'after_setup_theme', 'rise_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rise_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rise' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) ); 
	register_sidebar( array(
		'name'          => esc_html__( 'Home Widget Area #1', 'rise' ),
		'id'            => 'home-widget-area-one',
		'description'   => esc_html__( 'Use this widget area to display home page content', 'rise' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">', 
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Widget Area #2', 'rise' ), 
		'id'            => 'home-widget-area-two',
		'description'   => esc_html__( 'Use this widget area to display home page content', 'rise' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Widget Area #3', 'rise' ), 
		'id'            => 'home-widget-area-three', 
		'description'   => esc_html__( 'Use this widget area to display home page content', 'rise' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) ); 
	register_sidebar( array(
		'name'          => esc_html__( 'Home Widget Area #4', 'rise' ), 
		'id'            => 'home-widget-area-four', 
		'description'   => esc_html__( 'Use this widget area to display home page content', 'rise' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>', 
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) ); 
	
	//Register the sidebar widgets   
	register_widget( 'rise_Video_Widget' );  
	register_widget( 'rise_Contact_Info' );
	register_widget( 'rise_action' );
	register_widget( 'rise_home_news' ); 
	register_widget( 'rise_project_posts' ); 
	register_widget( 'rise_testimonial_posts' ); 
	
}
add_action( 'widgets_init', 'rise_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rise_scripts() {
	wp_enqueue_style( 'rise-style', get_stylesheet_uri() );
	
	$headings_font = esc_html(get_theme_mod('headings_fonts'));
	$body_font = esc_html(get_theme_mod('body_fonts'));
	
	if( $headings_font ) {
		wp_enqueue_style( 'rise-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );	
	} else {
		wp_enqueue_style( 'rise-headings', '//fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Montserrat:400,700');   
	}	
	if( $body_font ) {
		wp_enqueue_style( 'rise-body-fonts', '//fonts.googleapis.com/css?family='. $body_font ); 	
	} else {
		wp_enqueue_style( 'rise-body', '//fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Montserrat:400,700');   
	}

	wp_enqueue_style( 'rise-column-clear', get_template_directory_uri() . '/css/mt-column-clear.css' );
	
	wp_enqueue_style( 'rise-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.css' ); 

	wp_enqueue_style( 'rise-menu', get_template_directory_uri() . '/css/jPushMenu.css' );
	
	if ( get_theme_mod( 'active_project_hovers' ) == '' ) :
	
		wp_enqueue_style( 'rise-projects-css', get_template_directory_uri() . '/css/rise-projects.css' );
        
   	else:
	
		wp_enqueue_style( 'rise-projects-no-hover-css', get_template_directory_uri() . '/css/rise-projects-no-hover.css' );
        
	endif; 
	
	wp_enqueue_style( 'rise-testimonials-css', get_template_directory_uri() . '/css/rise-testimonials.css' ); 
	
	
	if ( get_theme_mod( 'active_header_gradient' ) ) :   
        
    	wp_enqueue_style( 'rise-no-gradient-css', get_template_directory_uri() . '/css/rise-no-gradient.css' );
        
	endif; 

	wp_enqueue_script( 'rise-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'rise-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'rise-menu', get_template_directory_uri() . '/js/jPushMenu.js', array('jquery'), false, true );

	wp_enqueue_script( 'rise-menu-script', get_template_directory_uri() . '/js/menu.script.js', array(), false, true );
	
	wp_enqueue_script( 'rise-parallax', get_template_directory_uri() . '/js/parallax.js', array('jquery'), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rise_scripts' );

/**
 * Load html5shiv
 */
function rise_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'rise_html5shiv' ); 


/**
 * Change the excerpt length
 */
function rise_excerpt_length( $length ) {
	
	$excerpt = esc_attr( get_theme_mod('exc_length', '15')); 
	return $excerpt; 

}

add_filter( 'excerpt_length', 'rise_excerpt_length', 999 );


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
require get_template_directory() . '/inc/rise-styles.php';
require get_template_directory() . '/inc/rise-sanitize.php';
require get_template_directory() . '/inc/rise-active-options.php'; 

/**
 * Sidebar widget columns
 */
require get_template_directory() . '/inc/rise-sidebar-columns.php'; 

/**
 * Google Fonts  
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Include additional custom admin panel features. 
 */
require get_template_directory() . '/panel/functions-admin.php';
require get_template_directory() . '/panel/rise-theme-admin-page.php'; 

/**
 * register your custom widgets
 */ 
include( get_template_directory() . '/inc/widgets.php' );


// allow skype names in social menu
function rise_allow_skype_protocol( $protocols ){
    $protocols[] = 'skype';
    return $protocols;
}
add_filter( 'kses_allowed_protocols' , 'rise_allow_skype_protocol' );


/**
 * get out of that loop
 */
function rise_exclude_post_formats_from_blog( $rise_blog_query ) {

	if( $rise_blog_query->is_main_query() && $rise_blog_query->is_home() ) {
		$rise_tax_query = array( array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array( 'post-format-gallery', 'post-format-quote' ),
			'operator' => 'NOT IN',
		) );
		$rise_blog_query->set( 'tax_query', $rise_tax_query ); 
	}

}
add_action( 'pre_get_posts', 'rise_exclude_post_formats_from_blog' );

