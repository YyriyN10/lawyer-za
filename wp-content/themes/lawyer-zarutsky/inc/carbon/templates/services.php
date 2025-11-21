<?php

	if ( ! defined( 'ABSPATH' ) ) {
				exit;
			}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'lawyer_zarutsky_services_page');

	function lawyer_zarutsky_services_page(){
		Container::make( 'post_meta', __('Сторінка послуг') )
				         ->where( function( $homeFields ) {
					         $homeFields->where( 'post_template', '=', 'archive-services.php' );
				         } )

				         ->add_fields( array(
					         Field::make_text('services_page_main_title'.yuna_lang_prefix(), 'Головний заголовок сторінки')
					              ->set_width(30),
					         Field::make_text('services_page_main_text'.yuna_lang_prefix(), 'Текст головного екрану')
					              ->set_width(40),
					         Field::make_text('services_page_main_btn_text'.yuna_lang_prefix(), 'Текст кнопки')
					              ->set_width(30),

				         ));
	}
