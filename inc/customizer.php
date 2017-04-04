<?php
/**
 * portafolio Theme Customizer
 *
 * @package portafolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function portafolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->add_setting(
		'portafolio_bio_text',
		array (
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => '',
		)
	);
	$wp_customize->add_control(
		'portafolio_bio_text',
		array(
			'type' => 'textarea',
			'priority' => 10,
			'section' => 'title_tagline',
			'label' => __( 'Bio' )
		)
	);
}
add_action( 'customize_register', 'portafolio_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function portafolio_customize_preview_js() {
	wp_enqueue_script( 'portafolio_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'portafolio_customize_preview_js' );
