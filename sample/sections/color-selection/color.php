<?php
/**
 * Redux Framework color config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Main Color', 'your-textdomain-here' ),
		'id'         => 'opt-color',
		'desc'       => esc_html__( '', 'your-textdomain-here' ) . '<a href=""></a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'opt-color-body',
				'type'        => 'color',
				'output'      => array(
					'color'     => '.site-body, .wp-block-site-title a',
					'important' => true,
				),
				'title'       => esc_html__( 'Site body Color', 'your-textdomain-here' ),
				'subtitle'    => esc_html__( 'Pick a title color for the theme (default: #000).', 'your-textdomain-here' ),
				'default'     => '#000000',
			),
			array(
				'id'          => 'opt-color-title',
				'type'        => 'color',
				'output'      => array(
					'color'     => '.site-title, .wp-block-site-title a',
					'important' => true,
				),
				'title'       => esc_html__( 'Site Title Color', 'your-textdomain-here' ),
				'subtitle'    => esc_html__( 'Pick a title color for the theme (default: #000).', 'your-textdomain-here' ),
				'default'     => '#000000',
				'color_alpha' => true,
			),
			array(
				'id'       => 'opt-color-footer',
				'type'     => 'color',
				'title'    => esc_html__( 'Footer Background Color', 'your-textdomain-here' ),
				'subtitle' => esc_html__( 'Pick a background color for the footer (default: #dd9933).', 'your-textdomain-here' ),
				'default'  => '#dd9933',
				'validate' => 'color',
				'output'   => array(
					'background-color' => '.footer, #site-footer, .site-footer, footer',
				),
			),
		),
	)
);
