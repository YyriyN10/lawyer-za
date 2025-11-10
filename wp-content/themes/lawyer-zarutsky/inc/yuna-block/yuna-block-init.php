<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


	/**
	 * Create Block Category
	 */

	function yuna_custom_block_category( $categories, $post ){

		$new = array(
			array(
				'slug'  => 'yuna-block-category',
				'title' => 'Yuna Blocks',
				'icon'  => 'admin-home',
			),
			array(
				'slug'  => 'yuna-inner-block-category',
				'title' => 'Yuna Inner Blocks',
				'icon'  => 'category',   // фолбек
			),
		);

		// додати свої категорії на початок списку
		return array_merge( $new, $categories );

	}

	add_filter( 'block_categories_all', 'yuna_custom_block_category', 10, 2);


/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function yuna_custom_blocks_init() {
	register_block_type( __DIR__ . '/build/our-approach' );
	register_block_type( __DIR__ . '/build/our-approach-inner' );

	register_block_type( __DIR__ . '/build/our-steps' );
	register_block_type( __DIR__ . '/build/our-steps-inner' );

	register_block_type( __DIR__ . '/build/our-services' );

	register_block_type( __DIR__ . '/build/call-banner' );

	register_block_type( __DIR__ . '/build/about-us' );

	register_block_type( __DIR__ . '/build/our-cases' );

	register_block_type( __DIR__ . '/build/yuna-step' );
	register_block_type( __DIR__ . '/build/yuna-step-inner' );
	register_block_type( __DIR__ . '/build/yuna-main-screen');
}
add_action( 'init', 'yuna_custom_blocks_init' );

// у вашому плагіні/темі:
	add_action( 'enqueue_block_editor_assets', function() {
		wp_enqueue_script(
			'yuna-category-icons', get_template_directory_uri() . '/inc/yuna-block/category-icon.js', array( 'wp-blocks', 'wp-element', 'wp-dom-ready' ), '1.0', true );
	} );




