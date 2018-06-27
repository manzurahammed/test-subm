<?php
//////////////////////////////////////////////////////////////////
// Customizer - Add CSS
//////////////////////////////////////////////////////////////////

function geo_customizer_sgbg() {
	
	$solid_overlay = get_theme_mod('geo_solid_bg_color');
	if($solid_overlay == ''){
		$solid_overlay = '#000000';
	}
	$section_solid_overlay = geo_Hex2RGB($solid_overlay,.5);
	$price_table_overlay = geo_Hex2RGB($solid_overlay,1);
	
    ?>
    <style type="text/css">
		
		.color-overlay,
		.page-sub-header .color-overlay {
			background: <?php echo $section_solid_overlay; ?>;
		}
		.price-header,
		.team-block:before {
			background: <?php echo $price_table_overlay; ?>;
		}
		
    </style>
    <?php
}
add_action( 'wp_head', 'geo_customizer_sgbg' );

?>