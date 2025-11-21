<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	if ( defined( 'POLYLANG_VERSION' ) ) {

		add_action('init', 'lawyer_zarutsky_polylang_strings' );

		function lawyer_zarutsky_polylang_strings() {

			if( ! function_exists( 'pll_register_string' ) ) {
				return;
			}

			/**
			 * Form
			 */
			pll_register_string(
				'lawyer_zarutsky_form_name_placeholder',
				'Ім’я',
				'Форма',
				false
			);

			pll_register_string(
				'lawyer_zarutsky_form_phone_placeholder',
				'Телефон',
				'Форма',
				false
			);


			pll_register_string(
				'lawyer_zarutsky_form_btn',
				'Зв’яжіться зі мною',
				'Форма',
				false
			);


			/**
			 * Button
			 */

			pll_register_string(
				'lawyer_zarutsky_btn_more',
				'Дізнатись більше',
				'Кнопки',
				false
			);

			pll_register_string(
				'lawyer_zarutsky_btn_send_request',
				'ЗАЛИШИТИ ЗАЯВКУ',
				'Кнопки',
				false
			);

			pll_register_string(
				'lawyer_zarutsky_btn_read_more',
				'Читати далі',
				'Кнопки',
				false
			);

			pll_register_string(
				'lawyer_zarutsky_btn_go_home',
				'Повернутись на головну',
				'Кнопки',
				false
			);

			/**
			 * Text
			 */
			pll_register_string(
				'lawyer_zarutsky_text_case_problem',
				'Запит',
				'Текст',
				false
			);
			pll_register_string(
				'lawyer_zarutsky_text_case_do',
				'Наші дії',
				'Текст',
				false
			);
			pll_register_string(
				'lawyer_zarutsky_text_case_result',
				'Результат',
				'Текст',
				false
			);

			pll_register_string(
				'lawyer_zarutsky_text_exp',
				'Досвід',
				'Текст',
				false
			);

			pll_register_string(
				'lawyer_zarutsky_text_exp_our',
				'Наш досвід',
				'Текст',
				false
			);

			pll_register_string(
				'lawyer_zarutsky_judicature',
				'Суди',
				'Текст',
				false
			);




			/**
			 * Footer
			 */

			pll_register_string(
				'lawyer_zarutsky_footer_dev',
				'Розроблено в',
				'Футер',
				false
			);

			pll_register_string(
				'lawyer_zarutsky_footer_address',
				'Адреса',
				'Футер',
				false
			);

			pll_register_string(
				'lawyer_zarutsky_footer_schedule',
				'Графік роботи',
				'Футер',
				false
			);

			pll_register_string(
				'lawyer_zarutsky_footer_contacts',
				'Контакти',
				'Футер',
				false
			);



















		}
	}