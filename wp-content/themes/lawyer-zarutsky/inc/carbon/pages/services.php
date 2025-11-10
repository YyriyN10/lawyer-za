<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	/**
	 * Services list
	 */

	add_action( 'carbon_fields_register_fields', 'services_page' );

	function services_page(){
		Container::make( 'theme_options', 'Послуги' )
		         ->set_icon( 'dashicons-index-card' )
		         ->add_fields( array(
			         Field::make_complex('services_list'.yuna_lang_prefix(), 'Перелік послуг')
			              ->add_fields(array(
				              Field::make_text('anchor', 'Якір послуги')
				                   ->set_required(true),
				              Field::make_text('name', 'Назва послуги')
				                   ->set_required(true)
				                   ->set_width(33),
				              Field::make_text('description', 'Опис послуги')
				                   ->set_required(true)
				                   ->set_width(33),
				              Field::make_text('experience', 'Досвід у послузі')
				                   ->set_required(true)
				                   ->set_width(33),
				              Field::make_complex('component_list', 'Перелік складових послуги')
				                   ->set_required(true)
				                   ->add_fields(array(
					                   Field::make_text('name', 'Назва складової')
					                        ->set_width(40),
					                   Field::make_rich_text('description', 'Опис складової')
					                        ->set_width(60)
					                        ->set_settings([
						                        'media_buttons' => false,
					                        ]),
				                   ))
			              ))
		         ) );
	}
