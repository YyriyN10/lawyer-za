<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}



	/**
	 * Register a team post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since lawyer_zarutsky 1.0
	 */

	function team_post_type() {

		$labels = array(
			'name'               => _x( 'Команда', 'post type general name', 'lawyer_zarutsky' ),
			'singular_name'      => _x( 'Команда', 'post type singular name', 'lawyer_zarutsky' ),
			'menu_name'          => _x( 'Команда', 'admin menu', 'lawyer_zarutsky' ),
			'name_admin_bar'     => _x( 'Команда', 'add new on admin bar', 'lawyer_zarutsky' ),
			'add_new'            => _x( 'Додати нову', 'actions', 'lawyer_zarutsky' ),
			'add_new_item'       => __( 'Додати нову новину', 'lawyer_zarutsky' ),
			'new_item'           => __( 'Нова новина', 'lawyer_zarutsky' ),
			'edit_item'          => __( 'Редагувати новину', 'lawyer_zarutsky' ),
			'view_item'          => __( 'Дивитись новину', 'lawyer_zarutsky' ),
			'all_items'          => __( 'Всі новини', 'lawyer_zarutsky' ),
			'search_items'       => __( 'Шукати новину', 'lawyer_zarutsky' ),
			'parent_item_colon'  => __( 'Батько новини:', 'lawyer_zarutsky' ),
			'not_found'          => __( 'Новин не знайдено', 'lawyer_zarutsky' ),
			'not_found_in_trash' => __( 'У кошику новину не знайдно', 'lawyer_zarutsky' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'team' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'team' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 7,
			'menu_icon'          => 'dashicons-groups',
			'supports'           => array( 'title', 'editor',)
		);

		register_post_type( 'team', $args );
	}

	add_action( 'init', 'team_post_type' );

	/**
	 * Register a services post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since lawyer_zarutsky 1.0
	 */

	function services_post_type() {

		$labels = array(
			'name'               => _x( 'Послуги', 'post type general name', 'lawyer_zarutsky' ),
			'singular_name'      => _x( 'Послуга', 'post type singular name', 'lawyer_zarutsky' ),
			'menu_name'          => _x( 'Послуги', 'admin menu', 'lawyer_zarutsky' ),
			'name_admin_bar'     => _x( 'Послуги', 'add new on admin bar', 'lawyer_zarutsky' ),
			'add_new'            => _x( 'Додати нову', 'actions', 'lawyer_zarutsky' ),
			'add_new_item'       => __( 'Додати нову послугу', 'lawyer_zarutsky' ),
			'new_item'           => __( 'Нова послуга', 'lawyer_zarutsky' ),
			'edit_item'          => __( 'Редагувати послугу', 'lawyer_zarutsky' ),
			'view_item'          => __( 'Дивитись послугу', 'lawyer_zarutsky' ),
			'all_items'          => __( 'Всі послуги', 'lawyer_zarutsky' ),
			'search_items'       => __( 'Шукати послугу', 'lawyer_zarutsky' ),
			'parent_item_colon'  => __( 'Батько послуг:', 'lawyer_zarutsky' ),
			'not_found'          => __( 'Послуг не знайдено', 'lawyer_zarutsky' ),
			'not_found_in_trash' => __( 'У кошику послугу не знайдно', 'lawyer_zarutsky' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => ['services-tax'],
			'description'        => __( 'Description.', 'services' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'services' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 8,
			'menu_icon'          => 'dashicons-index-card',
			'supports'           => array( 'title', 'excerpt', 'thumbnail',)
		);

		register_post_type( 'services', $args );
	}

	add_action( 'init', 'services_post_type' );

	add_action( 'init', 'services_taxonomy' );
	function services_taxonomy(){

		register_taxonomy('services-tax', 'services', array(
			'label'                 => 'services-tax', // определяется параметром $labels->name
			'labels'                => array(
				'name'              => 'Категорії послуг',
				'singular_name'     => 'Категорія',
				'search_items'      => 'Пошук категорії',
				'all_items'         => 'Всі категорії',
				'view_item '        => 'View Genre',
				'parent_item'       => 'Parent Genre',
				'parent_item_colon' => 'Parent Genre:',
				'edit_item'         => 'Редагувати категорію',
				'update_item'       => 'Оновии категорію',
				'add_new_item'      => 'Додати нову категорію',
				'new_item_name'     => 'New Genre Name',
				'menu_name'         => 'Категорії послуг',
			),
			'description'           => 'services-tax', // описание таксономии
			'public'                => true,
			'publicly_queryable'    => true, // равен аргументу public
			'show_in_nav_menus'     => true, // равен аргументу public
			'show_ui'               => true, // равен аргументу public
			'show_in_menu'          => true, // равен аргументу show_ui
			'show_tagcloud'         => true, // равен аргументу show_ui
			'show_in_rest'          => true, // добавить в REST API
			'rest_base'             => true, // $taxonomy
			'hierarchical'          => true,
			'supports'           => array( 'title', 'thumbnail', 'revisions' ),

			/*'update_count_callback' => '_update_post_term_count',*/
			'rewrite'               => array('slug' => 'services'),
			'capabilities'          => array(),
			'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
			'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
			/*'_builtin'              => false,*/
			'show_in_quick_edit'    => true, // по умолчанию значение show_ui
		) );
	}

	/**
	 * Register a judicature post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since lawyer_zarutsky 1.0
	 */

	function judicature_post_type() {

		$labels = array(
			'name'               => _x( 'Суди', 'post type general name', 'lawyer_zarutsky' ),
			'singular_name'      => _x( 'Суд', 'post type singular name', 'lawyer_zarutsky' ),
			'menu_name'          => _x( 'Суди', 'admin menu', 'lawyer_zarutsky' ),
			'name_admin_bar'     => _x( 'Суди', 'add new on admin bar', 'lawyer_zarutsky' ),
			'add_new'            => _x( 'Додати суд', 'actions', 'lawyer_zarutsky' ),
			'add_new_item'       => __( 'Додати новий суд', 'lawyer_zarutsky' ),
			'new_item'           => __( 'Новий суд', 'lawyer_zarutsky' ),
			'edit_item'          => __( 'Редагувати суд', 'lawyer_zarutsky' ),
			'view_item'          => __( 'Дивитись суд', 'lawyer_zarutsky' ),
			'all_items'          => __( 'Всі суди', 'lawyer_zarutsky' ),
			'search_items'       => __( 'Шукати суд', 'lawyer_zarutsky' ),
			'parent_item_colon'  => __( 'Батько суду:', 'lawyer_zarutsky' ),
			'not_found'          => __( 'Судів не знайдено', 'lawyer_zarutsky' ),
			'not_found_in_trash' => __( 'У кошику судів не знайдно', 'lawyer_zarutsky' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => ['judicature-tax'],
			'description'        => __( 'Description.', 'judicature' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'judicature' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 10,
			'menu_icon'          => 'dashicons-bank',
			'supports'           => array( 'title', 'thumbnail',)
		);

		register_post_type( 'judicature', $args );
	}

	add_action( 'init', 'judicature_post_type' );

	add_action( 'init', 'judicature_taxonomy' );
	function judicature_taxonomy(){

		register_taxonomy('judicature-tax', 'judicature', array(
			'label'                 => 'judicature-tax', // определяется параметром $labels->name
			'labels'                => array(
				'name'              => 'Категорії судів',
				'singular_name'     => 'Категорія',
				'search_items'      => 'Пошук категорії',
				'all_items'         => 'Всі категорії',
				'view_item '        => 'View Genre',
				'parent_item'       => 'Parent Genre',
				'parent_item_colon' => 'Parent Genre:',
				'edit_item'         => 'Редагувати категорію',
				'update_item'       => 'Оновии категорію',
				'add_new_item'      => 'Додати нову категорію',
				'new_item_name'     => 'New Genre Name',
				'menu_name'         => 'Категорії судів',
			),
			'description'           => 'judicature-tax', // описание таксономии
			'public'                => true,
			'publicly_queryable'    => true, // равен аргументу public
			'show_in_nav_menus'     => true, // равен аргументу public
			'show_ui'               => true, // равен аргументу public
			'show_in_menu'          => true, // равен аргументу show_ui
			'show_tagcloud'         => true, // равен аргументу show_ui
			'show_in_rest'          => true, // добавить в REST API
			'rest_base'             => true, // $taxonomy
			'hierarchical'          => true,
			'supports'           => array( 'title', 'thumbnail', 'revisions' ),

			/*'update_count_callback' => '_update_post_term_count',*/
			'rewrite'               => array('slug' => 'judicature'),
			'capabilities'          => array(),
			'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
			'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
			/*'_builtin'              => false,*/
			'show_in_quick_edit'    => true, // по умолчанию значение show_ui
		) );
	}

	/**
	 * Register a cases post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since lawyer_zarutsky 1.0
	 */

	function cases_post_type() {

		$labels = array(
			'name'               => _x( 'Кейси', 'post type general name', 'lawyer_zarutsky' ),
			'singular_name'      => _x( 'Кейс', 'post type singular name', 'lawyer_zarutsky' ),
			'menu_name'          => _x( 'Кейси', 'admin menu', 'lawyer_zarutsky' ),
			'name_admin_bar'     => _x( 'Кейси', 'add new on admin bar', 'lawyer_zarutsky' ),
			'add_new'            => _x( 'Додати новий', 'actions', 'lawyer_zarutsky' ),
			'add_new_item'       => __( 'Додати новий кейс', 'lawyer_zarutsky' ),
			'new_item'           => __( 'Новий кейс', 'lawyer_zarutsky' ),
			'edit_item'          => __( 'Редагувати кейс', 'lawyer_zarutsky' ),
			'view_item'          => __( 'Дивитись кейс', 'lawyer_zarutsky' ),
			'all_items'          => __( 'Всі кейси', 'lawyer_zarutsky' ),
			'search_items'       => __( 'Шукати кейс', 'lawyer_zarutsky' ),
			'parent_item_colon'  => __( 'Батько кейсу:', 'lawyer_zarutsky' ),
			'not_found'          => __( 'Кейсів не знайдено', 'lawyer_zarutsky' ),
			'not_found_in_trash' => __( 'У кошику кейс не знайдно', 'lawyer_zarutsky' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => ['services-tax'],
			'description'        => __( 'Description.', 'cases' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'cases' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 9,
			'menu_icon'          => 'dashicons-portfolio',
			'supports'           => array( 'title', )
		);

		register_post_type( 'cases', $args );
	}

	add_action( 'init', 'cases_post_type' );
	/**
	 * Register a news post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since lawyer_zarutsky 1.0
	 */

	function news_post_type() {

		$labels = array(
			'name'               => _x( 'Новини', 'post type general name', 'lawyer_zarutsky' ),
			'singular_name'      => _x( 'Новини', 'post type singular name', 'lawyer_zarutsky' ),
			'menu_name'          => _x( 'Новини', 'admin menu', 'lawyer_zarutsky' ),
			'name_admin_bar'     => _x( 'Новини', 'add new on admin bar', 'lawyer_zarutsky' ),
			'add_new'            => _x( 'Додати нову', 'actions', 'lawyer_zarutsky' ),
			'add_new_item'       => __( 'Додати нову новину', 'lawyer_zarutsky' ),
			'new_item'           => __( 'Нова новина', 'lawyer_zarutsky' ),
			'edit_item'          => __( 'Редагувати новину', 'lawyer_zarutsky' ),
			'view_item'          => __( 'Дивитись новину', 'lawyer_zarutsky' ),
			'all_items'          => __( 'Всі новини', 'lawyer_zarutsky' ),
			'search_items'       => __( 'Шукати новину', 'lawyer_zarutsky' ),
			'parent_item_colon'  => __( 'Батько новини:', 'lawyer_zarutsky' ),
			'not_found'          => __( 'Новин не знайдено', 'lawyer_zarutsky' ),
			'not_found_in_trash' => __( 'У кошику новину не знайдно', 'lawyer_zarutsky' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => ['services-tax'],
			'description'        => __( 'Description.', 'news' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'news' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 6,
			'menu_icon'          => 'dashicons-media-text',
			'supports'           => array( 'title', 'excerpt', 'thumbnail')
		);

		register_post_type( 'news', $args );
	}

	add_action( 'init', 'news_post_type' );