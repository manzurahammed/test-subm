<?php 
	
/*-----------------------------------------------------
 * 				App Into Option 
 *----------------------------------------------------*/
function geo_app_Intro(array $app_intro){
	$app_intro[] = array(
		'id'           => 'app_intro',
		'title'        => esc_html__( 'Feature ', 'geo' ),
		'object_types' => array( 'app_intro'),
		'fields'       => array(
			array(
				'id'          => 'feature_list',
				'type'        => 'group',
				'options'     => array(
					'group_title'   => esc_html__( 'Feature {#}', 'geo' ),
					'add_button'    => esc_html__( 'Add Another Feature', 'geo' ),
					'remove_button' => esc_html__( 'Remove Feature', 'geo' ),
					'sortable'      => true,
				),
				'fields'      => array(
					array(
						'name' => esc_html__( 'Name', 'geo'),
						'id'   => 'name',
						'type' => 'text',
					),
					array(
						'name' => esc_html__('Select Font Awsome Class ','geo'),
						'type' => 'select',
						'id' => 'fc_icon',
						'options'     => getIconsList(),
						'attributes'  => array(	
							'required'    => 'required',
						),
					),
				),
			),
			array(
				'name' => esc_html__('App Hints','geo'),
				'id'   => 'app_hints',
				'type' => 'text',
			),
			array(
				'name' => esc_html__('Select Font Awsome Class ','geo'),
				'type' => 'select',
				'id' => 'title_icon',
				'options'     => getIconsList(),
				'attributes'  => array(	
					'required'    => 'required',
				),
			),
		),
	);
	return $app_intro;
}
add_filter('cmb2_meta_boxes','geo_app_Intro');