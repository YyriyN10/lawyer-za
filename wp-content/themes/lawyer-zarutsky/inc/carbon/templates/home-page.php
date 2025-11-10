<?php

	if ( ! defined( 'ABSPATH' ) ) {
				exit;
			}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'lawyer_zarutsky_home_page');

	function lawyer_zarutsky_home_page(){
		Container::make( 'post_meta', __('Головна сторінка') )
				         ->where( function( $homeFields ) {
					         $homeFields->where( 'post_template', '=', 'template-home.php' );
				         } )
			->add_tab( 'Голоаний екран' , array(
				Field::make_text('home_page_main_title'.yuna_lang_prefix(), 'Головний заголовок сторінки')
					->set_width(50),
				Field::make_text('home_page_main_slogan'.yuna_lang_prefix(), 'Слоган')
				     ->set_width(50),
				Field::make_text('home_page_main_btn_text'.yuna_lang_prefix(), 'Текст кнопки')
				     ->set_width(50),
				Field::make_image('home_page_main_image'.yuna_lang_prefix(), 'Зображення постер')
					->set_value_type('url')
				     ->set_width(25),
				Field::make_image('home_page_main_video'.yuna_lang_prefix(), 'Відео')
						->set_value_type('url')
						->set_type('video')
				     ->set_width(25),
			) )
			->add_tab( 'Наші цифри' , array(
				Field::make_complex('home_page_our_numbers_list'.yuna_lang_prefix(), 'Перелік цифр про нас')
					->add_fields(array(
						Field::make_text('name', 'Цифра')
									->set_width(40),
						Field::make_text('description', 'Значення')
						     ->set_width(60),
					))
			) )
			->add_tab( 'Наші послуги' , array(
				Field::make_rich_text('home_page_services_title'.yuna_lang_prefix(), 'Заголовок блоку')
					->set_settings([
						'media_buttons' => false,
					])
							->set_width(50),
				Field::make_association('home_page_services_page', 'Сторінка всіх послуг')
					->set_width(50)
					->set_max(1)
							->set_types( array(
								array(
									'type'      => 'post',
									'post_type' => 'page',
								)
							) ),
				Field::make_text('home_page_services_question'.yuna_lang_prefix(), 'Запитання про послуги')
				     ->set_width(33),
				Field::make_text('home_page_services_call'.yuna_lang_prefix(), 'Заклик залишити повідомлення')
				     ->set_width(33),
				Field::make_text('home_page_services_btn_text'.yuna_lang_prefix(), 'Текст кнопки')
				     ->set_width(33),
				Field::make_image('home_page_services_more_bg_image'.yuna_lang_prefix(), 'Фонове зображення секції "Не знайшли потрібну послугу"')
					->set_value_type('url')

			) )
			->add_tab( 'Наш підхід' , array(
				Field::make_rich_text('home_page_approach_title'.yuna_lang_prefix(), 'Заголдовок блоку')
					->set_width(70)
					->set_settings([
						'media_buttons' => false,
					]),
				Field::make_image('home_page_approach_image'.yuna_lang_prefix(), 'Зображення блоку')
					->set_width(30),
				Field::make_text('home_page_approach_how_work_title'.yuna_lang_prefix(), 'Заголовок секції "Як працюємо"')
					->set_width(40),
				Field::make_complex('home_page_approach_how_work_list'.yuna_lang_prefix(), 'Перелік "Як працюємо"')
					->set_width(60)
					->add_fields(array(
						Field::make_rich_text('description', 'Текст тези')
							->set_settings([
								'media_buttons' => false,
							]),
					)),
				Field::make_text('home_page_approach_how_not_work_title'.yuna_lang_prefix(), 'Заголовок секції "Як не працюємо"')
				     ->set_width(40),
				Field::make_complex('home_page_approach_how_not_work_list'.yuna_lang_prefix(), 'Перелік "Як не працюємо"')
				     ->set_width(60)
				     ->add_fields(array(
					     Field::make_rich_text('description', 'Текст тези')
					          ->set_settings([
						          'media_buttons' => false,
					          ]),
				     ))
			) )
			->add_tab( 'Кейси' , array(
				Field::make_rich_text('home_page_cases_title'.yuna_lang_prefix(), 'Заголовок блоку')
					->set_settings([
						'media_buttons' => false,
					]),
			) )
			->add_tab( 'Заклик до дії' , array(
				Field::make_text('home_page_call_title'.yuna_lang_prefix(), 'Заголовок блоку')
					->set_width(33),
				Field::make_text('home_page_call_text'.yuna_lang_prefix(), 'Текст блоку')
				     ->set_width(33),
				Field::make_text('home_page_call_btn_text'.yuna_lang_prefix(), 'Текст кнопки')
				     ->set_width(33),
				Field::make_image('home_page_call_bg_image'.yuna_lang_prefix(), 'Фонове зображення')
				     ->set_value_type('url')
			) )
			->add_tab( 'Про нас' , array(
				Field::make_rich_text('home_page_about_us_title'.yuna_lang_prefix(), 'Заголовок блоку')
					->set_settings([
						'media_buttons' => false,
					])
				     ->set_width(30),
				Field::make_rich_text('home_page_about_us_text'.yuna_lang_prefix(), 'Текст про нас')
							->set_width(70)
				     ->set_settings([
					     'media_buttons' => false,
				     ]),
				Field::make_text('home_page_about_us_btn_text'.yuna_lang_prefix(), 'Текст кнопки')
					->set_width(30),
				Field::make_association('home_page_about_us_page', 'Сторінка "Про нас"')
				     ->set_width(70)
				     ->set_max(1)
				     ->set_types( array(
					     array(
						     'type'      => 'post',
						     'post_type' => 'page',
					     )
				     ) ),
				Field::make_image('home_page_about_us_image_1'.yuna_lang_prefix(), 'Зображення 1')
				     ->set_width(50),
				Field::make_image('home_page_about_us_image_2'.yuna_lang_prefix(), 'Зображення 2')
				     ->set_width(50),

			) )

			->add_tab( 'Шлях до співпраці' , array(
				Field::make_rich_text('home_page_steps_title'.yuna_lang_prefix(), 'Заголовок блоку')
					->set_settings([
						'media_buttons' => false,
					])
					->set_width(30),
				Field::make_complex('home_page_steps_list'.yuna_lang_prefix(), 'Перелік кроків')
					->set_width(70)
					->add_fields(array(
						Field::make_image('icon', 'Іконка кроку')
							->set_value_type('url')
							->set_width(30),
						Field::make_text('name', 'Назва кроку')
							->set_width(70),
						Field::make_text('description', 'Короткий опис')
							->set_width(100)

					))

			) );

	}
