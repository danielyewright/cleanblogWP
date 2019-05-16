<?php
/**
 * Bootstrap WP Theme Customizer
 *
 * @package Clean_Blog_WP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cleanblog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'cleanblog_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'cleanblog_customize_partial_blogdescription',
			)
		);
	}

	/**
	 * Add custom section to customizer
	 */
	$wp_customize->add_section(
		// $id
		'clean_blog_social_options',
		// $args
		array(
			'title' => __( 'Social Media Icons', 'cleanblog' ),
			'description' => __( 'Enter links to your social media profiles', 'cleanblog' ),
			'priority' => 120
		)
	);

	$wp_customize->add_setting(
		// $id
		'social_options_twitter',
		// $args
		array(
			'default' => '',
			'type' => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		// $id
		'social_options_twitter',
		// $args
		array(
			'label' => __( 'Twitter', 'cleanblog' ),
			'section' => 'clean_blog_social_options',
			'settings' => 'social_options_twitter',
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		// $id
		'social_options_facebook',
		// $args
		array(
			'default' => '',
			'type' => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		// $id
		'social_options_facebook',
		// $args
		array(
			'label' => __( 'Facebook', 'cleanblog' ),
			'section' => 'clean_blog_social_options',
			'settings' => 'social_options_facebook',
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		// $id
		'social_options_github',
		// $args
		array(
			'default' => '',
			'type' => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		// $id
		'social_options_github',
		// $args
		array(
			'label' => __( 'GitHub', 'cleanblog' ),
			'section' => 'clean_blog_social_options',
			'settings' => 'social_options_github',
			'priority' => 1
		)
	);
}
add_action( 'customize_register', 'cleanblog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cleanblog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cleanblog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cleanblog_customize_preview_js() {
	wp_enqueue_script( 'cleanblog-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'cleanblog_customize_preview_js' );
