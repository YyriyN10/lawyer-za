<?php

	if ( ! defined( 'ABSPATH' ) ) {
				exit;
			}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'lawyer_zarutsky_news_single_page');

	function lawyer_zarutsky_news_single_page(){
		Container::make( 'post_meta', __('стаття') )
				         ->where( function( $homeFields ) {
					         $homeFields->where( 'post_type', '=', 'news' );
				         } )

				         ->add_fields( array(
					         Field::make_text('news_single_page_main_sub_title'.yuna_lang_prefix(), 'Підзаголовок сторінки'),
					         Field::make_rich_text('news_single_page_top_content_part'.yuna_lang_prefix(), 'Контент статті (перед банером)')
						         ->set_settings([
							         'media_buttons' => false,
						         ]),
					         Field::make_rich_text('news_single_page_bottom_content_part'.yuna_lang_prefix(), 'Контент статті (після банером)')
					              ->set_settings([
						              'media_buttons' => false,
					              ]),
				         ))

								->add_tab( 'Банер' , array(
									Field::make_text('news_single_page_call_title'.yuna_lang_prefix(), 'Заголовок блоку')
									     ->set_width(33),
									Field::make_text('news_single_page_call_text'.yuna_lang_prefix(), 'Текст блоку')
									     ->set_width(33),
									Field::make_text('news_single_page_call_btn_text'.yuna_lang_prefix(), 'Текст кнопки')
									     ->set_width(33),
								) );
	}