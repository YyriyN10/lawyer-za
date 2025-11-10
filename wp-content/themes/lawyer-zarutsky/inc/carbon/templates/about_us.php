<?php

	if ( ! defined( 'ABSPATH' ) ) {
				exit;
			}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'lawyer_zarutsky_about_us_page');

	function lawyer_zarutsky_about_us_page(){
		Container::make( 'post_meta', __('Про нас') )
				         ->where( function( $homeFields ) {
					         $homeFields->where( 'post_template', '=', 'template-about-us.php' );
				         } )

			->add_tab( 'Голоаний екран' , array(
				Field::make_text('about_us_page_main_title'.yuna_lang_prefix(), 'Головний заголовок сторінки')
				     ->set_width(50),
				Field::make_text('about_us_page_main_slogan'.yuna_lang_prefix(), 'Слоган')
				     ->set_width(50),
				Field::make_text('about_us_page_main_btn_text'.yuna_lang_prefix(), 'Текст кнопки')
				     ->set_width(50),
				Field::make_image('about_us_page_main_image'.yuna_lang_prefix(), 'Зображення')
				     ->set_width(50),
			) )
			->add_tab( 'Наші цифри' , array(
				Field::make_complex('about_us_page_our_numbers_list'.yuna_lang_prefix(), 'Перелік цифр про нас')
				     ->add_fields(array(
					     Field::make_text('name', 'Цифра')
					          ->set_width(40),
					     Field::make_text('description', 'Значення')
					          ->set_width(60),
				     ))
			) )
			->add_tab('Хто ми', array(
				Field::make_text('about_us_page_how_we_are_title'.yuna_lang_prefix(), 'Заголовок блоку'),
				Field::make_complex('about_us_page_how_we_are_list'.yuna_lang_prefix(), 'Секція з контентом')
					->add_fields(array(
						Field::make_text('title', 'Заголовок секції')
							->set_width(30),
						Field::make_rich_text('text', 'Текст секції')
							->set_width(50)
							->set_settings([
								'media_buttons' => false,
							]),
						Field::make_image('image', 'Зображення секції')
							->set_width(20)
					))
			))
			->add_tab('Наші цінності', array(
				Field::make_text('about_us_page_values_title'.yuna_lang_prefix(), 'Заголовок блоку'),
				Field::make_complex('about_us_page_values_list'.yuna_lang_prefix(), 'Перелік цінностей')
				     ->add_fields(array(
					     Field::make_image('icon', 'Іконка')
					          ->set_width(20),
					     Field::make_text('title', 'Назва')
					          ->set_width(30),
					     Field::make_text('description', 'Опис')
					          ->set_width(50),

				     ))
			));
	}
