<?php

	if ( ! defined( 'ABSPATH' ) ) {
				exit;
			}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template About Us
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package lawyer_zarutsky
	 *
	 */

	get_header();?>

<?php
	$mainScreenTitle = carbon_get_post_meta(get_the_ID(), 'about_us_page_main_title'.yuna_lang_prefix());
	$mainScreenSlogan = carbon_get_post_meta(get_the_ID(), 'about_us_page_main_slogan'.yuna_lang_prefix());
	$mainScreenBtnText = carbon_get_post_meta(get_the_ID(), 'about_us_page_main_btn_text'.yuna_lang_prefix());

	if (!empty($mainScreenTitle)): ?>
		<section class="main-screen">
			<div class="container">
				<div class="row">
					<div class="content col-12 text-center">
						<h1 class="main-title"><?php echo $mainScreenTitle;?></h1>
						<?php if( !empty($mainScreenSlogan) ):?>
							<p class="slogan"><?php echo $mainScreenSlogan;?></p>
						<?php endif;?>
						<?php if( !empty($mainScreenBtnText) ):?>
							<div class="button" data-bs-toggle="modal" data-bs-target="#formModal">
								<?php echo $mainScreenBtnText; ?>
							</div>
						<?php endif;?>
					</div>
				</div>
			</div>
		</section>
	<?php endif;?>

<?php
	$ourNumbersList = carbon_get_post_meta(get_the_ID(), 'about_us_page_our_numbers_list'.yuna_lang_prefix());

	if (!empty($ourNumbersList)):?>
		<section class="our-numbers">
			<div class="container">
				<div class="row">
					<ul class="card-list-wrapper numbers-list col-12">
						<?php foreach( $ourNumbersList as $number ):?>
							<li class="card-item item">
								<?php if( !empty($number['name']) ):?>
									<p class="number"><?php echo $number['name'];?></p>
								<?php endif;?>
								<?php if( !empty($number['description']) ):?>
									<p class="number"><?php echo $number['description'];?></p>
								<?php endif;?>
							</li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>
		</section>
	<?php endif;?>

<?php
	$whoWeAreTitle = carbon_get_post_meta(get_the_ID(), 'about_us_page_how_we_are_title'.yuna_lang_prefix());
	$whoWeAreList = carbon_get_post_meta(get_the_ID(), 'about_us_page_how_we_are_list'.yuna_lang_prefix());

	if (!empty($whoWeAreTitle) && !empty($whoWeAreList)):?>
		<section class="who-we-are">
			<div class="container">
				<div class="row">
					<h2 class="block-title col-12"><?php echo $whoWeAreTitle;?></h2>
				</div>
				<div class="row">
					<?php foreach( $whoWeAreList as $item ):?>
						<div class="item-row col-12">
							<div class="text-wrapper">
								<?php if( !empty($item['title']) ):?>
									<h3 class="title"><?php echo $item['title'];?></h3>
								<?php endif;?>
								<?php if( !empty($item['text']) ):?>
									<div class="text"><?php echo wpautop($item['text']);?></div>
								<?php endif;?>
							</div>
							<div class="pic-wrapper">
								<img
								   class="lazy"
								   data-src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];?>"
								   <?php
								    $altText = get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE);
								    if ( !empty( $altText ) ):?>
								        alt="<?php echo $altText;?>"
								    <?php else:?>
								        alt="<?php echo $item['title'];?>"
								    <?php endif;?>
								>
							</div>
						</div>
					<?php endforeach;?>
				</div>
			</div>
		</section>
<?php endif;?>

<?php
	$ourValuesTitle = carbon_get_post_meta(get_the_ID(), 'about_us_page_values_title'.yuna_lang_prefix());
	$ourValuesList = carbon_get_post_meta(get_the_ID(), 'about_us_page_values_list'.yuna_lang_prefix());

	if (!empty($ourValuesTitle) && !empty($ourValuesList)):?>
		<section class="our-values">
			<div class="container">
				<div class="row">
					<h2 class="block-title col-12 text-center"><?php echo $ourValuesTitle;?></h2>
				</div>
				<div class="row">
					<ul class="card-list-wrapper values-list col-12">
						<?php foreach( $ourValuesList as $value ):?>
							<li class="card-item value-item">
								<?php if( !empty($value['icon']) ):?>
									<div class="icon-wrapper">
										<img
											class="lazy svg-pic"
											data-src="<?php echo wp_get_attachment_image_src($value['icon'], 'full')[0];?>"
											<?php
												$altText = get_post_meta($value['icon'], '_wp_attachment_image_alt', TRUE);
												if ( !empty( $altText ) ):?>
													alt="<?php echo $altText;?>"
												<?php else:?>
													alt="<?php echo $value['title'];?>"
												<?php endif;?>

										>
									</div>
								<?php endif;?>

								<?php if( !empty($value['title']) ):?>
									<p class="name"><?php echo $value['title'];?></p>
								<?php endif;?>

								<?php if( !empty($value['description']) ):?>
									<p class="description"><?php echo $value['description'];?></p>
								<?php endif;?>

							</li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>
		</section>
<?php endif;?>


<?php get_footer();
