<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Add Carbon Fields
	 */

	add_action( 'after_setup_theme', 'carbon_load' );

	function carbon_load() {
		require get_template_directory() . '/vendor/autoload.php';
		\Carbon_Fields\Carbon_Fields::boot();
	}

	/**
	 * WPML Support
	 */

	function yuna_lang_prefix() {
		$prefix = '';
		if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
			return $prefix;
		}

		$prefix = '_' . ICL_LANGUAGE_CODE;
		return $prefix;
	}

	/**
	 * Carbon paiges
	 */

	require ('carbon/pages/options.php');
	require ('carbon/pages/services.php');
	require ('carbon/pages/cases.php');
	require ('carbon/pages/post-types.php');

	/**
	 * Carbon templates
	 */

	require ('carbon/templates/home-page.php');
	require ('carbon/templates/about_us.php');
	require ('carbon/templates/services.php');
	require ('carbon/templates/contacts.php');
	require ('carbon/templates/service-single.php');
	require ('carbon/templates/news.php');
	require ('carbon/templates/news-single.php');
	require ('carbon/templates/judicature-single.php');
	/**
	 * Add in REST API
	 */
	add_action('rest_api_init', function () {
		register_rest_route('lawyer-zarutsky/v1', '/options', [
			'methods'  => 'GET',
			'callback' => function () {
				// Отримуємо всі збережені опції
				$options = \Carbon_Fields\Helper\Helper::get_theme_options();

				return rest_ensure_response($options);
			},
			'permission_callback' => '__return_true', // або додати авторизацію
		]);
	});
