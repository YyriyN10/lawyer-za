<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Lawyer_Zarutsky
 */

if ( ! defined( 'ABSPATH' ) ) {
			exit;
		}

get_header();
?>
<?php

  $text404 = carbon_get_theme_option('yuna_option_404_text'.yuna_lang_prefix());
	$image404 = carbon_get_theme_option('yuna_option_404_image');

	if(!empty($image404)):?>
  <section class="error-404 not-found" style="background-image: url(<?php echo $image404;?>)">
    <div class="container">
      <div class="row">
        <div class="content col-12">
          <h1 class="main-title page-title" data-aos="zoom-out" data-aos-duration="300">404</h1>
          <?php if( !empty($text404) ):?>
            <p class="text card-title" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="100">
              <?php echo $text404;?>
            </p>
          <?php endif;?>
          <a href="<?php echo home_url('/');?>" class="button white-btn" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="150">
            <?php echo esc_html( pll__( 'Повернутись на головну' ) ); ?>
          </a>
        </div>
      </div>
    </div>
  </section>
<?php endif;?>

<?php
get_footer('404');
