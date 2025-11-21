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
	$mainScreenBg = carbon_get_post_meta(get_the_ID(), 'about_us_page_main_image'.yuna_lang_prefix());

	if (!empty($mainScreenTitle)): ?>
		<section class="main-screen" style="background-image: url(<?php echo $mainScreenBg ;?>)">
			<div class="container">
				<div class="row">
					<div class="content col-lg-6 col-12">
						<h1 class="main-title page-title" data-aos="zoom-out" data-aos-duration="300">
              <?php echo $mainScreenTitle;?>
            </h1>
						<?php if( !empty($mainScreenSlogan) ):?>
							<p class="slogan" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="100">
                <?php echo $mainScreenSlogan;?>
              </p>
						<?php endif;?>
						<?php if( !empty($mainScreenBtnText) ):?>
							<div class="button white-btn" data-bs-toggle="modal" data-bs-target="#formModal" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="150">
								<?php echo $mainScreenBtnText; ?>
							</div>
						<?php endif;?>
					</div>
				</div>
				<?php
					$ourNumbersList = carbon_get_post_meta(get_the_ID(), 'about_us_page_our_numbers_list'.yuna_lang_prefix());

					if (!empty($ourNumbersList)):?>
            <div class="row">
              <ul class="card-list-wrapper numbers-list col-12">
								<?php foreach( $ourNumbersList as $index=>$number ):?>
                  <li class="card-item item" data-aos="fade-up" data-aos-duration="300" data-aos-delay="<?php echo ($index + 1) * 150;?>">
										<?php if( !empty($number['name']) ):?>
                      <p class="number card-title"><?php echo $number['name'];?></p>
										<?php endif;?>
										<?php if( !empty($number['description']) ):?>
                      <p class="description"><?php echo $number['description'];?></p>
										<?php endif;?>
                  </li>
								<?php endforeach;?>
              </ul>
            </div>
					<?php endif;?>
			</div>
		</section>
	<?php endif;?>
  <?php get_template_part('template-parts/breadcrumbs');?>



<?php
	$whoWeAreTitle = carbon_get_post_meta(get_the_ID(), 'about_us_page_how_we_are_title'.yuna_lang_prefix());
	$whoWeAreText = carbon_get_post_meta(get_the_ID(), 'about_us_page_how_we_are_text'.yuna_lang_prefix());
	$whoWeAreImage1 = carbon_get_post_meta(get_the_ID(), 'about_us_page_how_we_are_image_1'.yuna_lang_prefix());
	$whoWeAreImage2 = carbon_get_post_meta(get_the_ID(), 'about_us_page_how_we_are_image_2'.yuna_lang_prefix());

	if (!empty($whoWeAreTitle) && !empty($whoWeAreText)):?>
		<section class="about-us indent-bottom-big">
			<div class="container">
				<div class="row">
          <div class="content col-12 indent-top-big indent-bottom-big">
            <div class="text-wrapper">
							<?php if( !empty($whoWeAreTitle) ):?>
                <h2 class="block-title" data-aos="fade-up" data-aos-duration="300">
                  <?php echo str_replace(['<p>', '</p>'], '', $whoWeAreTitle );?>
                </h2>
							<?php endif;?>

              <div class="text" data-aos="fade-up" data-aos-duration="300">
								<?php echo wpautop($whoWeAreText);?>
              </div>
            </div>
            <div class="image-wrapper">
							<?php if( !empty($whoWeAreTitle) ):?>
                <h2 class="block-title" data-aos="fade-up" data-aos-duration="300">
                  <?php echo str_replace(['<p>', '</p>'], '', $whoWeAreTitle );?>
                </h2>
							<?php endif;?>
              <div class="pic-wrapper pic-1" data-aos="fade-up" data-aos-duration="300" data-aos-delay="100">
                <img
                    class="lazy object-fit"
                    data-src="<?php echo wp_get_attachment_image_src($whoWeAreImage1, 'full')[0];?>"
									<?php
										$altText = get_post_meta($whoWeAreImage1, '_wp_attachment_image_alt', TRUE);
										if ( !empty( $altText ) ):?>
                      alt="<?php echo $altText;?>"
										<?php else:?>
                      alt="<?php echo get_bloginfo('name');?>"
										<?php endif;?>
                >
              </div>
							<?php if( !empty($whoWeAreImage2) ):?>
                <div class="pic-wrapper pic-2" data-aos="fade-up" data-aos-duration="300" data-aos-delay="150">
                  <img
                      class="lazy object-fit"
                      data-src="<?php echo wp_get_attachment_image_src($whoWeAreImage2, 'full')[0];?>"
										<?php
											$altText = get_post_meta($whoWeAreImage2, '_wp_attachment_image_alt', TRUE);
											if ( !empty( $altText ) ):?>
                        alt="<?php echo $altText;?>"
											<?php else:?>
                        alt="<?php echo get_bloginfo('name');?>"
											<?php endif;?>
                  >
                </div>
							<?php endif;?>
            </div>
          </div>
				</div>
			</div>
		</section>
<?php endif;?>

