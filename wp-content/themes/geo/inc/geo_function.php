<?php
/**
 * The template for custom function
 *
 * @package WordPress
 * @subpackage GEO
 * @since GEO 1.0
 */
?>
<?php 

/*-----------------------------------------------------
 * 				Breadcrumbs
 *----------------------------------------------------*/
 
if ( ! function_exists( 'geo_breadcrumbs' ) ) :
function geo_breadcrumbs() {
	echo '<ul class="breadcrumb">';	
	$home = '<li><a href="'.esc_url(home_url()).'" title="'.esc_html__('Home','geo').'">'.esc_html__('Home','geo').'</a></li>';
	$showCurrent = 1;				
	global $post;
	$homeLink = esc_url(home_url());
	print($home);
  	if(is_front_page()){
		if(is_home()){
			$wp_title_temp = wp_title('',false);
			if($wp_title_temp == '')
			{
				echo '<li>' .esc_html__('Blog', 'geo'). '</li>';
			}else{
				if ($showCurrent) echo '<li>' .wp_title('',false). '</li>';
			}
			
		}else{
			return; // don't display breadcrumbs on the homepage (yet)
		}
	}else {
		if(is_home()){
			$wp_title_temp = wp_title('',false);
			if($wp_title_temp == '')
			{
				echo '<li>' .esc_html__('Blog', 'geo'). '</li>';
			}else{
				if ($showCurrent) echo '<li>' .wp_title('',false). '</li>';
			}
			
		}	
	}

    if ( is_category() ) {
		// category section
		$thisCat = get_category(get_query_var('cat'), false);
		if (!empty($thisCat->parent)) echo get_category_parents($thisCat->parent, TRUE, ' ' . '/' . ' ');
		echo '<li>'. esc_html__('Archive for category','geo').' "' . single_cat_title('', false) . '"' . '</li>';
    } elseif ( is_search() ) {
		// search section
		echo '<li>' . esc_html__('Search results for','geo').' "' . get_search_query() . '"' .'</li>';
    } elseif ( is_day() ) {
		echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
		echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> </li>';
		echo '<li>' . get_the_time('d') .'</li>';
    } elseif ( is_month() ) {
		// monthly archive
		echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> </li>';
		echo '<li>' . get_the_time('F') .'</li>';
    } elseif ( is_year() ) {
		// yearly archive
		echo '<li>'. get_the_time('Y') .'</li>';
    } elseif ( is_single() && !is_attachment() ) {
		// single post or page
		if ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<li><a href="' . $homeLink . ' ' . $slug['slug'] . '">' . $post_type->labels->singular_name . '</a></li>';
			if ($showCurrent) echo ' <li>'. get_the_title() .'</li>';
		} else {
			$cat = get_the_category(); if (isset($cat[0])) {$cat = $cat[0];} else {$cat = false;}
			if ($cat) {$cats = get_category_parents($cat, TRUE, ' ' .' ' . ' ');} else {$cats=false;}
			if (!$showCurrent && $cats) $cats = preg_replace("#^(.+)\s\s$#", "$1", $cats);
			echo '<li>' .$cats.'</li>';
			if ($showCurrent) echo '<li>' . get_the_title() .'</li>';
		}
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
		// some other single item
		$post_type = get_post_type_object(get_post_type());
		echo '<li>' . $post_type->labels->singular_name .'</li>';
	} elseif ( is_attachment() ) {
		// attachment section
		$parent = get_post($post->post_parent);
		$cat = get_the_category($parent->ID); if (isset($cat[0])) {$cat = $cat[0];} else {$cat=false;}
		if ($cat) echo get_category_parents($cat, TRUE, ' ' . ' ' . ' ');
		echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';
		if ($showCurrent) echo  '<li>' . get_the_title() . '</li>';
    } elseif ( is_page() && !$post->post_parent ) {
		if ($showCurrent) echo '<li>' . get_the_title() . '</li>';
    } elseif ( is_page() && $post->post_parent ) {
		// child page
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
			$parent_id  = $page->post_parent;
		}
		$breadcrumbs = array_reverse($breadcrumbs);
		for ($i = 0; $i < count($breadcrumbs); $i++) {
			print $breadcrumbs[$i];
			if ($i != count($breadcrumbs)-1);
		}
		if ($showCurrent) echo '<li>' . get_the_title() . '</li>';
    } elseif ( is_tag() ) {
		// tags archive
		echo '<li>' . esc_html__('Posts tagged','geo').' "' . single_tag_title('', false) . '"' . '</li>';
    } elseif ( is_author() ) {
		// author archive 
		global $author;
		$userdata = get_userdata($author);
		echo '<li>' . esc_html__('Articles posted by','geo'). ' ' . $userdata->display_name . '</li>';
    } elseif ( is_404() ) {
		// 404
		echo '<li>' . esc_html__('Not Found','geo') .'</li>';
    }
  
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '<li> (';
			echo esc_html__('Page','geo') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')</li>';
    }
  
    echo '</ul>';
}
endif; 



