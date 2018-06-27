<?php
/**
 * GEO functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage GEO
 * @since GEO 1.0
 */

/**
 * GEO only works in WordPress 4.4 or later.
 */
 
 

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own geo_setup() function to override in a child theme.
 *
 * @since GEO 1.0
 */
 /*-----------------------------------------------------
 * 				Define Default Constants
 *----------------------------------------------------*/
if( !defined('GEO') ){

	$themename = get_option( 'stylesheet' ); 
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	define( 'GEO', $themename );
}

define( 'GEO_THEME_DIR', get_template_directory() );
define( 'GEO_THEME_URI', get_template_directory_uri() );
define( 'GEO_THEME_SUB_DIR', GEO_THEME_DIR.'/inc/' );
define( 'GEO_THEME_CSS_DIR', GEO_THEME_URI.'/css/' );
define( 'GEO_THEME_JS_DIR', GEO_THEME_URI.'/js/' );

/*-----------------------------------------------------
 * 				Load Require File 
 *----------------------------------------------------*/
 
require_once GEO_THEME_SUB_DIR.'geo_function.php';
require_once GEO_THEME_SUB_DIR.'geo_customizer_switch.php';
require_once GEO_THEME_SUB_DIR.'geo_wp_bootstrap_navwalker.php';
require_once GEO_THEME_SUB_DIR.'class-tgm-plugin-activation.php';
require_once GEO_THEME_SUB_DIR.'geo_add_plugin.php';
require_once GEO_THEME_SUB_DIR.'geo_customizer.php';
require_once GEO_THEME_SUB_DIR.'geo_customizer_style.php';
require_once GEO_THEME_SUB_DIR.'geo_fontawesome_helper.php';

$sgbg = get_theme_mod('solid_gradient_option');

if($sgbg == 'solid') {
	require_once GEO_THEME_SUB_DIR.'geo_customizer_solid_bg.php';
}

if($sgbg == 'gradient') {
	require_once GEO_THEME_SUB_DIR.'geo_customizer_gradient_bg.php';
}

/*-----------------------------------------------------
 * 				Define Plugin Activation
 *----------------------------------------------------*/
 
define( 'GEO_CONTACT_FORM_ACTIVED', in_array( 'contact-form-7/wp-contact-form-7.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'GEO_CMB2_ACTIVED', in_array( 'cmb2/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'GEO_MAILCHIMP_ACTIVED', in_array( 'mailchimp-for-wp/mailchimp-for-wp.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'GEO_PlUGIN_ACTIVED', in_array( 'geo-custom-post/geo_custom_post.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

/*-----------------------------------------------------
 * 				Load CMB2 File
 *----------------------------------------------------*/
 
if(GEO_CMB2_ACTIVED){
	require_once GEO_THEME_SUB_DIR.'geo_metabox.php';
}

/*-----------------------------------------------------
 * 				GEO Theme Setup
 *----------------------------------------------------*/
 
if ( ! function_exists( 'geo_setup' ) ) :
	function geo_setup(){
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on GEO, use a find and replace
		 * to change 'geo' to the name of your theme in all the template files
		 */
		// * Load Language File *//
		load_theme_textdomain( 'geo', get_template_directory() . '/languages' );
		
		add_theme_support( 'menus' );
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'woocommerce' );
		
		//*set image size *//
		add_image_size('geo_blog_post_thumb',870,250,true);
		add_image_size('geo_single_post_thumb',870,250,true);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for custom logo.
		 *
		 *  @since  GEO 1.1
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'geo'),
			'footer'  => esc_html__( 'Footer Menu', 'geo'),
		) );
		// Editor Style
		add_editor_style('');
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
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif; // geo_setup
add_action( 'after_setup_theme', 'geo_setup' );

/*-----------------------------------------------------
 * 				Define  Content Width
 *----------------------------------------------------*/

function geo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'geo_content_width', 900 );
}
add_action( 'after_setup_theme', 'geo_content_width', 0 );

/*-----------------------------------------------------
 * 				Load  Style And Script
 *----------------------------------------------------*/

