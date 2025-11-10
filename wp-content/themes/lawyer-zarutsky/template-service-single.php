<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template Service
	 *
	 * Template post type: services
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package lawyer_zarutsky
	 */

	get_header();?>
	<section class="main-screen">
		<div class="container">
			<div class="row">
				<div class="content col-12 text-center">
					<?php
						$categories = get_the_terms( get_the_ID(), 'services-tax' );
						$categoryId = '';
						foreach ( $categories as $index=>$category):?>
							<?php if( $index === 0 ):
								$categoryId = $category->term_id;
								?>
								<h3 class="category"><?php echo $category->name;?></h3>
							<?php endif;?>
					<?php endforeach;?>
					<h1 class="main-title"><?php the_title();?></h1>
					<?php
						$mainBtnText = carbon_get_post_meta(get_the_ID(), 'service_single_page_main_btn_text'.yuna_lang_prefix());
						if( !empty($mainBtnText) ):?>
							<div class="button" data-bs-toggle="modal" data-bs-target="#formModal">
								<?php echo $mainBtnText; ?>
							</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</section>

<?php
	$serviceShortText = carbon_get_post_meta(get_the_ID(), 'service_single_page_short_about'.yuna_lang_prefix());

	if (!empty($serviceShortText)):?>
		<section class="service-short-wrapper">
			<div class="container">
				<div class="row">
					<div class="text-content col-lg-6">
						<?php echo wpautop($serviceShortText);?>
					</div>
				</div>
			</div>
		</section>
<?php endif;?>

<?php
	$serviceFullInfo = carbon_get_post_meta(get_the_ID(), 'service_single_page_service_info'.yuna_lang_prefix());

	if (!empty($serviceFullInfo)):?>
		<section class="service-full-info-wrapper">
			<div class="row">
				<div class="text col-12">
					<?php echo wpautop($serviceFullInfo);?>
				</div>
			</div>
		</section>
<?php endif;?>

<?php
	$callTitle = carbon_get_post_meta(get_the_ID(), 'service_single_page_call_title'.yuna_lang_prefix());
	$callText = carbon_get_post_meta(get_the_ID(), 'service_single_page_call_text'.yuna_lang_prefix());
	$callBtnText = carbon_get_post_meta(get_the_ID(), 'service_single_page_call_btn_text'.yuna_lang_prefix());

	if (!empty($callTitle) && !empty($callBtnText)):?>
		<section class="call-to-action">
			<div class="container">
				<div class="row">
					<h2 class="block-title col-12 text-center"><?php echo $callTitle;?></h2>
					<?php if( $callText ):?>
						<p class="call-text col-12 text-center"><?php echo $callText;?></p>
					<?php endif;?>

					<div class="button" data-bs-toggle="modal" data-bs-target="#formModal">
						<?php echo $callBtnText; ?>
					</div>

				</div>
			</div>
		</section>
	<?php endif;?>

