<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'lawyer_zarutsky_judicature_single_page');

	function lawyer_zarutsky_judicature_single_page(){
		Container::make( 'post_meta', __('Суд') )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'judicature' );
		         } )

		         ->add_tab('Контактна інформація', array(
			         Field::make_text('judicature_page_address'.yuna_lang_prefix(), 'Адреса'),
			         Field::make_text('judicature_page_work_schedule'.yuna_lang_prefix(), 'Робочий час'),
			         Field::make_text('judicature_page_weekend_schedule'.yuna_lang_prefix(), 'Не робочий час'),
			         Field::make_complex('judicature_page_contact_list', 'Контакти')
			          ->add_fields(array(
			          	Field::make_text('contact', 'Телефон')
			          )),
			         Field::make_text('judicature_page_map_link'.yuna_lang_prefix(), 'Посилання на мапу')
			          ->set_attribute('type', 'url')
		         ))

		         ->add_tab('Корисні ресурси', array(
			         Field::make_rich_text('judicature_page_more_info_title'.yuna_lang_prefix(), 'Заголовок блоку')
			              ->set_settings([
				              'media_buttons' => false,
			              ])
			              ->set_width(40),

			         Field::make_complex('judicature_page_more_info_list'.yuna_lang_prefix(), 'Перелік ресурсів')
			              ->set_width(60)
			              ->add_fields(array(
				              Field::make_text('name', 'Назва ресурсу'),
				              Field::make_text('link', 'Посилання на ресурс')
				                   ->set_attribute('type', 'url'),
			              ))

		         ))

		         ->add_tab( 'Заклик до дії' , array(
			         Field::make_rich_text('judicature_single_page_call_title'.yuna_lang_prefix(), 'Заголовок блоку')
				         ->set_settings([
					         'media_buttons' => false,
				         ])
			              ->set_width(50),
			         Field::make_text('judicature_single_page_call_text'.yuna_lang_prefix(), 'Текст блоку')
			              ->set_width(50),
			         Field::make_text('judicature_single_page_call_btn_text'.yuna_lang_prefix(), 'Текст кнопки')
			              ->set_width(50),
			         Field::make_image('judicature_single_page_call_image'.yuna_lang_prefix(), 'Зображення')
			              ->set_width(50)
			              ->set_value_type('url')
		         ) )
		         ->add_tab('Батьківська сторінка', array(
			         Field::make_association('judicature_single_page_parent', 'Батьківська сторінка')
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