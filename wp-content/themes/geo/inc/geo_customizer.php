<?php 

function geo_customize_register( $geo_customize ) {
	
	$geo_customize->add_panel( 'geo_color_options', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          =>esc_html__('Theme Color', 'geo'),   
	) );
	
	$geo_customize->add_setting( 'header_logo' , array(
		'default'     => get_template_directory_uri().'/images/logo.png',
		'transport'   => 'refresh',
	) );
	
	$geo_customize->add_setting( 'footer_logo' , array(
		'default'     => get_template_directory_uri().'/images/logo2.png',
		'transport'   => 'refresh',
	) );
	
	$geo_customize->add_setting( 'copy_right' , array(
		'default'     => esc_html__('APP LANDING PAGE DESIGN BY CODEPASSENGER 2017','geo'),
		'transport'   => 'refresh',
	) );
	
	$geo_customize->add_setting( 'facebook' , array(
		'transport'   => 'refresh',
	) );
	$geo_customize->add_setting( 'twitter' , array(
		'transport'   => 'refresh',
	) );
	$geo_customize->add_setting( 'linkedin' , array(
		'transport'   => 'refresh',
	) );
	$geo_customize->add_setting( 'theme_variation' , array(
		'transport'   => 'refresh',
		'default'   => 'white',
	) );
	$geo_customize->add_setting( 'solid_gradient_option' , array(
		'transport'   => 'refresh',
		'default'   => 'gradient',
	) );
	
	$geo_customize->add_setting('pre_loder',array(
		'default' => '0',
		'sanitize_callback' => 'geo_sanitize_integer'
	));
	$geo_customize->add_setting('fixed_nav',array(
		'default' => '0',
		'sanitize_callback' => 'geo_sanitize_integer'
	));
	$geo_customize->add_setting('smooth',array(
		'default' => '0',
		'sanitize_callback' => 'geo_sanitize_integer'
	));
	$geo_customize->add_setting('post_category',array(
		'sanitize_callback' => 'geo_sanitize_integer'
	));
	$geo_customize->add_setting('post_tag',array(
		'default' => '1',
		'sanitize_callback' => 'geo_sanitize_integer'
	));
	
	$geo_customize->add_section( 'header_logo_section' , array(
		'title'      => esc_html__( 'Header Logo', 'geo' ),
		'priority'   => 10,
	) );
	
	$geo_customize->add_section( 'footer_section' , array(
		'title'      => esc_html__( 'Footer Section', 'geo' ),
		'priority'   => 100,
	) );
	
	$geo_customize->add_section( 'theme_control' , array(
		'title'      => esc_html__( 'Theme Control', 'geo' ),
		'priority'   => 100,
	) );
	
	$geo_customize->add_section( 'geo_bg_solid_color' , array(
		'title'      => esc_html__( 'Solid Color', 'geo' ),
		'priority'   => 105,
		'panel'		 => 'geo_color_options'
	) );
	
	$geo_customize->add_section( 'geo_bg_gradient_color' , array(
		'title'      => esc_html__( 'Gradient Color', 'geo' ),
		'priority'   => 105,
		'panel'		 => 'geo_color_options'
	) );
	
	
	$geo_customize->add_control( 
		new WP_Customize_Image_Control(
		   $geo_customize,
		   'header_logo',
		    array(
			   'label'      => esc_html__( 'Upload a logo', 'geo' ),
			   'section'    => 'header_logo_section',
			   'settings'   => 'header_logo',
		    )
    )   );
	
	
	$geo_customize->add_control(
		new WP_Customize_Image_Control(
		   $geo_customize,
		   'footer_logo',
		    array(
			   'label'      => esc_html__( 'Upload a logo', 'geo' ),
			   'section'    => 'footer_section',
			   'settings'   => 'footer_logo',
		    )
    )   );
	
	$geo_customize->add_control( 
		new WP_Customize_Control(
			$geo_customize,
			'facebook',
			array(
				'label'          => esc_html__( 'Facebook', 'geo' ),
				'section'        => 'footer_section',
				'settings'       => 'facebook',
				'type'           => 'text',

			)
		)
	); 

	$geo_customize->add_control( 
		new WP_Customize_Control(
			$geo_customize,
			'twitter',
			array(
				'label'          => esc_html__( 'Twitter', 'geo' ),
				'section'        => 'footer_section',
				'settings'       => 'twitter',
				'type'           => 'text',

			)
		)
	);
	
	$geo_customize->add_control( 
		new WP_Customize_Control(
			$geo_customize,
			'linkedin',
			array(
				'label'          => esc_html__( 'Linkedin', 'geo' ),
				'section'        => 'footer_section',
				'settings'       => 'linkedin',
				'type'           => 'text',

			)
		)
	);
	
	$geo_customize->add_control( 
		new WP_Customize_Control(
			$geo_customize,
			'copy_right',
			array(
				'label'          => esc_html__( 'Copy Right', 'geo' ),
				'section'        => 'footer_section',
				'settings'       => 'copy_right',
				'type'           => 'text',

			)
		)
	);
	
	$geo_customize->add_control(
		new Geo_Customize_Switch_Control(
			$geo_customize,
			'pre_loder',
			array(
				'type' => 'switch',
				'label' => esc_html__('Pre Loader','geo'),
				'description' => esc_html__('Pre Loder Control','geo'),
				'section' => 'theme_control'
			)
		)
	);
	
	$geo_customize->add_control(
		new Geo_Customize_Switch_Control(
			$geo_customize,
			'fixed_nav',
			array(
				'type' => 'switch',
				'label' => esc_html__('Sticky Navigation On/Off','geo'),
				'description' => esc_html__('Sticky Navigation Control','geo'),
				'section' => 'theme_control'
			)
		)
	);
	
	$geo_customize->add_control(
		new Geo_Customize_Switch_Control(
			$geo_customize,
			'smooth',
			array(
				'type' => 'switch',
				'label' => esc_html__('Smoothscroll On/Off','geo'),
				'description' => esc_html__('Smoothscroll Control','geo'),
				'section' => 'theme_control'
			)
		)
	);
	
	$geo_customize->add_control(
		new Geo_Customize_Switch_Control(
			$geo_customize,
			'post_category',
			array(
				'type' => 'switch',
				'label' => esc_html__('Post Category On/Off','geo'),
				'description' => esc_html__('Post Category Show','geo'),
				'section' => 'theme_control'
			)
		)
	);
	
	$geo_customize->add_control(
		new Geo_Customize_Switch_Control(
			$geo_customize,
			'post_tag',
			array(
				'type' => 'switch',
				'label' => esc_html__('Post Tag On/Off','geo'),
				'description' => esc_html__('Post Tag Show','geo'),
				'section' => 'theme_control'
			)
		)
	);
	
	$geo_customize->add_control( 
		new WP_Customize_Control(
			$geo_customize,
			'theme_variation',
			array(
				'label'          => esc_html__( 'Select Theme Color', 'geo' ),
				'section'        => 'theme_control',
				'settings'       => 'theme_variation',
				'type'           => 'select',
				'choices'  => array(
					'dark'  => esc_html__( 'Dark', 'geo' ),
					'white' => esc_html__( 'White', 'geo' ),
				),

			)
		)
	);

	$geo_customize->add_control( 
		new WP_Customize_Control(
			$geo_customize,
			'solid_gradient_option',
			array(
				'label'          => esc_html__( 'Select Solid/Gradient Background', 'geo' ),
				'section'        => 'theme_control',
				'settings'       => 'solid_gradient_option',
				'type'           => 'select',
				'choices'  => array(
					'solid'  => esc_html__( 'Solid', 'geo' ),
					'gradient' => esc_html__( 'Gradient', 'geo' ),
				),

			)
		)
	);
	
	// General Color Settings
	
	$geo_customize->add_setting (
		'geo_primary_color',
		array(
			'default'     => '#00c0ff'
		)
	);
	$geo_customize->add_setting (
		'geo_secondary_color',
		array(
			'default'     => '#ac4d9b'
		)
	);
	$geo_customize->add_setting (
		'geo_solid_bg_color',
		array(
			'default'     => '#000'
		)
	);
	$geo_customize->add_setting (
		'geo_body_bg',
		array(
			'default'     => '#fff'
		)
	);
	$geo_customize->add_setting (
		'geo_body_font_color',
		array(
			'default'     => '#636363'
		)
	);
	$geo_customize->add_setting (
		'geo_pricing_table_bg',
		array(
			'default'     => '#fff'
		)
	);
	$geo_customize->add_setting (
		'geo_pricing_table_color',
		array(
			'default'     => '#767676'
		)
	);
	$geo_customize->add_setting (
		'geo_gradient_color1',
		array(
			'default'     => '#767676'
		)
	);
	$geo_customize->add_setting (
		'geo_gradient_color2',
		array(
			'default'     => '#767676'
		)
	);
	$geo_customize->add_setting (
		'geo_gradient_color3',
		array(
			'default'     => '#767676'
		)
	);
	
	
	// General Color Control
	
	$geo_customize->add_control(
		new WP_Customize_Color_Control(
			$geo_customize,
			'geo_primary_color',
			array(
				'label'      => 'Primary Color',
				'section'    => 'geo_bg_solid_color',
				'settings'   => 'geo_primary_color',
			)
		)
	);
	$geo_customize->add_control(
		new WP_Customize_Color_Control(
			$geo_customize,
			'geo_secondary_color',
			array(
				'label'      => 'Secondary Color',
				'section'    => 'geo_bg_solid_color',
				'settings'   => 'geo_secondary_color',
			)
		)
	);
	$geo_customize->add_control(
		new WP_Customize_Color_Control(
			$geo_customize,
			'geo_solid_bg_color',
			array(
				'label'      => 'Solid Overlay',
				'section'    => 'geo_bg_solid_color',
				'settings'   => 'geo_solid_bg_color',
			)
		)
	);
	$geo_customize->add_control(
		new WP_Customize_Color_Control(
			$geo_customize,
			'geo_body_bg',
			array(
				'label'      => 'Body Background',
				'section'    => 'geo_bg_solid_color',
				'settings'   => 'geo_body_bg',
			)
		)
	);
	$geo_customize->add_control(
		new WP_Customize_Color_Control(
			$geo_customize,
			'geo_body_font_color',
			array(
				'label'      => 'Body Font Color',
				'section'    => 'geo_bg_solid_color',
				'settings'   => 'geo_body_font_color',
			)
		)
	);
	$geo_customize->add_control(
		new WP_Customize_Color_Control(
			$geo_customize,
			'geo_pricing_table_bg',
			array(
				'label'      => 'Pricing Table Background',
				'section'    => 'geo_bg_solid_color',
				'settings'   => 'geo_pricing_table_bg',
			)
		)
	);
	$geo_customize->add_control(
		new WP_Customize_Color_Control(
			$geo_customize,
			'geo_pricing_table_color',
			array(
				'label'      => 'Pricing Table Font Color',
				'section'    => 'geo_bg_solid_color',
				'settings'   => 'geo_pricing_table_color',
			)
		)
	);
	$geo_customize->add_control(
		new WP_Customize_Color_Control(
			$geo_customize,
			'geo_gradient_color1',
			array(
				'label'      => 'Gradient Color 1',
				'section'    => 'geo_bg_gradient_color',
				'settings'   => 'geo_gradient_color1',
			)
		)
	);
	$geo_customize->add_control(
		new WP_Customize_Color_Control(
			$geo_customize,
			'geo_gradient_color2',
			array(
				'label'      => 'Gradient Color 2',
				'section'    => 'geo_bg_gradient_color',
				'settings'   => 'geo_gradient_color2',
			)
		)
	);
	$geo_customize->add_control(
		new WP_Customize_Color_Control(
			$geo_customize,
			'geo_gradient_color3',
			array(
				'label'      => 'Gradient Color 3',
				'section'    => 'geo_bg_gradient_color',
				'settings'   => 'geo_gradient_color3',
			)
		)
	);
	
}
add_action('customize_register', 'geo_customize_register');