<?php
	$casesTitle = carbon_get_post_meta(get_the_ID(), 'service_single_page_cases_title'.yuna_lang_prefix());
	$casesCustomList = carbon_get_post_meta(get_the_ID(), 'service_single_page_cases_list');
	$casesSubTitle = carbon_get_post_meta(get_the_ID(), 'service_single_page_cases_sub_title'.yuna_lang_prefix());

	$casesArgs = array();

	if (!empty($casesCustomList)){

		echo 'custom';
		$casesArgs = array(
			'post_in' => $casesCustomList,
			'orderby' 	 => 'date',
			'post_type'  => 'cases',
			'post_status'    => 'publish'
		);

	}else{
		$casesArgs = array(
			'tax_query' => array(
				array(
					'taxonomy' => 'services-tax',
					'field' => 'id',
					'terms' => $categoryId,
				)

			),
			'posts_per_page' => -1,
			'orderby' 	 => 'date',
			'post_type'  => 'cases',
			'post_status'    => 'publish'
		);
	}


	$casesList = new WP_Query( $casesArgs );

	if ( $casesList->have_posts() && $casesTitle ) :?>

		<section class="our-cases">
			<div class="container">
				<div class="row">
					<h2 class="block-title col-12 text-center"><?php echo $casesTitle;?></h2>
					<?php if( !empty($casesSubTitle) ):?>
						<h3 class="subtitle col-12 text-center"><?php echo $casesSubTitle;?></h3>
					<?php endif;?>
				</div>
				<div class="row">
					<div class="slider-wrapper col-12">
						<div class="slider" id="cases-slider">
							<?php while ( $casesList->have_posts() ) : $casesList->the_post();

								$caseProblem = carbon_get_post_meta(get_the_ID(), 'case_problem'.yuna_lang_prefix());
								$caseDoList = carbon_get_post_meta(get_the_ID(), 'case_do_list'.yuna_lang_prefix());
								$caseResult = carbon_get_post_meta(get_the_ID(), 'case_result'.yuna_lang_prefix());
								?>
								<div class="slide">
									<h3 class="name"><?php the_title();?></h3>
									<?php if( !empty($caseProblem) ):?>
										<div class="problem-wrapper">
											<?php echo esc_html( pll__( 'Запит' ) ); ?>: <?php echo wpautop($caseProblem);?>
										</div>
									<?php endif;?>
									<?php if( !empty($caseDoList) ):?>
										<div class="do-wrapper">
											<p class="section-name"><?php echo esc_html( pll__( 'Наші дії' ) ); ?>:</p>
											<ul class="do-list">
												<?php foreach( $caseDoList as $item ):?>
													<li class="item"><?php echo $item['text'];?></li>
												<?php endforeach;?>
											</ul>
										</div>
									<?php endif;?>
									<?php if( !empty($caseResult) ):?>
										<div class="result-wrapper">
											<p class="section-name"><?php echo esc_html( pll__( 'Результат' ) ); ?>:</p>
											<div class="text"><?php echo wpautop($caseResult);?></div>
										</div>
									<?php endif;?>

								</div>
							<?php endwhile;?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php
	$blogTitle = carbon_get_post_meta(get_the_ID(), 'service_single_page_blog_title'.yuna_lang_prefix());
	$blogCustomList = carbon_get_post_meta(get_the_ID(), 'service_single_page_blog_list');

	$blogArgs = array();

	if (!empty($blogCustomList)){

		$blogArgs = array(
			'post_in' => $blogCustomList,
			'orderby' 	 => 'date',
			'post_type'  => 'news',
			'post_status'    => 'publish'
		);

	}else{
		$blogArgs = array(
			'tax_query' => array(
				array(
					'taxonomy' => 'services-tax',
					'field' => 'id',
					'terms' => $categoryId,
				)

			),
			'posts_per_page' => -1,
			'orderby' 	 => 'date',
			'post_type'  => 'news',
			'post_status'    => 'publish'
		);
	}


	$blogList = new WP_Query( $blogArgs );

	if ( $blogList->have_posts() && $blogTitle ) :?>

		<section class="our-blog-posts">
			<div class="container">
				<div class="row">
					<h2 class="block-title col-12 text-center"><?php echo $blogTitle;?></h2>

				</div>
				<div class="row">
					<div class="slider-wrapper col-12">
						<div class="slider" id="blog-slider">
							<?php while ( $blogList->have_posts() ) : $blogList->the_post(); ?>
								<a href="<?php the_permalink();?>" target="_blank" class="slide">
									<img
									   class="lazy"
									   data-src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];?>"
									   <?php
									    $altText = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);
									    if ( !empty( $altText ) ):?>
									        alt="<?php echo $altText;?>"
									    <?php else:?>
									        alt="<?php the_title();?>"
									    <?php endif;?>

									>
									<span class="name"><?php the_title();?></span>
									<span class="excerpt"><?php the_excerpt() ;?></span>
									<span class="read-more">
										<?php echo esc_html( pll__( 'Читати далі' ) ); ?>
									</span>
								</a>
							<?php endwhile;?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php
	$judicatureAddress = carbon_get_post_meta(get_the_ID(), 'service_single_page_judicature_address'.yuna_lang_prefix());
	$judicatureWorkSchedule = carbon_get_post_meta(get_the_ID(), 'service_single_page_judicature_work_schedule'.yuna_lang_prefix());
	$judicaturePhoneList = carbon_get_post_meta(get_the_ID(), 'service_single_page_judicature_phone_list'.yuna_lang_prefix());

	if (!empty($judicatureAddress) || !empty($judicaturePhoneList) || !empty($judicatureWorkSchedule)): ?>
		<section class="judicature-info">
			<div class="container">
				<div class="row">
					<div class="judicature-contacts col-12">
						<?php if( !empty($judicatureAddress) ):?>
							<p class="judicature-contacts-item">
								<?php echo $judicatureAddress;?>
							</p>
						<?php endif;?>
						<?php if( !empty($judicatureWorkSchedule) ):?>
							<p class="judicature-contacts-item">
								<?php echo $judicatureWorkSchedule;?>
							</p>
						<?php endif;?>
						<?php if( !empty($judicaturePhoneList) ):?>
							<?php foreach( $judicaturePhoneList as $phone ):

								$phoneToColl = preg_replace( '/[^0-9]/', '', $phone['phone_number']);
								?>

								<?php if( str_contains(strval($phone['phone']), '+') ):?>
								<a href="tel:+<?php echo $phoneToColl;?>" rel="nofollow" class="judicature-contacts-item"><?php echo $phone['phone'];?></a>
							<?php else :?>
								<a href="tel:<?php echo $phoneToColl;?>" rel="nofollow" class="judicature-contacts-item"><?php echo $phone['phone'];?></a>
							<?php endif;?>

							<?php endforeach;?>
						<?php endif;?>
					</div>
				</div>
			</div>
		</section>
	<?php endif;?>

<?php
	$judicatureSourceTitle = carbon_get_post_meta(get_the_ID(), 'service_single_page_judicature_source_title'.yuna_lang_prefix());
	$judicatureSourceList = carbon_get_post_meta(get_the_ID(), 'service_single_page_judicature_source_list'.yuna_lang_prefix());

	if (!empty($judicatureSourceTitle) && !empty($judicatureSourceList)):?>
		<section class="judicature-source">
			<div class="container">
				<div class="row">
					<h2 class="block-title col-12"><?php echo $judicatureSourceTitle;?></h2>
				</div>
				<div class="row">
					<ul class="card-list-wrapper source-list">
						<?php foreach( $judicatureSourceList as $sourceItem):?>
							<li class="card-item source">
								<a href="<?php echo $sourceItem['link'];?>" target="_blank" rel="nofollow"><?php echo $sourceItem['name'];?></a>
							</li>
						<?php endforeach;?>
					</ul>
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
					<div class="col-12 text-center"><?php echo wpautop($judicatureSlogan);?></div>
				</div>
			</div>
		</section>
<?php endif;?>

<?php get_footer();
