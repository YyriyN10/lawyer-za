<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template Contacts
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package lawyer_zarutsky
	 *
	 */

	get_header();?>

<?php
	$contactsPageTitle = carbon_get_post_meta(get_the_ID(), 'contacts_page_main_title'.yuna_lang_prefix());
	$contactsPageSubtitle = carbon_get_post_meta(get_the_ID(), 'contacts_page_main_sub_title'.yuna_lang_prefix());
	$contactsPageFormTitle = carbon_get_post_meta(get_the_ID(), 'contacts_page_form_main_title'.yuna_lang_prefix());
	$contactsPageFormImage = carbon_get_post_meta(get_the_ID(), 'contacts_page_form_image'.yuna_lang_prefix());

	$formArgs = array(
	  'title' => $contactsPageFormTitle,
    'image' => $contactsPageFormImage
  );


	if (!empty($contactsPageTitle)):?>

	<section class="contacts-page" style="background-image: url(<?php the_post_thumbnail_url();?>)">
		<div class="container">
			<div class="row">
				<h1 class="main-title page-title col-12 text-center" data-aos="zoom-out" data-aos-duration="300">
          <?php echo $contactsPageTitle;?>
        </h1>
				<?php if( !empty($contactsPageSubtitle) ):?>
					<p class="slogan card-title col-12 text-center" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="100">
            <?php echo $contactsPageSubtitle;?>
          </p>
				<?php endif;?>
			</div>
		</div>
	</section>
<?php endif;?>
<?php get_template_part('template-parts/breadcrumbs');?>
<?php get_footer('contacts', $formArgs);
