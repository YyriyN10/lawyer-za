<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lawyer_Zarutsky
 */

if ( ! defined( 'ABSPATH' ) ) {
			exit;
		}

	$langArgs = array(
		'show_names' => 1,
		'display_names_as' => 'name',
		'show_flags' => 0,
		'hide_current' => 0
	);

$site_logo = carbon_get_theme_option('yuna_option_logo');

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="preload" href="<?php echo get_template_directory_uri();?>/assets/css/fonts.css" as="style"/>


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">

	<header class="site-header">
    <div class="container">
      <div class="row">
        <div class="content col-12">
          <div class="menu-btn" id="menu-btn">
            <span></span><span></span><span></span>
          </div>
          <nav class="header-navigation" id="header-navigation">
		        <?php
			        wp_nav_menu(
				        array(
					        'theme_location' => 'menu-1',
					        'menu_id'        => 'primary-menu',
					        'container' => false,
					        'menu_class' => 'main-menu'
				        )
			        );
		        ?>
          </nav>
	        <?php if ( $langArgs ):?>
            <div class="lang-wrapper" id="lang-wrapper">
              <button class="page-lang">
                <span class="lang-name"></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path d="M7.99687 10.667C7.82668 10.6661 7.65881 10.6274 7.50545 10.5536C7.35208 10.4798 7.21707 10.3728 7.11021 10.2403L4.30354 6.84033C4.13954 6.63564 4.03633 6.38899 4.00568 6.1285C3.97504 5.86801 4.01818 5.60415 4.13021 5.36699C4.22106 5.16088 4.36932 4.98527 4.55729 4.86114C4.74525 4.73701 4.96497 4.66961 5.19021 4.66699H10.8035C11.0288 4.66961 11.2485 4.73701 11.4365 4.86114C11.6244 4.98527 11.7727 5.16088 11.8635 5.36699C11.9756 5.60415 12.0187 5.86801 11.9881 6.1285C11.9574 6.38899 11.8542 6.63564 11.6902 6.84033L8.88354 10.2403C8.77667 10.3728 8.64166 10.4798 8.4883 10.5536C8.33494 10.6274 8.16707 10.6661 7.99687 10.667Z" fill="#F4F4F4"/>
                </svg>
              </button>

              <ul class="lang-list">
				        <?php pll_the_languages( $langArgs ); ?>
              </ul>

            </div>
	        <?php endif;?>
        </div>
      </div>
    </div>
	</header>
  <main>
