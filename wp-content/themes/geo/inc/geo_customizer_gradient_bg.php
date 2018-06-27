<?php
//////////////////////////////////////////////////////////////////
// Customizer - Add CSS
//////////////////////////////////////////////////////////////////

function geo_customizer_gradient_bg() {
	
	$gradient_overlay1 = get_theme_mod('geo_gradient_color1');
	if($gradient_overlay1 == '') {
		$gradient_overlay1 = '213544';
	}
	$section_gradient_overlay1 = geo_Hex2RGB($gradient_overlay1,.5);
	
	$gradient_overlay2 = get_theme_mod('geo_gradient_color2');
	if($gradient_overlay2 == '') {
		$gradient_overlay2 = '213544';
	}
	$section_gradient_overlay2 = geo_Hex2RGB($gradient_overlay2,.5);
	
	$gradient_overlay3 = get_theme_mod('geo_gradient_color3');
	if($gradient_overlay3 == '') {
		$gradient_overlay3 = '213544';
	}
	$section_gradient_overlay3 = geo_Hex2RGB($gradient_overlay3,.5);
	
    ?>
    <style type="text/css">
		
		.color-overlay,
		.page-sub-header .color-overlay	{
			background: linear-gradient(-90deg, <?php echo $section_gradient_overlay1; ?> 23.12%, <?php echo $section_gradient_overlay2; ?> 35.84%, <?php echo $section_gradient_overlay3; ?> 57.83%);
		}
		.price-header,
		.team-block:before {
			background: linear-gradient(-90deg, <?php echo $section_gradient_overlay1; ?> 23.12%, <?php echo $section_gradient_overlay2; ?> 35.84%, <?php echo $section_gradient_overlay3; ?> 57.83%);
		}
		
    </style>
    <?php
}
add_action( 'wp_head', 'geo_customizer_gradient_bg' );

?>