<?php
  $ownerTitle = carbon_get_post_meta(get_the_ID(), 'about_us_page_owner_title'.yuna_lang_prefix());
	$ownerSubTitle = carbon_get_post_meta(get_the_ID(), 'about_us_page_owner_sub_title'.yuna_lang_prefix());
	$ownerFactList = carbon_get_post_meta(get_the_ID(), 'about_us_page_owner_facts'.yuna_lang_prefix());
	$ownerImage = carbon_get_post_meta(get_the_ID(), 'about_us_page_owner_image'.yuna_lang_prefix());

  if( !empty($ownerFactList) && !empty($ownerTitle) && !empty($ownerImage) ):?>

    <section class="owner indent-bottom-big indent-top-big">
      <div class="container">
        <div class="row">
          <div class="image-wrapper col-md-6" data-aos="fade-up" data-aos-duration="300">
            <div class="inner">
              <img
                  class="lazy object-fit"
                  data-src="<?php echo wp_get_attachment_image_src($ownerImage, 'full')[0];?>"
		            <?php
			            $altText = get_post_meta($ownerImage, '_wp_attachment_image_alt', TRUE);
			            if ( !empty( $altText ) ):?>
                    alt="<?php echo $altText;?>"
			            <?php else:?>
                    alt="<?php echo get_bloginfo('name');?>"
			            <?php endif;?>
              >
            </div>
          </div>
          <div class="text-content col-md-6">
            <h2 class="block-title" data-aos="fade-up" data-aos-duration="300">
              <?php echo str_replace(['<p>', '</p>'], '', $ownerTitle );?>
            </h2>
            <?php if( !empty($ownerSubTitle) ):?>
              <h3 class="subtile card-title" data-aos="fade-up" data-aos-duration="300">
                <?php echo $ownerSubTitle;?>
              </h3>
            <?php endif;?>
            <ul class="fact-list">
              <?php foreach( $ownerFactList as $index=>$fact):?>
                <li class="item" data-aos="fade-up" data-aos-duration="300" data-aos-delay="<?php echo ($index + 1) * 150;?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M5 2L10.1958 6.76285C10.6282 7.15918 10.6282 7.84082 10.1958 8.23715L5 13" stroke="#0F0F0F" stroke-linecap="round"/>
                  </svg>
                  <span><?php echo $fact['fact'];?></span>
                </li>
              <?php endforeach;?>
            </ul>
          </div>
        </div>
      </div>
    </section>

<?php endif;?>

<?php
	$ourValuesTitle = carbon_get_post_meta(get_the_ID(), 'about_us_page_values_title'.yuna_lang_prefix());
	$ourValuesList = carbon_get_post_meta(get_the_ID(), 'about_us_page_values_list'.yuna_lang_prefix());
	$ourValuesImage = carbon_get_post_meta(get_the_ID(), 'about_us_page_values_image'.yuna_lang_prefix());

	if (!empty($ourValuesTitle) && !empty($ourValuesList) && !empty($ourValuesImage)):?>
		<section class="our-values indent-top-big indent-bottom-big">
			<div class="container">
				<div class="row">
					<h2 class="block-title col-12" data-aos="fade-up" data-aos-duration="300">
            <?php echo str_replace(['<p>', '</p>'], '', $ourValuesTitle );?>
          </h2>
				</div>
				<div class="row">
          <div class="values-list-wrapper col-12">
            <ul class="card-list-wrapper part first-part">
              <?php foreach( $ourValuesList as $index=>$value):?>
                <?php if( $index < 4 ):?>
                  <li class="item" data-aos="fade-up" data-aos-duration="300">
                    <?php if( !empty($value['title']) ):?>
                      <p class="name card-title"><?php echo $value['title'];?></p>
                    <?php endif;?>
	                  <?php if( !empty($value['description']) ):?>
                      <p class="description"><?php echo $value['description'];?></p>
	                  <?php endif;?>
                  </li>
                <?php endif;?>
              <?php endforeach;?>
            </ul>
            <div class="image-wrapper" data-aos="fade-up" data-aos-duration="300">
              <img
                 class="lazy object-fit"
                 data-src="<?php echo wp_get_attachment_image_src($ourValuesImage, 'full')[0];?>"
                 <?php
                  $altText = get_post_meta($ourValuesImage, '_wp_attachment_image_alt', TRUE);
                  if ( !empty( $altText ) ):?>
                      alt="<?php echo $altText;?>"
                  <?php else:?>
                      alt="<?php echo wp_strip_all_tags($ourValuesTitle);?>"
                  <?php endif;?>

              >
            </div>
            <ul class="card-list-wrapper part second-part">
		          <?php foreach( $ourValuesList as $index=>$value):?>
			          <?php if( $index > 3 ):?>
                  <li class="item" data-aos="fade-up" data-aos-duration="300">
					          <?php if( !empty($value['title']) ):?>
                      <p class="name card-title"><?php echo $value['title'];?></p>
					          <?php endif;?>
					          <?php if( !empty($value['description']) ):?>
                      <p class="description"><?php echo $value['description'];?></p>
					          <?php endif;?>
                  </li>
			          <?php endif;?>
		          <?php endforeach;?>
            </ul>
          </div>
				</div>
			</div>
		</section>
<?php endif;?>


<?php get_footer();
