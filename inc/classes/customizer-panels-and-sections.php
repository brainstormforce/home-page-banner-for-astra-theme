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
	'section-content', array(
		'priority' => 15,
		'title'    => __( 'Content', 'astra' ),
	)
);

$wp_customize->add_section(
	'section-style', array(
		'priority' => 15,
		'title'    => __( 'Style', 'astra' ),
	)
);

