<?php
/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Lombokmedia for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_stylesheet_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'lmd_tgm_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function lmd_tgm_register_required_plugins() {

	$plugins = array(
		/* Required
		array(
			'name'      => 'CMB2',
			'slug'      => 'cmb2',
			'required'	=> true,
		),  */
	
		/* Lombok Media recommend this plugins */
		array(
			'name'      => 'Classic Editor',
			'slug'      => 'classic-editor',
			'required'	=> false,
		),
		array(
			'name'      => 'Classic Widgets',
			'slug'      => 'classic-widgets',
			'required'	=> false,
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'	=> true,
		),
		array(
			'name'      => 'AddToAny',
			'slug'      => 'add-to-any',
			'required'	=> true,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 */
	$config = array(
		'id'           => 'lombokmedia',
		'default_path' => get_stylesheet_directory() . '/plugins/',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',

	);

	tgmpa( $plugins, $config );
}
