<?php

	if ( ! defined( 'ABSPATH' ) ) {
				exit;
			}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'lawyer_zarutsky_news_single_page');

	function lawyer_zarutsky_news_single_page(){
		Container::make( 'post_meta', __('Стаття') )
				         ->where( function( $homeFields ) {
					         $homeFields->where( 'post_type', '=', 'news' );
				         } )

									->add_tab('Головний екран', array(
										Field::make_text('news_single_page_main_sub_title'.yuna_lang_prefix(), 'Підзаголовок сторінки'),
									))
									->add_tab('Контент статті', array(
										Field::make_rich_text('news_single_page_content'.yuna_lang_prefix(), 'Контент статті')
										     ->set_settings([
											     'media_buttons' => false,
										     ]),
									))

									->add_tab( 'Банер' , array(
										Field::make_text('news_single_page_call_title'.yuna_lang_prefix(), 'Заголовок блоку')
										     ->set_width(50),
										Field::make_text('news_single_page_call_text'.yuna_lang_prefix(), 'Текст блоку')
										     ->set_width(50),
										Field::make_text('news_single_page_call_btn_text'.yuna_lang_prefix(), 'Текст кнопки')
										     ->set_width(50),
										Field::make_image('news_single_page_call_image'.yuna_lang_prefix(), 'Зображення блоку')
											->set_value_type('url')
											->set_width(50)
									) )

									->add_tab('Батьківська сторінка', array(
										Field::make_association('news_single_page_parent', 'Батьківська сторінка')
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