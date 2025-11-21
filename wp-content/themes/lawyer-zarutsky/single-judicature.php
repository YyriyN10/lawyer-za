<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template post type: judicature
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package lawyer_zarutsky
	 */

	get_header();?>
	<section class="main-screen judicature-single-main-screen" style="background-image: url(<?php the_post_thumbnail_url();?>)">
		<div class="container">
			<div class="row">
				<div class="content col-12 text-center">
					<?php
						$categories = get_the_terms( get_the_ID(), 'judicature-tax' );
						$categoryId = '';
						foreach ( $categories as $index=>$category):?>
							<?php if( $index === 0 ):
								$categoryId = $category->term_id;
								?>
								<h3 class="category page-title" data-aos="zoom-out" data-aos-duration="300">
                  <?php echo $category->name;?>
                </h3>
							<?php endif;?>
						<?php endforeach;?>
					<h1 class="main-title card-title" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="100">
            <?php the_title();?>
          </h1>
				</div>
			</div>
		</div>
	</section>

<?php

	$parentPage = carbon_get_post_meta(get_the_ID(), 'judicature_single_page_parent');

	$breadcrumbsArgs = array(
		'parent_page' => $parentPage
	);

	get_template_part('template-parts/breadcrumbs', null, $breadcrumbsArgs);

?>

<?php
	$judicatureAddress = carbon_get_post_meta(get_the_ID(), 'judicature_page_address'.yuna_lang_prefix());
	$judicatureWorkSchedule = carbon_get_post_meta(get_the_ID(), 'judicature_page_work_schedule'.yuna_lang_prefix());
	$judicatureWeekendSchedule = carbon_get_post_meta(get_the_ID(), 'judicature_page_weekend_schedule'.yuna_lang_prefix());
	$judicatureMapLink = carbon_get_post_meta(get_the_ID(), 'judicature_page_map_link'.yuna_lang_prefix());
	$judicaturePhoneList = carbon_get_post_meta(get_the_ID(), 'judicature_page_contact_list');

	if (!empty($judicatureAddress) || !empty($judicaturePhoneList) || !empty($judicatureWorkSchedule)): ?>
		<section class="judicature-info indent-bottom-small">
			<div class="container">
				<div class="row">
					<div class="contacts-content col-md-6">
						<?php if( !empty($judicatureAddress) ):?>
							<div class="contact-type" data-aos="fade-up" data-aos-duration="300">
								<h3 class="name card-title"><?php echo esc_html( pll__( 'Адреса' ) ); ?></h3>
								<p class="judicature-contacts-item">
									<?php echo $judicatureAddress;?>
								</p>
							</div>
						<?php endif;?>
						<?php if( !empty($judicatureWorkSchedule) ):?>
							<div class="contact-type" data-aos="fade-up" data-aos-duration="300">
								<h3 class="name card-title"><?php echo esc_html( pll__( 'Графік роботи' ) ); ?></h3>
								<p class="judicature-contacts-item">
									<?php echo $judicatureWorkSchedule;?>
								</p>
								<?php if( !empty($judicatureWeekendSchedule) ):?>
									<p class="judicature-contacts-item">
										<?php echo $judicatureWeekendSchedule;?>
									</p>
								<?php endif;?>
							</div>
						<?php endif;?>
						<?php if( !empty($judicaturePhoneList) ):?>
							<div class="contact-type" data-aos="fade-up" data-aos-duration="300">
								<h3 class="name card-title"><?php echo esc_html( pll__( 'Контакти' ) ); ?></h3>
								<?php foreach( $judicaturePhoneList as $phone ):

									$phoneToColl = preg_replace( '/[^0-9]/', '', $phone['contact']);
									?>

									<?php if( str_contains(strval($phone['contact']), '+') ):?>
									<a href="tel:+<?php echo $phoneToColl;?>" rel="nofollow" class="judicature-contacts-item"><?php echo $phone['contact'];?></a>
								<?php else :?>
									<a href="tel:<?php echo $phoneToColl;?>" rel="nofollow" class="judicature-contacts-item"><?php echo $phone['contact'];?></a>
								<?php endif;?>

								<?php endforeach;?>
							</div>
						<?php endif;?>
					</div>
					<?php if( !empty($judicatureMapLink) ):?>
						<div class="map col-md-6" data-aos="fade-up" data-aos-duration="300">
							<div class="inner">
								<iframe src="<?php echo $judicatureMapLink;?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</section>
	<?php endif;?>