function geo_enqueue_styles_scripts(){
	
	//add style
	wp_enqueue_style('geo',get_stylesheet_uri());
	wp_enqueue_style( 'pre-loader', GEO_THEME_CSS_DIR . 'pre-loader.css', array() );
	wp_enqueue_style( 'bootstrap', GEO_THEME_CSS_DIR . 'bootstrap.min.css', array() );
	wp_enqueue_style( 'font-awesome', GEO_THEME_CSS_DIR . 'font-awesome.css', array() );
	wp_enqueue_style( 'owl.carousel', GEO_THEME_CSS_DIR . 'owl.carousel.css', array() );
	wp_enqueue_style( 'animate', GEO_THEME_CSS_DIR . 'animate.min.css', array() );
	wp_enqueue_style( 'magnific-popup', GEO_THEME_CSS_DIR . 'magnific-popup.css', array() );
	wp_enqueue_style( 'geo-style', GEO_THEME_CSS_DIR . 'style.css', array() );
	wp_enqueue_style( 'geo-style-dark', GEO_THEME_CSS_DIR . 'style-dark.css', array() );
	wp_enqueue_style( 'geo-woocommerce-style', GEO_THEME_CSS_DIR . 'woocommerce.css', array() );
	wp_enqueue_style( 'geo-responsive', GEO_THEME_CSS_DIR . 'responsive.css', array() );

	
	//add script
	
	wp_enqueue_script('bootstrap',GEO_THEME_JS_DIR.'bootstrap.min.js',array('jquery'),false,true);
	wp_enqueue_script('jquery.magnific-popup',GEO_THEME_JS_DIR.'jquery.magnific-popup.js',array('jquery'),false,true);
	wp_enqueue_script('matchMedia',GEO_THEME_JS_DIR.'matchMedia.js',array('jquery'),false,true);
	wp_enqueue_script('jquery.stellar',GEO_THEME_JS_DIR.'jquery.stellar.js',array('jquery'),false,true);
	wp_enqueue_script('owl.carousel',GEO_THEME_JS_DIR.'owl.carousel.js',array('jquery'),false,true);
	wp_enqueue_script('jquery.flexslider-min',GEO_THEME_JS_DIR.'jquery.flexslider-min.js',array('jquery'),false,true);
	$smooth = get_theme_mod('smooth')?get_theme_mod('smooth'):false;
	if($smooth){
		wp_enqueue_script('SmoothScroll',GEO_THEME_JS_DIR.'smoothscroll.js',array('jquery'),false,true);
	}
	wp_enqueue_script('jquery.scrollTo.min',GEO_THEME_JS_DIR.'jquery.scrollTo.min.js',array('jquery'),false,true);
	wp_enqueue_script('jquery.localScroll',GEO_THEME_JS_DIR.'jquery.localScroll.js',array('jquery'),false,true);
	wp_enqueue_script('jquery.nav',GEO_THEME_JS_DIR.'jquery.nav.js',array('jquery'),false,true);
	wp_enqueue_script('counter',GEO_THEME_JS_DIR.'counter.js',array('jquery'),false,true);
	wp_enqueue_script('modernizr',GEO_THEME_JS_DIR.'modernizr-2.8.3.min.js',array('jquery'),false,false);
	wp_enqueue_script('wow',GEO_THEME_JS_DIR.'wow.js',array('jquery'),false,false);
	wp_enqueue_script('geo-custom',GEO_THEME_JS_DIR.'custom.js',array('jquery'),false,false);

	//reply comments
	if ( is_singular() && comments_open() && get_option('thread_comments') ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts','geo_enqueue_styles_scripts');



/*-----------------------------------------------------
 * 				Text Content Excerpt
 *----------------------------------------------------*/
 
if(!function_exists('geo_new_excerpt_more')){
	function geo_new_excerpt_more( $more ) {
		return '';
	}
	add_filter('excerpt_more', 'geo_new_excerpt_more');
}

if(!function_exists('geo_custom_excerpt_length')){
	function geo_custom_excerpt_length($length) {
		global $post;
		if ($post->post_type == 'post')
			return 35;
	}
	add_filter('excerpt_length', 'geo_custom_excerpt_length');
}

/*-----------------------------------------------------
 * 				Coomment List
 *----------------------------------------------------*/

if(!function_exists('geo_comments')){
	
	function geo_comments($comment,$args,$depth){
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
		?>
		<li class="comment parent" id="comments-<?php comment_ID(); ?>">
			<article class="comment-body">
				<div class="comment-meta">
					<div class="comment-author">
						<?php  echo get_avatar( $comment,80,null,null,array('class'=>array('avatar'))); ?>
					</div><!-- /.comment-author -->
				</div><!-- /.comment-meta -->
				<div>
					<div class="comment-metadata">
						<h6 class="author">
							<?php echo get_comment_author_link(); ?>
						</h6><!-- /.comment-author -->
						<span class="comment-time">
							<?php comment_time('d M, Y'); ?>
						</span>
					</div><!-- /.comment-metadata -->

					<div class="comment-content">
						<p> 
							<?php comment_text(); ?>
						</p>
					</div><!-- .comment-content -->
					<p><?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'],'reply_text'=>'<i class="fa fa-mail-reply"></i> Reply' ) ) ); ?></p>
				</div>
			</article><!-- /.comment-body -->
			<div class="clearfix"></div>
		</li><!-- /.comment -->
		<?php
	}
}

/*-----------------------------------------------------
 * 				Register Widget
 *----------------------------------------------------*/

if(!function_exists('geo_register_sidebar')):

	function geo_register_sidebar()
	{
		register_sidebar(
			array( 			
				'name' 			=> esc_html__( 'Right Sidebar', 'geo' ),
				'id' 			=> 'right-sidebar',
				'description' 	=> esc_html__( 'Widgets in this area will be shown on Sidebar.', 'geo' ),
				'before_title' 	=> '<h6 class="widget-title">',
				'after_title' 	=> '</h6>',
				'before_widget' => '<aside class="widget m-bottom-30 %2$s">',
				'after_widget' 	=> '</aside>'
			)
		);
	}
	
	add_action('widgets_init','geo_register_sidebar');

endif;

/*-----------------------------------------------------
 * 				Deafult Menu
 *----------------------------------------------------*/

if(!function_exists('geo_primary_menu')){
	function geo_primary_menu(){
		echo '<ul class="nav navbar-nav navbar-right">
				<li><a href="'.esc_url(home_url('/')).'">'.esc_html__('Home','geo').'</a></li>
			  </ul>';
	}
}


/*-----------------------------------------------------
 * 				Customizer Data
 *----------------------------------------------------*/
 
 function geo_logo(){
	$my_theme = wp_get_theme();
	$logo = get_theme_mod('header_logo');
	if($logo == '')
	{
		$logo = get_template_directory_uri().'/images/logo.png';
	}
	echo '<a class="nav-brand" href="'.esc_url(home_url('/')).'"><img src="'.esc_attr($logo).'" title="'.$my_theme->get('Name').'" alt="'.$my_theme->get('Name').'"></a>';
}
 
 
function geo_footer_logo(){
	$my_theme = wp_get_theme();
	$logo = get_theme_mod('footer_logo');
	if($logo == '')
	{
		$logo = get_template_directory_uri().'/images/logo2.png';
	}
	echo '<img src="'.esc_attr($logo).'" title="'.$my_theme->get( 'Name' ).'" alt="'.$my_theme->get( 'Name' ).'">';
}
 
 
function geo_copyright(){
	$copyright = get_theme_mod('copy_right');
	if($copyright == '')
	{
		$copyright = esc_html__('APP LANDING PAGE DESIGN BY CODEPASSENGER 2016','geo');
	}else {
		$copyright = esc_html($copyright);
	}
	printf( '<p>%s</p>', $copyright );
}


/*-----------------------------------------------------
 * 				Theme Favicon
 *----------------------------------------------------*/

if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
	$fav_icon = get_template_directory_uri().'/images/favicon.ico';
}

/*-----------------------------------------------------
 * 				Load Background Image
 *----------------------------------------------------*/
 
if(!function_exists('geo_background_image_load')):
	function geo_background_image_load() {
		$play = get_template_directory_uri().'/images/play-btn.png';
		?>
			<style type="text/css">
				.play { background: rgba(255, 255, 255, 0.2) url('<?php echo esc_attr($play); ?>') no-repeat 60% 50% }
			</style>	
		<?php
	}	
	add_action('wp_print_styles', 'geo_background_image_load');
endif;

/*-----------------------------------------------------
 * 				Load Google Fonts
 *----------------------------------------------------*/

	if(!function_exists('geo_web_fonts_url')):
	function geo_web_fonts_url($font) {
		$font_url = '';

		if ( 'off' !== _x( 'on', 'Google font: on or off', 'geo' ) ) {
			$font_url = add_query_arg( 'family', urlencode($font), "//fonts.googleapis.com/css" );
		}
		return $font_url;
	}
	endif;
	
	if(!function_exists('geo_font_scripts')):
	function geo_font_scripts() {
		wp_enqueue_style( 'Roboto-web-font', geo_web_fonts_url('Roboto:400,500,700,300|Raleway:400,300,500,700,600'), array(), '1.0.0' );
	}
	endif;
	add_action( 'wp_enqueue_scripts', 'geo_font_scripts' );

/*-----------------------------------------------------
 * 				Page Title
 *----------------------------------------------------*/

if(!function_exists('geo_page_title')){
	function geo_page_title(){
		if(is_home() && is_front_page())
		{
			return esc_html_e('Blog Home','geo');
		}
		return wp_title($sep = '');
	}
}
/*-----------------------------------------------------
 * 				Filter Search Form
 *----------------------------------------------------*/

if(!function_exists('geo_search_form')){	
	function geo_search_form( $form ) {
		$form = '<form action="'. esc_url( home_url( '/' ) ).'" method="get" class="search-form">
					<input type="text" name="s" class="form-control" placeholder="'.esc_attr__('Search Here', 'geo').'" value="'.get_search_query().'">
					<button type="submit" name="search"><i class="fa fa-search"></i></button>
				</form>';
		return $form;
	}
	add_filter('get_search_form','geo_search_form');
}
/*-----------------------------------------------------
 * 				Add Class in Menu
 *----------------------------------------------------*/

	if(!function_exists('geo_menu_class')){
		function geo_menu_class(){
			$class = '';
			$fixed_nav = get_theme_mod('fixed_nav')?get_theme_mod('fixed_nav'):false;
			if($fixed_nav){
				$class .= 'navbar-fixed-top';
			}
			if(!is_home() && is_front_page() && $fixed_nav){
				$class .=  ' navbar-home';
			}
			print $class;
		}
	}
	
/*-----------------------------------------------------
 * 				Add Class in Menu
 *----------------------------------------------------*/

	if(!function_exists('geo_home_menu_class')){
		function geo_home_menu_class(){
			$class = '';
			$fixed_nav = get_theme_mod('fixed_nav');
			if($fixed_nav){
				$class .= 'navbar-home navbar-fixed-top';
			}
			print $class;
		}
	}
 
/*-----------------------------------------------------
 * 				Customizer Sanitize
 *----------------------------------------------------*/

if(!function_exists('geo_sanitize_integer')){
	function geo_sanitize_integer($input) {
		return intval( $input );
	}
}


/*-----------------------------------------------------
 * 				Tags List 
 *----------------------------------------------------*/

function geo_tags_list(){
	return the_tags( 'Tags: ', ', ', '<br />' );
}

/*-----------------------------------------------------
 * 				Hex2RGB
 *----------------------------------------------------*/
 
if(!function_exists('geo_Hex2RGB')) {

	function geo_Hex2RGB($color, $opacity=1){
		$color = str_replace('#', '', $color);
		if (strlen($color) != 6){ return array(0,0,0); }
		$rgb = array();
		for ($x=0;$x<3;$x++){
			$rgb[$x] = hexdec(substr($color,(2*$x),2));
		}
		$output = 'rgba('.$rgb[0].','.$rgb[1].','.$rgb[2].','.$opacity.')';
		return $output;
	}
}

/*-----------------------------------------------------
 * 				Comments nav
 *----------------------------------------------------*/

if ( ! function_exists( 'geo_comment_nav' ) ) :
    function geo_comment_nav() {
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="navigation comment-navigation">
            <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'geo'); ?></h2>
            <div class="nav-links">
                <?php
                    if ( $prev_link = get_previous_comments_link( esc_html__('Older Comments', 'geo') ) ) :
                        printf( '<div class="nav-previous">%s</div>', $prev_link );
                    endif;

                    if ( $next_link = get_next_comments_link( esc_html__('Newer Comments', 'geo') ) ) :
                        printf( '<div class="nav-next">%s</div>', $next_link );
                    endif;
                ?>
            </div><!-- .nav-links -->
        </nav><!-- .comment-navigation -->
        <?php
        endif;
    }
endif;