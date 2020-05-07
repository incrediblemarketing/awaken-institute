<?php
/**
 * Custom Gallery Procedure
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

function cptui_register_my_taxes_gallery_procedures() {

	/**
	 * Taxonomy: Gallery Procedures.
	 */

	$labels = array(
		'name'          => __( 'Gallery Procedures', 'custom-post-type-ui' ),
		'singular_name' => __( 'Gallery Procedure', 'custom-post-type-ui' ),
	);

	$args = array(
		'label'                 => __( 'Gallery Procedures', 'custom-post-type-ui' ),
		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'hierarchical'          => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'query_var'             => true,
		'rewrite'               => array(
			'slug'       => 'gallery_procedures',
			'with_front' => true,
		),
		'show_admin_column'     => false,
		'show_in_rest'          => true,
		'rest_base'             => 'gallery_procedures',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
		'show_in_quick_edit'    => false,
	);
	register_taxonomy( 'gallery_procedures', array( 'gallery' ), $args );
}
add_action( 'init', 'cptui_register_my_taxes_gallery_procedures' );
