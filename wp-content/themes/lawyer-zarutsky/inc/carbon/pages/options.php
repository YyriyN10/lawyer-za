<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'yuna_theme_options' );

	function yuna_theme_options() {
		Container::make( 'theme_options', __( 'Налаштування теми' ) )
		         ->add_tab( __( 'Контакти' ), array(
			         Field::make_image('yuna_option_logo', 'Логотип сайту')
		              ->set_type('image')
		              ->set_value_type('url'),
			         Field::make_complex('yuna_option_phone_list', 'Номери телефонів')
			              ->add_fields(array(
				              Field::make_text('phone_number', 'Номер телефону')
				                   ->help_text('+38 (067) 777 66 55')
			              )),
			         Field::make_complex('yuna_option_email_list', 'Перелік електронних адрес')
			              ->add_fields(array(
				              Field::make_text('email', 'Електронна адреса')
				                   ->set_attribute('type', 'email'),
			              )),
			         Field::make_text('offise_address'.yuna_lang_prefix(), 'Адреса офісу')
			          ->set_help_text('Переконайтеся що в меню мов, вибрана потрібна мова'),
			         Field::make_text('office_map_link', 'Посилилання з адресою на мапі')
			          ->set_help_text('Треба додати посилання яке згенерує google map коли ви згенеруєте його як адресу для поширення')
			          ->set_attribute('type', 'link'),
			         Field::make_text('work_schedule'.yuna_lang_prefix(), 'Розклад роботи')
			              ->set_help_text('ПН-СБ 9:00-18:00'),
			         Field::make_text('work_schedule_rest'.yuna_lang_prefix(), 'Вихідні дні')
			              ->set_help_text('Нд: вихідний'),
			         Field::make_rich_text('site_contacts_title'.yuna_lang_prefix(), 'Заголовок секції з контктами')
				         ->set_settings([
					         'media_buttons' => false,
				         ]),
		         ) )

		         ->add_tab( __( 'Текст сторінки 404' ), array(
			         Field::make_text('yuna_option_404_title'.yuna_lang_prefix(), 'Заголовок'),
			         Field::make_text('yuna_option_404_text'.yuna_lang_prefix(), 'Текст'),

		         ) )
		         /*->add_tab( __( 'Подяка за відправку форми' ), array(
			         Field::make_text('yuna_option_thx_title'.yuna_lang_prefix(), 'Заголовок вікна з подякою'),
			         Field::make_text('yuna_option_thx_text'.yuna_lang_prefix(), 'Текст вікна з подякою'),

		         ) )*/
		         ->add_tab( __( 'Спливаюча форма' ), array(
			         Field::make_rich_text('yuna_option_form_title'.yuna_lang_prefix(), 'Заголовок форми')
				         ->set_settings([
					         'media_buttons' => false,
				         ]),
			         Field::make_text('yuna_option_form_btn'.yuna_lang_prefix(), 'Текст кнопки'),
			         Field::make_text('yuna_option_form_text'.yuna_lang_prefix(), 'Текст форми'),

		         ) )
		         ->add_tab('Сторінка входу', array(
								Field::make_radio('option_login_page_logo_or_text', 'Обрати тип брендінгу')
								     ->set_width(50)
								     ->add_options( array(
									     'logo' => 'Зображення логотипу',
									     'text' => 'Текстова назва',
								     ) ),
								Field::make_text('option_login_page_site_name', 'Імʼя сайту')
								     ->set_conditional_logic( array(
									     'relation' => 'AND',
									     array(
										     'field' => 'option_login_page_logo_or_text',
										     'value' => 'text',
										     'compare' => '=',
									     )
								     ) )
								     ->set_width(50),
								Field::make_image('option_login_page_logo_image', 'Зображення логотипу на сторінці входу')
								     ->set_conditional_logic( array(
									     'relation' => 'AND',
									     array(
										     'field' => 'option_login_page_logo_or_text',
										     'value' => 'logo',
										     'compare' => '=',
									     )
								     ) )
								     ->set_width(50)
								     ->set_value_type('url'),
								Field::make_color('option_login_page_accent_color', 'Акцентний колір')
								     ->set_palette( array( '#F9FCF5', '#F9FCF5', '#034F43', '#02B513', '#F2682C') )
								     ->set_width(50),
								Field::make_color('option_login_page_bg_color', 'Колір тла')
								     ->set_palette( array( '#F9FCF5', '#F9FCF5', '#034F43', '#02B513', '#F2682C') )
								     ->set_width(50),
							))
		         ->add_tab( __( 'Налаштування інтеграції форм' ), array(
			         /*Field::make_separator('yuna_option_form_integration_1', 'Інтеграція з поштою'),
			         Field::make_complex('yuna_option_form_integration_email_list', 'Електронні скриньки')
			              ->add_fields(array(
				              Field::make_text('email', 'Електронна скринька')
				                   ->set_attribute('type', 'email')
			              )),
			         Field::make_separator('yuna_option_form_integration_2', 'Інтеграція з Telegram'),
			         Field::make_text('yuna_option_form_integration_telegram_api', 'API KEY Телеграм боту'),
			         Field::make_text('yuna_option_form_integration_telegram_chat', 'ID Телеграм чату'),*/

		         ) );

	}



