<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'lawyer_zarutsky_news_page');

	function lawyer_zarutsky_news_page(){
		Container::make( 'post_meta', __('Сторінка новин') )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_template', '=', 'archive-news.php' );
		         } )

		         ->add_fields( array(
			         Field::make_text('news_page_main_title'.yuna_lang_prefix(), 'Головний заголовок сторінки')
			              ->set_width(50),
			         Field::make_text('news_page_main_text'.yuna_lang_prefix(), 'Текст головного екрану')
			              ->set_width(50),
			         Field::make_text('news_page_banner_title'.yuna_lang_prefix(), 'Заголовок банеру')
			              ->set_width(50),
			         Field::make_text('news_page_banner_text'.yuna_lang_prefix(), 'Текст банеру')
			              ->set_width(50),
			         Field::make_text('news_page_banner_btn_text'.yuna_lang_prefix(), 'Текст кнопки банера')
			              ->set_width(50),
			         Field::make_image('news_page_banner_image'.yuna_lang_prefix(), 'Зображення банера')
				            ->set_value_type('url')
			              ->set_width(50),

		         ));
	}
