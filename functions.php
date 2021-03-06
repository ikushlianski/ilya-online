<?php
/**
 * Ilyaonline functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ilyaonline
 */

//  // Phrases for translation
// if (function_exists('pll_register_string')) {
//  	pll_register_string('Site author name', $siteAuthorName = "Ilya Kushlianski");
// 	pll_register_string('Site person first name', $siteAuthorFirstName = "Ilya");
// 	pll_register_string('Site person last name', $siteAuthorLastName = "Kushlianski");
//   pll_register_string('Brand person title', $brandAuthorTitle = "Beginner developer. Fast learner");
//   pll_register_string('Who created theme', $themeCreator = "Theme IlyaOnline created by Ilya Kushlianski");
//   pll_register_string('Why choose me?', $whyMe = "Why choose me?");
// 	pll_register_string('Skills', $skills = "Skills");
// 	pll_register_string('Personality', $personality = 'Personality');
// 	pll_register_string('Portfolio', $portfolio = 'Portfolio');
//   pll_register_string('All works', $allWorks = 'All works');
//   pll_register_string('Contact me', $contactMe = 'Contact me');
//   pll_register_string('What I already know about', $whatIAlreadyKnow = 'What I already know about');
// 	pll_register_string('Further plans to learn', $furtherLearningPlans = 'Further plans to learn');
// 	pll_register_string('Skill summary', $skillSummary = 'Skill summary');
// 	pll_register_string('Notice', $notice = 'Notice');
//   pll_register_string('My other', $myOtherSkills = 'My other');
//
// }
if ( ! function_exists( 'ilyaonline_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ilyaonline_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Ilyaonline, use a find and replace
	 * to change 'ilyaonline' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ilyaonline', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'ilyaonline' ),
		'menu-2' => esc_html__( 'Brand menu', 'ilyaonline' )
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
	add_theme_support( 'custom-background', apply_filters( 'ilyaonline_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'ilyaonline_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ilyaonline_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ilyaonline_content_width', 640 );
}
add_action( 'after_setup_theme', 'ilyaonline_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ilyaonline_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ilyaonline' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ilyaonline' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ilyaonline_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ilyaonline_scripts() {
	wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('ilyaonline-font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style( 'ilyaonline-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'ilyaonline-fontawesome', 'https://use.fontawesome.com/4afda9f1d5.js' );
  wp_enqueue_style( 'ilyaonline-oswald', 'https://fonts.googleapis.com/css?family=Oswald&amp;subset=cyrillic' );
	wp_enqueue_style( 'ilyaonline-roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=cyrillic' );
	// wp_enqueue_script( 'ilyaonline-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'ilyaonline-customscripts', get_template_directory_uri() . '/__dist/js/ilyaonline.min.js', array('jquery'), '20151215', true );
	// wp_enqueue_script('bootstrap-scripts', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20151215', true);
	// wp_enqueue_script( 'ilyaonline-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );

	wp_localize_script( 'ilyaonline-customscripts', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'ilyaonline' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'ilyaonline' ) . '</span>',
	) );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ilyaonline_scripts' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function ilyaonline_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'ilyaonline_pingback_header' );

/**
 * Implement the send mail feature.
 */
function send_my_awesome_form(){

	if ( !empty($_POST['submitButton']) ) {
		$to = 'kushliansky@gmail.com';
		$author = $_POST['authorName'];
	  $subject = htmlspecialchars($_POST['subjectName']) . ' from ' . $author;
	  $body = $_POST['comment'];
	  $fromMail = filter_var($_POST['authorMail'], FILTER_SANITIZE_EMAIL);
	  // $headers = array("Content-Type: text/html; charset=UTF-8; From: <$fromMail>");
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'From:  ' . $author . ' <' . $fromMail .'>' . " \r\n" .
            'Reply-To: '.  $fromMail;

	  wp_mail( $to, $subject, $body, $headers );
	}
}
add_action('wp', 'send_my_awesome_form');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom post types
 */
function create_posttype() {

    register_post_type( 'skills',
    // CPT Options
        array(
            'labels' => array(
                'name' => _x( 'Skills', 'Post Type General Name', 'ilyaonline'),
                'singular_name' => _x( 'Skill', 'Post Type Singular Name', 'ilyaonline')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'skills'),
						'supports' => array('title', 'editor', 'page-attributes')
        )
    );
		register_post_type( 'works',
    // CPT Options
        array(
            'labels' => array(
                'name' => _x( 'Works', 'Post Type General Name', 'ilyaonline'),
                'singular_name' => _x( 'Work', 'Post Type Singular Name', 'ilyaonline')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'works'),
						'supports' => array('title', 'editor', 'page-attributes')
        )
    );
		register_post_type( 'smallworks',
		// CPT Options
				array(
						'labels' => array(
								'name' => _x( 'Small works', 'Post Type General Name', 'ilyaonline'),
								'singular_name' => _x( 'Small work', 'Post Type Singular Name', 'ilyaonline')
						),
						'public' => true,
						'has_archive' => true,
						'rewrite' => array('slug' => 'smallworks'),
						'supports' => array('title', 'editor', 'page-attributes')
				)
		);
		register_post_type( 'reviews',
		// CPT Options
				array(
						'labels' => array(
								'name' => _x( 'Reviews', 'Post Type General Name', 'ilyaonline'),
								'singular_name' => _x( 'Review', 'Post Type Singular Name', 'ilyaonline')
						),
						'public' => true,
						'has_archive' => true,
						'rewrite' => array('slug' => 'reviews'),
						'supports' => array('title', 'editor', 'page-attributes')
				)
		);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

register_taxonomy(
            'skill_tag',
            'skills',
            array(
                'hierarchical'  => true,
                'label'         => __( 'Tags for skills', 'ilyaonline' ),
                'singular_name' => __( 'Tag for skills', 'ilyaonline' ),
                'rewrite'       => true,
                'query_var'     => true
            )
        );
register_taxonomy(
            'skill_tag_importance',
            'skills',
            array(
                'hierarchical'  => true,
                'label'         => __( 'Skill importance tags', 'ilyaonline' ),
                'singular_name' => __( 'Skill importance tag', 'ilyaonline' ),
                'rewrite'       => true,
                'query_var'     => true
            )
        );

// fix bug when custom posts archive pagination does not work on page 2 and subsequent
$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'my_modify_posts_per_page', 0);
function my_modify_posts_per_page() {
	add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
}
function my_option_posts_per_page( $value )
{
	global $option_posts_per_page;
	if ( is_tax( 'skill_tag') ) {
		return 1;
	} elseif (is_post_type_archive('skills')) {
		return 99;
	} else {
		return $option_posts_per_page;
	}
}

// sort skills in order of importance
function homepage_posts($query)
{
    if ( $query->is_tax( 'skill_tag') )
    {
        $query->set( 'orderby', ['menu_order'=> 'DESC'] );
    }
}
add_action('pre_get_posts', 'homepage_posts');
