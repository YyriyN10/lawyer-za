<?php

	if ( ! defined( 'ABSPATH' ) ) {
				exit;
			}

	add_action('wp_ajax_form_integration', 'form_integration_callback');
	add_action('wp_ajax_nopriv_form_integration', 'form_integration_callback');

	function form_integration_callback(){
		echo 'conect';
	}