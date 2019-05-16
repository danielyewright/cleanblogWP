<?php
/**
 * Bootstrap WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Clean_Blog_WP
 */

if ( ! function_exists( 'cleanblog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cleanblog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bootstrap WP, use a find and replace
		 * to change 'cleanblog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cleanblog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add support for wide alignment of images
		add_theme_support( 'align-wide' );

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
			'menu-1' => esc_html__( 'Primary', 'cleanblog' ),
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
		add_theme_support( 'custom-background', apply_filters( 'cleanblog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'cleanblog' ),
					'shortName' => __( 'S', 'cleanblog' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'cleanblog' ),
					'shortName' => __( 'M', 'cleanblog' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'cleanblog' ),
					'shortName' => __( 'L', 'cleanblog' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'cleanblog' ),
					'shortName' => __( 'XL', 'cleanblog' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'cleanblog' ),
					'slug'  => 'primary',
					'color' => cleanblog_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => __( 'Secondary', 'cleanblog' ),
					'slug'  => 'secondary',
					'color' => cleanblog_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'cleanblog' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'cleanblog' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'cleanblog' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'cleanblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cleanblog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'cleanblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'cleanblog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cleanblog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cleanblog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cleanblog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cleanblog_widgets_init' );

function cleanblog_custom_comments_callback( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>

	<li id="li-comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div id="comment-<?php comment_ID(); ?>" class="media comment">
			<img src="<?php echo esc_url( get_avatar_url( $comment ) ); ?>" class="align-self-start mr-3 comment-avi" alt="<?php ?>">
			<div class="media-body">
				<h5 class="mt-0"><?php the_author(); ?></h5>
				<div class="comment-meta">
					<small><?php the_date( 'F j, Y' ); ?> at <?php the_time(); ?> .::. <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'cleanblog' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></small>
				</div>
				<?php comment_text(); ?>
			</div>
		</div>
	<?php
}

/**
 * Custom Pagination
 */
function pagination_nav() {
	global $wp_query;
	$total = $wp_query->max_num_pages;

	if ( $total > 1 ) :
		if ( get_next_posts_link() ) : ?>
			<span class="pagination-next float-right"><?php next_posts_link( __( 'Older posts &rarr;', 'cleanblog' ), $total ); ?></span>
		<?php endif;

		if ( get_previous_posts_link() ) : ?>
			<span class="pagination-prev float-left"><?php previous_posts_link( __( '&larr; Newer posts', 'cleanblog' ), 0 ); ?></span>
		<?php endif;
	endif;

	wp_reset_postdata();
}

function adjacent_posts_nav() {
	$next_post = get_adjacent_post( true, '', false );
	$prev_post = get_adjacent_post( true, '', true );
	?>

	<div class="post-nav row">
		<?php
		if ( is_a( $prev_post , 'WP_Post' ) ) : ?>
			<div class="col text-left">
				<p class="lead">&mdash; Previous Post</p>
				<a class="post-nav-prev" href="<?php echo get_permalink( $prev_post->ID ); ?>">
					<section class="post-nav-teaser">
						<h4 class="post-nav-title"><?php echo get_the_title( $prev_post->ID ); ?></h4>
					</section>
				</a>
			</div>
			<?php 
		
		endif;

		if ( is_a( $next_post, 'WP_Post' ) ) : ?>
			<div class="col text-right">
				<p class="lead">Next Post &mdash;</p>
				<a class="post-nav-prev" href="<?php echo get_permalink( $next_post->ID ); ?>">
					<section class="post-nav-teaser">
						<h4 class="post-nav-title"><?php echo get_the_title( $next_post->ID ); ?></h4>
					</section>
				</a>
			</div>
			<?php 
		endif; 
		?>

		<div class="clearfix"></div>
		<hr>
	</div>
	<?php
}

/**
 * Custom post excerpt
 */
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Enqueue scripts and styles.
 */
function cleanblog_scripts() {
	// wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_enqueue_style( 'bootstrap-css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css', array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_enqueue_style( 'fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css', array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_enqueue_style( 'cleanblog-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_style_add_data( 'cleanblog-style', 'rtl', 'replace' );

	wp_deregister_script( 'jquery' );
	// wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.3.1.slim.min.js', array(), wp_get_theme()->get( 'Version' ), true );
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array(), wp_get_theme()->get( 'Version' ), true );
	// wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'cleanblog-scripts', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cleanblog_scripts' );

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
 * Custom navwalker for Bootstrap 4 navigation menus.
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
