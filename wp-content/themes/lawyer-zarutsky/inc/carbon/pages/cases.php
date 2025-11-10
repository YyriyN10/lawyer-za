<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	/**
	 * Cases list
	 */

	add_action( 'carbon_fields_register_fields', 'cases_page' );

	function cases_page(){
		Container::make( 'post_meta', 'Інформація про екейс' )
		         ->where( 'post_type', '=', 'cases' )
		         ->add_fields( array(
			          Field::make_rich_text('case_problem'.yuna_lang_prefix(), 'Задача')
				          ->set_width(40)
				          ->set_settings([
					          'media_buttons' => false,
				          ]),
					      Field::make_complex('case_do_list'.yuna_lang_prefix(), 'Перелік виконанаих дій')
					              ->set_width(60)
					              ->add_fields(array(
						              Field::make_textarea('text', 'Опис дії')
						                   ->set_rows(2)
					              )),
					      Field::make_rich_text('case_result'.yuna_lang_prefix(), 'Результат')
					              ->set_settings([
						              'media_buttons' => false,
					              ]),

		         ) );
	}
