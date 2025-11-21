<?php

	if ( ! defined( 'ABSPATH' ) ) {
				exit;
			}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'lawyer_zarutsky_service_single_page');

	function lawyer_zarutsky_service_single_page(){
		Container::make( 'post_meta', __('Послуга') )
				         ->where( function( $homeFields ) {
					         $homeFields->where( 'post_type', '=', 'services' );
				         } )

								->add_fields(array(
									Field::make_text('service_single_page_main_btn_text'.yuna_lang_prefix(), 'Текст кнопки на головному екрані')
								))

									->add_tab('Коротко про напрямок', array(
										Field::make_rich_text('service_single_page_short_about'.yuna_lang_prefix(), 'Короткий текст про напрямок')
											->set_settings([
												'media_buttons' => false,
											]),
									))

									->add_tab('Опис послуги', array(
										Field::make_rich_text('service_single_page_service_info_title'.yuna_lang_prefix(), 'Заголовок блоку')
											->set_settings([
												'media_buttons' => false,
											])
											->set_width(40),

										Field::make_complex('service_single_page_service_info_list'.yuna_lang_prefix(), 'Перелік складових')
												->set_width(60)
												->add_fields(array(
													Field::make_text('name', 'Назва'),
													Field::make_rich_text('description', 'Короткий опис')
														->set_settings([
															'media_buttons' => false,
														]),
												))

									))

									->add_tab( 'Заклик до дії' , array(
										Field::make_text('service_single_page_call_title'.yuna_lang_prefix(), 'Заголовок блоку')
										     ->set_width(50),
										Field::make_text('service_single_page_call_text'.yuna_lang_prefix(), 'Текст блоку')
										     ->set_width(50),
										Field::make_text('service_single_page_call_btn_text'.yuna_lang_prefix(), 'Текст кнопки')
										     ->set_width(50),
										Field::make_image('service_single_page_call_image'.yuna_lang_prefix(), 'Зображення')
												->set_width(50)
												->set_value_type('url')
									) )

									->add_tab( 'Кейси' , array(
										Field::make_rich_text('service_single_page_cases_title'.yuna_lang_prefix(), 'Заголовок блоку')
											->set_settings([
												'media_buttons' => false,
											])
											->set_width(30),
										Field::make_text('service_single_page_cases_sub_title'.yuna_lang_prefix(), 'Підзаголовок блоку')
										     ->set_width(70),
										Field::make_association('service_single_page_cases_list', 'Перелік кейсів по послузі')
										     ->set_types( array(
											     array(
												     'type'      => 'post',
												     'post_type' => 'cases',
											     )
										     ) ),
									) )
									->add_tab( 'Статті' , array(
										Field::make_rich_text('service_single_page_blog_title'.yuna_lang_prefix(), 'Заголовок блоку')
											->set_settings([
												'media_buttons' => false,
											])
											->set_width(30),
										Field::make_association('service_single_page_blog_list', 'Перелік статей по послузі')
												->set_width(70)
												->set_max(2)
										     ->set_types( array(
											     array(
												     'type'      => 'post',
												     'post_type' => 'news',
											     )
										     ) ),
									) )

									->add_tab( 'Суд' , array(
										Field::make_text('service_single_page_judicature_address'.yuna_lang_prefix(), 'Адреса суду'),
										Field::make_text('service_single_page_judicature_work_schedule'.yuna_lang_prefix(), 'Графік роботи суду'),
										Field::make_complex('service_single_page_judicature_phone_list'.yuna_lang_prefix(), 'Контактні телефони')
											->add_fields(array(
												Field::make_text('phone', 'Телефон')
											)),
										Field::make_separator('service_single_page_judicature_separator_1', 'Корисні ресурси'),
										Field::make_text('service_single_page_judicature_source_title'.yuna_lang_prefix(), 'Заголовок секції'),
										Field::make_complex('service_single_page_judicature_source_list'.yuna_lang_prefix(), 'Перелік ресурсіа')
										     ->add_fields(array(
											     Field::make_text('name', 'Назва'),
											     Field::make_text('link', 'посилання')
											      ->set_attribute('type', 'url')
										     )),
										Field::make_separator('service_single_page_judicature_separator_2', 'Слоган'),
										Field::make_rich_text('service_single_page_judicature_slogan'.yuna_lang_prefix(), 'Текст слогану')
										     ->set_settings([
											     'media_buttons' => false,
										     ]),
									) )
									->add_tab('Батьківська сторінка', array(
										Field::make_association('service_single_page_parent', 'Батьківська сторінка')
										     ->set_required(true)
										     ->set_max(1)
										     ->set_types( array(
											     array(
												     'type' => 'post',
												     'post_type' => 'page',
											     ),
										     ) )
									));
	}