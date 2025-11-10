<?php

	if ( ! defined( 'ABSPATH' ) ) {
				exit;
			}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'services_category_fields');

	function services_category_fields(){
		Container::make( 'term_meta', 'Інформація про послугу' )
		         ->where( 'term_taxonomy', '=', 'services-tax' )
		         ->add_fields( array(
			         Field::make_rich_text('service_experience'.yuna_lang_prefix(), 'Досвід')
				         ->set_settings([
					         'media_buttons' => false,
				         ]),
		         ) );
	}


