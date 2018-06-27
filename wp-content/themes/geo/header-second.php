<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php geo_preloder(); ?>
	<!-- header start -->
	<header id="header" class=" <?php geo_home_menu_class(); ?>">
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#geo-navbar-collapse">
						<span class="sr-only"><?php esc_html_e('Toggle navigation','geo'); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="nav-logo">
						<?php geo_logo(); ?>
					</div>
				</div>
				<div class="collapse navbar-collapse navbar-geo" id="geo-navbar-collapse">
					<?php 
						wp_nav_menu(array(
							'theme_location'=> 'primary',
							'menu_class' => 'nav navbar-nav navbar-right',
							'menu_id' => 'geo_menu',
							'container' => '',
							'fallback_cb' => 'geo_primary_menu',
							'walker' => new geo_wp_bootstrap_navwalker()
						));			
					?>
				</div>
			</div>
		</nav>
	</header>