<?php
	$judicatureSourceTitle = carbon_get_post_meta(get_the_ID(), 'judicature_page_more_info_title'.yuna_lang_prefix());
	$judicatureSourceList = carbon_get_post_meta(get_the_ID(), 'judicature_page_more_info_list'.yuna_lang_prefix());

	if (!empty($judicatureSourceTitle) && !empty($judicatureSourceList)):?>
		<section class="judicature-source indent-top-small indent-bottom-big">
			<div class="container">
				<div class="row">
					<h2 class="block-title col-12" data-aos="fade-up" data-aos-duration="300">
						<?php echo str_replace(['<p>', '</p>'], '', $judicatureSourceTitle );?>
					</h2>
				</div>
				<div class="row">
					<ul class="card-list-wrapper source-list col-12">
						<?php foreach( $judicatureSourceList as $index=>$sourceItem):?>
							<li class="card-item source" data-aos="flip-left" data-aos-duration="500" data-aos-delay="<?php echo ($index + 1) * 200;?>">
								<h3 class="name card-title"><?php echo $sourceItem['name'];?></h3>

								<a href="<?php echo $sourceItem['link'];?>" target="_blank" rel="nofollow" class="more-btn">
									<?php echo esc_html( pll__( 'Дізнатись більше' ) ); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
										<path d="M5 2L10.1958 6.76285C10.6282 7.15918 10.6282 7.84082 10.1958 8.23715L5 13" stroke="#0F0F0F" stroke-linecap="round"/>
									</svg>
								</a>
							</li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>
		</section>
	<?php endif;?>


<?php
	$callTitle = carbon_get_post_meta(get_the_ID(), 'judicature_single_page_call_title'.yuna_lang_prefix());
	$callText = carbon_get_post_meta(get_the_ID(), 'judicature_single_page_call_text'.yuna_lang_prefix());
	$callBtnText = carbon_get_post_meta(get_the_ID(), 'judicature_single_page_call_btn_text'.yuna_lang_prefix());
	$callBgImage = carbon_get_post_meta(get_the_ID(), 'judicature_single_page_call_image'.yuna_lang_prefix());

	if (!empty($callTitle)):?>
		<section class="call-to-action" style="background-image: url(<?php echo $callBgImage;?>)">
			<div class="container">
				<div class="row">
					<div class="content col-12 text-center">
						<h2 class="block-title" data-aos="zoom-out" data-aos-duration="300">
              <?php echo $callTitle;?>
            </h2>
						<?php if( $callText ):?>
							<p class="call" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="100">
                <?php echo $callText;?>
              </p>
						<?php endif;?>
            <?php if( !empty($callBtnText) ):?>
              <div class="button white-btn" data-bs-toggle="modal" data-bs-target="#formModal" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="150">
		            <?php echo $callBtnText; ?>
              </div>
            <?php endif;?>
					</div>
				</div>
			</div>
		</section>
	<?php endif;?>



<?php
	$judicatureSlogan = carbon_get_post_meta(get_the_ID(), 'service_single_page_judicature_slogan'.yuna_lang_prefix());

	if (!empty($judicatureSlogan)):?>
		<section class="judicature-slogan">
			<div class="container">
				<div class="row">
					<div class="col-12 text-center" data-aos="fade-up" data-aos-duration="300"><?php echo wpautop($judicatureSlogan);?></div>
				</div>
			</div>
		</section>
	<?php endif;?>

<?php get_footer();
