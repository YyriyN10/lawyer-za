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
	$officeMap = carbon_get_theme_option('office_map_link');
	$workSchedule = carbon_get_theme_option('work_schedule'.yuna_lang_prefix());
	$workScheduleRest = carbon_get_theme_option('work_schedule_rest'.yuna_lang_prefix());
	$phoneList = carbon_get_theme_option('yuna_option_phone_list');
	$emailList = carbon_get_theme_option('yuna_option_email_list');
	$officeAddress = carbon_get_theme_option('offise_address'.yuna_lang_prefix());

	if (!empty($contactsPageTitle) && (!empty($officeMap) || !empty($workSchedule) || !empty($phoneList) || !empty($phoneList) || !empty($emailList) || !empty($officeAddress))):?>

	<section class="contacts-page">
		<div class="container">
			<div class="row">
				<h1 class="main-title col-12 text-center"><?php echo $contactsPageTitle;?></h1>
				<?php if( !empty($contactsPageSubtitle) ):?>
					<p class="slogan col-12 text-center"><?php echo $contactsPageSubtitle;?></p>
				<?php endif;?>
			</div>
			<div class="row">
				<?php if( !empty($workSchedule) || !empty($phoneList) || !empty($emailList) || !empty($officeAddress) ):?>
					<div class="text-content col-lg-6">
						<?php if( !empty($officeAddress) ):?>
							<p class="contact-item"><?php echo $officeAddress;?></p>
						<?php endif;?>
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
						<?php if( !empty($workSchedule) ):?>
							<p class="contact-item"><?php echo $workSchedule;?></p>
						<?php endif;?>
						<?php if( !empty($workScheduleRest) ):?>
							<p class="contact-item"><?php echo $workScheduleRest;?></p>
						<?php endif;?>


					</div>
				<?php endif;?>
				<?php if( !empty($officeMap) ):?>
					<div class="map-wrapper col-lg-6">
						<iframe src="<?php echo $officeMap;?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				<?php endif;?>
			</div>
		</div>
	</section>
<?php endif;?>
<?php get_footer('contacts');
