<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<div class="related products">

		<h2><?php _e( 'Related Products', 'geo' ); ?></h2>

		<div class="row">

			<?php 
				$count = 0;
				foreach ( $related_products as $related_product ) : 
				
					$post_object = get_post( $related_product->get_id() );
					setup_postdata( $GLOBALS['post'] =& $post_object );
					
					if($count%4==0) {
						echo '</div><div class="row">';
					}
					wc_get_template_part( 'content', 'product' );
					$count++;
				endforeach; // end of the loop. ?>

		</div>
	</div>
<?php endif;

wp_reset_postdata();
