<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Geo for publication on ThemeForest
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */


add_action( 'tgmpa_register', 'geo_register_required_plugins' );


function geo_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'               => esc_html__('Geo Custom Post','geo'),
			'slug'               => 'geo-custom-post',
			'source'             => esc_url('http://themerail.com/wp/plugin/geo-plugin/geo-custom-post.zip'),
			'required'           => true,
			'version'            => '', 
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => esc_url('http://themerail.com/wp/plugin/geo-plugin/geo-custom-post.zip'), 
			'is_callable'        => '', 
		),
		array(
			'name'               => esc_html__('Geo Vc Addons','geo'),
			'slug'               => 'vc-addons-geo',
			'source'             => esc_url('http://themerail.com/wp/plugin/geo-plugin/vc-addons-geo.zip'),
			'required'           => true,
			'version'            => '', 
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => esc_url('http://themerail.com/wp/plugin/geo-plugin/vc-addons-geo.zip'),
			'is_callable'        => '', 
		),
		array(
			'name'               => esc_html__('CMB2','geo'),
			'slug'               => 'cmb2',
			'required'           => true,
			'force_activation'   => false,
			'force_deactivation' => false,
		),
		array(
			'name'               => esc_html__('One Click Demo Import','geo'),
			'slug'               => 'one-click-demo-import',
			'required'           => false, 
		),
		array(
			'name'               => esc_html__('Contact Form 7','geo'),
			'slug'               => 'contact-form-7',
			'required'           => false,
			'force_activation'   => false,
			'force_deactivation' => false,
		),
		array(
			'name'               => esc_html__('MailChimp for WordPress','geo'),
			'slug'               => 'mailchimp-for-wp',
			'required'           => false,
			'force_activation'   => false,
			'force_deactivation' => false,
		),
	);
	$config = array(
		'id'           => 'geo',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'geo' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'geo' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'geo' ),
			'updating'                        => esc_html__( 'Updating Plugin: %s', 'geo' ),
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'geo' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'geo'
			),
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'geo'
			),
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'geo'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'geo'
			),
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'geo'
			),
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'geo'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'geo'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'geo'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'geo'
			),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'geo' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'geo' ),
			'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'geo' ),
			'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'geo' ),
			'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'geo' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'geo' ),
			'dismiss'                         => esc_html__( 'Dismiss this notice', 'geo' ),
			'notice_cannot_install_activate'  => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'geo' ),
			'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'geo' ),
			'nag_type'                        => '', 
		),
	);
	tgmpa( $plugins, $config );
}
