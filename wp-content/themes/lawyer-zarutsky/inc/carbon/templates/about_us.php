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
						->set_value_type('url')
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
				Field::make_rich_text('about_us_page_how_we_are_title'.yuna_lang_prefix(), 'Заголовок блоку')
					->set_settings([
						'media_buttons' => false,
					]),
				Field::make_rich_text('about_us_page_how_we_are_text'.yuna_lang_prefix(), 'Текст')
				     ->set_width(60)
				     ->set_settings([
					     'media_buttons' => false,
				     ]),
				Field::make_image('about_us_page_how_we_are_image_1'.yuna_lang_prefix(), 'Зображення 1')
				     ->set_width(20),
				Field::make_image('about_us_page_how_we_are_image_2'.yuna_lang_prefix(), 'Зображення 2')
				     ->set_width(20),
			))
			->add_tab('Власник', array(
				Field::make_rich_text('about_us_page_owner_title'.yuna_lang_prefix(), 'Заголовок блоку')
						->set_width(40)
				     ->set_settings([
					     'media_buttons' => false,
				     ]),
				Field::make_text('about_us_page_owner_sub_title'.yuna_lang_prefix(), 'Підзаголовок блоку')
					->set_width(60),
				Field::make_complex('about_us_page_owner_facts'.yuna_lang_prefix(), 'Факти про замсновника')
					->set_width(70)
					->add_fields(array(
						Field::make_text('fact', 'Текст факту')
					)),
				Field::make_image('about_us_page_owner_image'.yuna_lang_prefix(), 'Зображення')
					->set_width(30)

			))
			->add_tab('Наші цінності', array(
				Field::make_rich_text('about_us_page_values_title'.yuna_lang_prefix(), 'Заголовок блоку')
					->set_settings([
						'media_buttons' => false,
					])
					->set_width(70),
				Field::make_image('about_us_page_values_image'.yuna_lang_prefix(), 'Зображення')
					->set_width(30),
				Field::make_complex('about_us_page_values_list'.yuna_lang_prefix(), 'Перелік цінностей')
				     ->add_fields(array(
					     Field::make_text('title', 'Назва')
					          ->set_width(40),
					     Field::make_text('description', 'Опис')
					          ->set_width(60),

				     ))
			));
	}
