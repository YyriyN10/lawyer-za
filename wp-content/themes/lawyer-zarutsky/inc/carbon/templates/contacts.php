<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'lawyer_zarutsky_contacts_page');

	function lawyer_zarutsky_contacts_page(){
		Container::make( 'post_meta', __('Контакти') )
				         ->where( function( $homeFields ) {
					         $homeFields->where( 'post_template', '=', 'template-contacts.php' );
				         } )

				         ->add_fields( array(
					         Field::make_text('contacts_page_main_title'.yuna_lang_prefix(), 'Головний заголовок сторінки')
					              ->set_width(40),
					         Field::make_text('contacts_page_main_sub_title'.yuna_lang_prefix(), 'Підзаголовок сторінки')
					              ->set_width(60),
				         ));
	}
