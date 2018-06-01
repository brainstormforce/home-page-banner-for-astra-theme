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

$wp_customize->add_section(
	'section-banner-content', array(
		'priority' => 15,
		'title'    => __( 'Content', 'astra' ),
	)
);

$wp_customize->add_section(
	'section-banner-style', array(
		'priority' => 15,
		'title'    => __( 'Style', 'astra' ),
	)
);

