<?php

	if ( ! defined( 'ABSPATH' ) ) {
				exit;
			}

	function lawyer_zarutsky_scripts() {
		wp_enqueue_style( 'lawyer-zarutsky-style', get_stylesheet_uri(), array(), _S_VERSION );

		wp_enqueue_style( 'fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), _S_VERSION );
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.3.3' );
		wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/css/aos.css', array(), _S_VERSION );
		wp_enqueue_style( 'lawyer-zarutsky-main-style', get_template_directory_uri() . '/assets/css/style.min.css', array(), _S_VERSION );


		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(),'5.3.3', true );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array(),'1.6.0', true );
		wp_enqueue_script( 'lazy', get_template_directory_uri() . '/assets/js/jquery.lazy.js', array(),'1.7.10', true );
		wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/aos.js', array(),_S_VERSION, true );
		wp_enqueue_script( 'lawyer-zarutsky-main-js', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), _S_VERSION, true );

	}
	add_action( 'wp_enqueue_scripts', 'lawyer_zarutsky_scripts' );

	function add_async_attribute($tag, $handle) {
		$scripts_to_async = array('bootstrap', 'slick', 'lazy', 'aos', 'lawyer-zarutsky-main-js',  );

		foreach($scripts_to_async as $async_script) {
			if ($async_script === $handle) {
				return str_replace(' src', ' defer src', $tag);
			}
		}
		return $tag;

	}

	add_filter('script_loader_tag', 'add_async_attribute', 10, 2);
