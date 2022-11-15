<?php
/**
 * Plugin Name: Hubspot Form Elementor
 * Description: Elementor widget: Adds a deferred Hubspot Form in-place
 * Version:     1.0.0
 * Author:      Izzy MG
 * Author URI:  https://izzymg.dev
 * Text Domain: hubspot-form-elementor
 */

function register_hubspot_form_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/hubspot-form-widget.php' );

	$widgets_manager->register( new \Elementor_Hubspot_Form_Widget() );

}
add_action( 'elementor/widgets/register', 'register_hubspot_form_widget' );
