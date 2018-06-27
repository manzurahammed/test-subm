<?php
//////////////////////////////////////////////////////////////////
// Customizer - Add CSS
//////////////////////////////////////////////////////////////////

function geo_customizer_style() {
	$intro_block_border = get_theme_mod('geo_primary_color');
	if($intro_block_border == ''){
		$intro_block_border = '#00c0ff';
	}
	$intro_block_border = geo_Hex2RGB($intro_block_border,.3);
    ?>
    <style type="text/css">
		body,
		.intro,
		.more-feature, 
		.description,
		.screenshot,
		.team, 
		.review, 
		.subscribe,
		header,
		.blog-page,
		header .navbar-default {
			background: <?php echo get_theme_mod('geo_body_bg'); ?> !important;
		}
		.price-plan,
		.faq-block,
		.contact-form .form-control,
		.single-post,
		.widget,
		.comment-block, .dark .comment-respond		{
			background: <?php echo get_theme_mod('geo_pricing_table_bg'); ?> !important;
		}
		.price-plan li,
		.faq-block p,
		.faq-block h5,
		.single-post,
		.single-post .post-title,
		.single-post .posted-on a,
		.widget ul li a,
		.dark .navbar-default .navbar-nav > li > a {
			color: <?php echo get_theme_mod('geo_pricing_table_color'); ?> !important;
		}
		a:hover,
		a:focus,
		header .navbar-default .navbar-nav > .current > a, 
		header .navbar-default .navbar-nav > .current > a:hover, 
		header .navbar-default .navbar-nav > .current > a:focus,
		.section-title,
		.navbar-default .navbar-nav > li a:hover,
		.navbar-default .navbar-nav .has-sub-menu > .sub-menu li a:hover,
		.intro-block:hover .icon .fa,
		.item-lists .icon .fa,
		.feature-lists ul li span .fa,
		.single-counter p,
		.desc-tab .nav.nav-tabs li .fa,
		.team-title h4,
		.reviewer h5,
		.newsletter-success,
		.newsletter-error,
		.small-heading h4,
		.paging-navigation a,
		.entry-meta a,
		.post-author-info h6,
		.comment-list h6,
		.footer .social-icon-circle a:hover,
		.dark header .navbar-default .navbar-nav > .current > a,
		.dark header .navbar-default .navbar-nav > .current > a:hover,
		.dark header .navbar-default .navbar-nav > .current > a:focus,
		#go-to-top .fa {
			color: <?php echo get_theme_mod('geo_primary_color'); ?>;
		}
		.entry-meta a {
			color: <?php echo get_theme_mod('geo_primary_color'); ?> !important;
		}
		
		.separator:before,
		.separator:after,
		.navbar-default .navbar-nav .has-sub-menu.mobile .sub-trigger,
		.banner-content .download-block .btn,
		.intro-block .icon .fa,
		.desc-tab > .nav-tabs > .active > a,
		.desc-tab > .nav-tabs > .active > a:hover,
		.desc-tab > .nav-tabs > .active > a:focus,
		.owl-controls .owl-dot.active span,
		.price-header .fa,
		.price-btn,
		.download-store a,
		.newsletter-signup input[type='submit'],
		.contact-form .btn,
		.single-post .read-more,
		.paging-navigation a,
		.paging-navigation span,
		.team-block:hover .social-icon-circle a,
		.social-share-btn a,
		.comment-respond .btn {
			background: <?php echo get_theme_mod('geo_primary_color'); ?>;
		}
		.intro-block .icon,
		.item-lists .icon,
		.comment-author img,
		.video-mask > div {
			background: <?php echo esc_attr($intro_block_border); ?>;
		}
		.desc-tab .nav.nav-tabs li .fa,
		.team-block		{
			border-color: <?php echo esc_attr($intro_block_border); ?>;
		}
		.social-icon-circle a {
			background: <?php echo get_theme_mod('geo_primary_color'); ?>;
			opacity: 0.6;
		}
		.social-icon-circle a,
		.desc-tab > .nav-tabs > li > a,
		.desc-tab > .nav-tabs > li > a:hover, .desc-tab > .nav-tabs > li > a:focus,
		#go-to-top .fa,
		.blog-comments .form-control		{
			border-color: <?php echo get_theme_mod('geo_primary_color'); ?> !important;
		}
		.team-block:hover .team-man {
			box-shadow: 0px 0px 0px 6px <?php echo get_theme_mod('geo_primary_color'); ?>;
		}
		.price-header .fa,
		.team-block .team-man,
		.social-icon-circle a,
		.reviewer-img {
			box-shadow: 0px 0px 0px 6px <?php echo esc_attr($intro_block_border); ?>;
		}
		.separator {
			background: <?php echo get_theme_mod('geo_secondary_color'); ?>;
		}
		#go-to-top .fa:hover {
			color: <?php echo get_theme_mod('geo_secondary_color'); ?>;
		} 
		#go-to-top .fa:hover {
			border-color: <?php echo get_theme_mod('geo_secondary_color'); ?> !important;
		}
		
    </style>
    <?php
}

add_action( 'wp_head', 'geo_customizer_style' );

?>