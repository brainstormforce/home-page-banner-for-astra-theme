<?php
/**
 * Banner - Panels & Sections
 *
 * @package Home Page Banner for Astra Theme
 * @since 1.0.0
 */

/**
 * Layout Panel
 */

$wp_customize->add_panel(
	'panel-home-page-banner',
	array(
		'priority' => 150,
		'title'    => __( 'Home Page Banner', 'home-page-banner' ),
	)
);

$wp_customize->add_section(
	'section-banner-contents',
	array(
		'priority' => 5,
		'title'    => __( 'Content', 'home-page-banner' ),
		'panel'    => 'panel-home-page-banner',
	)
);

$wp_customize->add_section(
	'section-banner-style',
	array(
		'priority' => 10,
		'title'    => __( 'Style', 'home-page-banner' ),
		'panel'    => 'panel-home-page-banner',
	)
);

