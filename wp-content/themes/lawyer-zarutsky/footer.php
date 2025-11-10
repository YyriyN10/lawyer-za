<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lawyer_Zarutsky
 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	$officeMap = carbon_get_theme_option('office_map_link');



?>
</main>
	<footer class="site-footer indent-top-small indent-bottom-small" id="contact-form">
		<div class="container">
      <?php

        $contactsTitle = carbon_get_theme_option('site_contacts_title'.yuna_lang_prefix());

        if( !empty($contactsTitle) ):?>
          <div class="row">
            <h2 class="block-title col-12"><?php echo str_replace(['<p>', '</p>'], '', $contactsTitle );?></h2>
          </div>
      <?php endif;?>

      <div class="row">
	      <?php if( !empty($officeMap) ):?>
          <div class="map-wrapper col-md-6">
            <div class="inner">
              <iframe src="<?php echo $officeMap;?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
	      <?php endif;?>
        <div class="form-wrapper col-md-6">
          <div class="inner text-center">
            <?php
              $formTitle = carbon_get_theme_option('yuna_option_form_title'.yuna_lang_prefix());

              if( !empty($formTitle) ):?>
                <h2 class="form-title card-title"><?php echo str_replace(['<p>', '</p>'], '', $formTitle );?></h2>
            <?php endif;?>

	          <?php get_template_part('template-parts/form');?>
          </div>
        </div>
      </div>

	      <?php
		      $workSchedule = carbon_get_theme_option('work_schedule'.yuna_lang_prefix());
		      $phoneList = carbon_get_theme_option('yuna_option_phone_list');
		      $emailList = carbon_get_theme_option('yuna_option_email_list');
		      $officeAddress = carbon_get_theme_option('offise_address'.yuna_lang_prefix());

		      if( !empty($workSchedule) || !empty($phoneList) || !empty($emailList) || !empty($officeAddress) ):?>
        <div class="row">
          <div class="content col-12">
	          <?php if( !empty($officeAddress) ):?>
              <div class="contacts-item">
                <h3 class="title card-title"><?php echo esc_html( pll__( 'Адреса' ) ); ?></h3>
                <p class="contact-item"><?php echo $officeAddress;?></p>
              </div>
	          <?php endif;?>
	          <?php if( !empty($workSchedule) ):?>
              <div class="contacts-item">
                <h3 class="title card-title"><?php echo esc_html( pll__( 'Графік роботи' ) ); ?></h3>
                <p class="contact-item"><?php echo $workSchedule;?></p>
              </div>
	          <?php endif;?>

            <?php if( !empty($phoneList) || !empty($emailList) ):?>
              <div class="contacts-item">
                <h3 class="title card-title"><?php echo esc_html( pll__( 'Контакти' ) ); ?></h3>
                <?php if( !empty($phoneList) ):?>
                  <?php foreach( $phoneList as $phone ):

                    $phoneToColl = preg_replace( '/[^0-9]/', '', $phone['phone_number']);
                    ?>

                    <?php if( str_contains(strval($phone['phone_number']), '+') ):?>
                    <a href="tel:+<?php echo $phoneToColl;?>" rel="nofollow" class="contact-item"><?php echo $phone['phone_number'];?></a>
                  <?php else :?>
                    <a href="tel:<?php echo $phoneToColl;?>" rel="nofollow" class="contact-item"><?php echo $phone['phone_number'];?></a>
                  <?php endif;?>

                  <?php endforeach;?>
                <?php endif;?>
                <?php if( !empty($emailList) ):?>
                  <?php foreach( $emailList as $email ):?>
                    <a href="mailto:<?php echo antispambot($email['email'], true) ;?>" rel="nofollow" class="contact-item">
                      <?php echo antispambot($email['email'], false) ;?>
                    </a>
                  <?php endforeach;?>
                <?php endif;?>
              </div>
            <?php endif;?>
        </div>
      </div>
		<?php endif;?>

      <div class="row">
        <div class="copy-dev-wrapper col-12">
          <p class="copy">@<?php echo date('Y');?> All Rights Reserved.</p>
          <p class="dev"><?php echo esc_html( pll__( 'Розроблено в' ) ); ?> <a href="https://smmstudio.com/" rel="nofollow" target="_blank">SMMSTUDIO</a></p>
        </div>
      </div>
    </div>
	</footer>
</div>

<?php get_template_part('template-parts/popup');?>

<?php wp_footer(); ?>

</body>
</html>