if(!function_exists('geo_post_share')){
	function geo_post_share(){
		global $post;
		// Get current page URL 
		$crunchifyURL = get_permalink();
	 
		// Get current page title
		$crunchifyTitle = str_replace( ' ', '%20', get_the_title());
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
		?>
		<div class="social-share-btn">
			<a class="facebook" href="<?php echo esc_url($facebookURL); ?>" target="_blank"><?php esc_html_e('FACEBOOK','geo'); ?></a>
			<a class="twitter" href="<?php echo esc_url($twitterURL); ?>" target="_blank"><?php esc_html_e('TWITTER','geo'); ?></a>
			<a class="google" href="<?php echo esc_url($googleURL); ?>" target="_blank"><?php esc_html_e('GOOGLE+','geo'); ?></a>
		</div>
		<?php
	}
}

/*-----------------------------------------------------
 * 				Post Share 
 *----------------------------------------------------*/

if(!function_exists('geo_footer_social')){
	function geo_footer_social(){
		$facebook = get_theme_mod('facebook');
		$twitter = get_theme_mod('twitter');
		$linkedin = get_theme_mod('linkedin');
		$html = '';
		if($facebook !=''){
			$html .= '<a href="'.esc_url($facebook).'"><i class="fa fa-facebook"></i></a>';
		}
		if($twitter !=''){
			$html .= '<a href="'.esc_url($twitter).'"><i class="fa fa-twitter"></i></a>';
		}
		if($linkedin !=''){
			$html .= '<a href="'.esc_url($linkedin).'"><i class="fa fa-linkedin"></i></a>';
		}
		print $html;
	}
}

/*-----------------------------------------------------
 * 				Preloder 
 *----------------------------------------------------*/

function geo_preloder(){
	$value = get_theme_mod('pre_loder');
	$logo = get_theme_mod('header_logo');
	if($value ==1){
		$html = '<div class="preloader-wrapper">';
			$html .= '<div>';
				if(!empty($logo)){
					$html .= '<img src="'.$logo.'" alt="'.esc_attr__('LOGO', 'geo').'" />';
				}
				
				$html .= '<div class="preloader">';
					$html .= '<i>.</i>';
					$html .= '<i>.</i>';
					$html .= '<i>.</i>';
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';
print $html;
	}
	
}

/*-----------------------------------------------------
 * 				Theme Color Change 
 *----------------------------------------------------*/

function geo_theme_variation(){
	$color = get_theme_mod('theme_variation');
	$class = '';
	if($color=='dark'){
		$class = 'dark';
	}
	return $class;
}

/*-----------------------------------------------------
 * 				Add Class In body_class
 *----------------------------------------------------*/

add_filter( 'body_class','geo_body_classes' );
function geo_body_classes( $classes ) {
	if(geo_theme_variation() !=''){
		$classes[] = geo_theme_variation();
	}
    return $classes;
}


function geo_demo_import_files() {
	return array(
		array(
		  'import_file_name'             => esc_html__('Geo Demo Data','finsult'),
		  'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo_data/geo.demo-content.xml',
		  'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo_data/geo_widgets.json',
		  'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo_data/geo_customizer.dat',
		  'import_preview_image_url'     => esc_url('http://themerail.com/wp/preview_image/screenshot.jpg'),
		  'import_notice'                => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'geo' ),
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'geo_demo_import_files');