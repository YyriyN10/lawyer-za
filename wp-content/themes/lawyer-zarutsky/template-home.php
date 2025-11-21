<?php

	if ( ! defined( 'ABSPATH' ) ) {
				exit;
			}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template Home
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package lawyer_zarutsky
	 *
	 */

	get_header();?>

<?php
	$mainScreenTitle = carbon_get_post_meta(get_the_ID(), 'home_page_main_title'.yuna_lang_prefix());
	$mainScreenSlogan = carbon_get_post_meta(get_the_ID(), 'home_page_main_slogan'.yuna_lang_prefix());
	$mainScreenBtnText = carbon_get_post_meta(get_the_ID(), 'home_page_main_btn_text'.yuna_lang_prefix());
	$mainScreenPoster = carbon_get_post_meta(get_the_ID(), 'home_page_main_image'.yuna_lang_prefix());
	$mainScreenVideo = carbon_get_post_meta(get_the_ID(), 'home_page_main_video'.yuna_lang_prefix());

	if (!empty($mainScreenTitle)): ?>
		<section class="main-screen">
      <video src="<?php echo $mainScreenVideo;?>" poster="<?php echo $mainScreenPoster;?>" autoplay loop muted multiple=""></video>
			<div class="container">
				<div class="row">
					<div class="content col-lg-6 col-12">
						<h1 class="main-title page-title" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="100">
              <?php echo $mainScreenTitle;?>
            </h1>
						<?php if( !empty($mainScreenSlogan) ):?>
							<p class="slogan" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="150">
                <?php echo $mainScreenSlogan;?>
              </p>
						<?php endif;?>
						<?php if( !empty($mainScreenBtnText) ):?>
							<div class="button white-btn" data-bs-toggle="modal" data-bs-target="#formModal" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="200">
                <span><?php echo $mainScreenBtnText; ?></span>
							</div>
						<?php endif;?>
					</div>
				</div>
				<?php
					$ourNumbersList = carbon_get_post_meta(get_the_ID(), 'home_page_our_numbers_list'.yuna_lang_prefix());

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

<?php
	$allServicesTitle = carbon_get_post_meta(get_the_ID(), 'home_page_services_title'.yuna_lang_prefix());
	$allServicesLink = carbon_get_post_meta(get_the_ID(), 'home_page_services_page');
	$moreServiceQuestion = carbon_get_post_meta(get_the_ID(), 'home_page_services_question'.yuna_lang_prefix());
	$moreServiceCall = carbon_get_post_meta(get_the_ID(), 'home_page_services_call'.yuna_lang_prefix());
	$moreServiceBtnText = carbon_get_post_meta(get_the_ID(), 'home_page_services_btn_text'.yuna_lang_prefix());
	$moreServiceBgImage = carbon_get_post_meta(get_the_ID(), 'home_page_services_more_bg_image'.yuna_lang_prefix());

	$serviceSubcat = get_categories( array(
		'taxonomy'     => 'services-tax',
		'type'         => 'services',
		'child_of'     => false,
		'parent'       => 0,
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 0,
		'hierarchical' => false,
		'number'       => 0,
		'pad_counts'   => false,
	) );

	if (!empty($allServicesTitle) && !empty($allServicesLink) && !empty($serviceSubcat)):?>

		<section class="our-services indent-top-big">
			<div class="container indent-bottom-big">
				<div class="row">
					<h2 class="block-title col-12" data-aos="fade-up" data-aos-duration="300">
            <?php echo str_replace(['<p>', '</p>'], '', $allServicesTitle );?>
          </h2>
				</div>
				<div class="row">
					<ul class="card-list-wrapper services-list col-12">
						<?php foreach( $serviceSubcat as $index=>$subcat ):?>
							<li class="card-item service-category" data-aos="fade-up" data-aos-duration="300">
								<h3 class="cat-name card-title"><?php echo $subcat->name;?></h3>
								<?php if( !empty($subcat->description) ):?>
									<p class="cat-description"><?php echo $subcat->description;?></p>
								<?php endif;?>
								<?php
									$catExperience = carbon_get_term_meta($subcat->term_id, 'service_experience'.yuna_lang_prefix());

									if (!empty($catExperience)):?>
										<div class="experience">
											<span><?php echo esc_html( pll__( 'Досвід' ) ); ?>:</span> <?php echo wpautop($catExperience);?>
										</div>
								<?php endif;?>
								<a href="<?php echo get_permalink($allServicesLink[0]['id']);?>#<?php echo $subcat->slug;?>" target="_blank" class="more-btn">
									<?php echo esc_html( pll__( 'Дізнатись більше' ) ); ?>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M5 2L10.1958 6.76285C10.6282 7.15918 10.6282 7.84082 10.1958 8.23715L5 13" stroke="#0F0F0F" stroke-linecap="round"/>
                  </svg>
								</a>
							</li>
						<?php endforeach;?>
            <?php
              $judicatureTile = carbon_get_theme_option('judicature_main_title'.yuna_lang_prefix());
	            $judicatureDescription = carbon_get_theme_option('judicature_main_description'.yuna_lang_prefix());

              if( !empty($judicatureTile) && !empty($judicatureDescription) ):?>
                <li class="card-item service-category" data-aos="fade-up" data-aos-duration="300">
                  <h3 class="cat-name card-title"><?php echo $judicatureTile;?></h3>
		              <?php if( !empty($judicatureDescription) ):?>
                    <p class="cat-description"><?php echo $judicatureDescription;?></p>
		              <?php endif;?>
                  <a href="<?php echo get_permalink($allServicesLink[0]['id']);?>#judicature" target="_blank" class="more-btn">
		                <?php echo esc_html( pll__( 'Дізнатись більше' ) ); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                      <path d="M5 2L10.1958 6.76285C10.6282 7.15918 10.6282 7.84082 10.1958 8.23715L5 13" stroke="#0F0F0F" stroke-linecap="round"/>
                    </svg>
                  </a>

                </li>
            <?php endif;?>

					</ul>
				</div>
			</div>
			<?php if( !empty($moreServiceQuestion) && !empty($moreServiceBtnText)  ):?>
        <div class="call-to-action"
          <?php if( !empty($moreServiceBgImage) ):?>
            style="background-image: url(<?php echo $moreServiceBgImage;?>)"
          <?php endif;?>
        >
          <div class="container">
            <div class="row">
              <div class="more-services text-center col-12">
                <h3 class="block-title title" data-aos="zoom-out" data-aos-duration="300" >
                  <?php echo $moreServiceQuestion;?>
                </h3>
			          <?php if( !empty($moreServiceCall) ):?>
                  <p class="call" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="100">
                    <?php echo $moreServiceCall;?>
                  </p>
			          <?php endif;?>

                <div class="button white-btn" data-bs-toggle="modal" data-bs-target="#formModal" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="150">
                  <span><?php echo $moreServiceBtnText; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
			<?php endif;?>
		</section>
<?php endif;?>

<?php
	$ourApproachTitle = carbon_get_post_meta(get_the_ID(), 'home_page_approach_title'.yuna_lang_prefix());
	$ourApproachHowWorkTitle = carbon_get_post_meta(get_the_ID(), 'home_page_approach_how_work_title'.yuna_lang_prefix());
	$ourApproachHowWorkList = carbon_get_post_meta(get_the_ID(), 'home_page_approach_how_work_list'.yuna_lang_prefix());
	$ourApproachNotWorkTitle = carbon_get_post_meta(get_the_ID(), 'home_page_approach_how_not_work_title'.yuna_lang_prefix());
	$ourApproachNotWorkList = carbon_get_post_meta(get_the_ID(), 'home_page_approach_how_not_work_list'.yuna_lang_prefix());
	$ourApproachImage = carbon_get_post_meta(get_the_ID(), 'home_page_approach_image'.yuna_lang_prefix());

	if (!empty($ourApproachTitle) && !empty($ourApproachHowWorkList) && !empty($ourApproachNotWorkList)):?>
		<section class="our-approach indent-top-big indent-bottom-big">
			<div class="container">
				<div class="row">
					<h2 class="block-title col-12" data-aos="fade-up" data-aos-duration="300">
            <?php echo $ourApproachTitle;?>
          </h2>
				</div>
				<div class="row">
          <div class="image-wrapper col-lg-6" data-aos="fade-up" data-aos-duration="300">
            <div class="inner">
              <img
                  class="lazy object-fit"
                  data-src="<?php echo wp_get_attachment_image_src($ourApproachImage, 'full')[0];?>"
		            <?php
			            $altText = get_post_meta($ourApproachImage, '_wp_attachment_image_alt', TRUE);
			            if ( !empty( $altText ) ):?>
                    alt="<?php echo $altText;?>"
			            <?php else:?>
                    alt="<?php echo get_bloginfo('name');?>"
			            <?php endif;?>

              >
            </div>

          </div>

					<div class="how-wrapper col-lg-6">
            <div class="how-item we-work" data-aos="fade-up" data-aos-duration="300">
	            <?php if( !empty($ourApproachHowWorkTitle) ):?>
                <h3 class="title card-title">
                  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                    <g clip-path="url(#clip0_200_3944)">
                      <mask id="mask0_200_3944" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="40">
                        <path d="M40 0H0V40H40V0Z" fill="white"/>
                      </mask>
                      <g mask="url(#mask0_200_3944)">
                        <path d="M27.7341 14.7589L17.2518 25.2412L12.2617 20.2512" stroke="#378D43" stroke-width="2.96854" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <mask id="mask1_200_3944" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="40">
                          <path d="M0 3.8147e-06H40V40H0V3.8147e-06Z" fill="white"/>
                        </mask>
                        <g mask="url(#mask1_200_3944)">
                          <path d="M38.4375 20C38.4375 30.1827 30.1827 38.4375 20 38.4375C9.81726 38.4375 1.5625 30.1827 1.5625 20C1.5625 9.81727 9.81726 1.5625 20 1.5625C30.1827 1.5625 38.4375 9.81727 38.4375 20Z" stroke="#378D43" stroke-width="2.96854" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                      </g>
                    </g>
                    <defs>
                      <clipPath id="clip0_200_3944">
                        <rect width="40" height="40" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                  <span><?php echo $ourApproachHowWorkTitle;?></span>

                </h3>
	            <?php endif;?>
              <ul class="card-list-wrapper how-list">
		            <?php foreach( $ourApproachHowWorkList as $item ):?>
                  <li class="card-item item">
				            <?php echo wpautop($item['description']);?>
                  </li>
		            <?php endforeach;?>
              </ul>
            </div>
            <div class="how-item we-not-work" data-aos="fade-up" data-aos-duration="300">
	            <?php if( !empty($ourApproachNotWorkTitle) ):?>
                <h3 class="title card-title">
                  <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_200_3972)">
                      <mask id="mask0_200_3972" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="40">
                        <path d="M40 0H0V40H40V0Z" fill="white"/>
                      </mask>
                      <g mask="url(#mask0_200_3972)">
                        <mask id="mask1_200_3972" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="40">
                          <path d="M0 3.8147e-06H40V40H0V3.8147e-06Z" fill="white"/>
                        </mask>
                        <g mask="url(#mask1_200_3972)">
                          <path d="M38.4375 20C38.4375 30.1827 30.1827 38.4375 20 38.4375C9.81726 38.4375 1.5625 30.1827 1.5625 20C1.5625 9.81727 9.81726 1.5625 20 1.5625C30.1827 1.5625 38.4375 9.81727 38.4375 20Z" stroke="#8D3738" stroke-width="2.96854" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                          <rect x="26.4492" y="11.0002" width="3.40292" height="21.8527" rx="1.70146" transform="rotate(45 26.4492 11.0002)" fill="#8D3738"/>
                          <path d="M14.6513 12.2023C13.9874 11.5384 12.911 11.5384 12.2471 12.2023C11.5832 12.8662 11.5832 13.9426 12.2471 14.6065L25.2952 27.6545C25.9591 28.3184 27.0355 28.3184 27.6994 27.6545C28.3632 26.9907 28.3632 25.9143 27.6994 25.2504L14.6513 12.2023Z" fill="#8D3738"/>
                        </g>
                      </g>
                    </g>
                    <defs>
                      <clipPath id="clip0_200_3972">
                        <rect width="40" height="40" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>

                  <span><?php echo $ourApproachNotWorkTitle;?></span>
                </h3>
	            <?php endif;?>
              <ul class="card-list-wrapper how-list">
		            <?php foreach( $ourApproachNotWorkList as $item ):?>
                  <li class="card-item item">
				            <?php echo wpautop($item['description']);?>
                  </li>
		            <?php endforeach;?>
              </ul>
            </div>
					</div>
				</div>
			</div>
		</section>
<?php endif;?>

<?php
  $casesTitle = carbon_get_post_meta(get_the_ID(), 'home_page_cases_title'.yuna_lang_prefix());

  $casesArgs = array(
  	'posts_per_page' => -1,
  	'orderby' 	 => 'date',
  	'post_type'  => 'cases',
  	'post_status'    => 'publish'
  );

  $casesList = new WP_Query( $casesArgs );

  if ( $casesList->have_posts() && $casesTitle ) :?>

    <section class="our-cases indent-top-big indent-bottom-big">
      <div class="container">
        <div class="row">
          <h2 class="block-title col-12" data-aos="fade-up" data-aos-duration="300">
            <?php echo str_replace(['<p>', '</p>'], '', $casesTitle );?>
          </h2>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="300">
          <div class="slider-wrapper col-12">
            <div class="slider" id="cases-slider">
	            <?php while ( $casesList->have_posts() ) : $casesList->the_post();

	              $caseProblem = carbon_get_post_meta(get_the_ID(), 'case_problem'.yuna_lang_prefix());
		            $caseDoList = carbon_get_post_meta(get_the_ID(), 'case_do_list'.yuna_lang_prefix());
		            $caseResult = carbon_get_post_meta(get_the_ID(), 'case_result'.yuna_lang_prefix());
	            ?>
                <div class="slide">
                  <h3 class="name card-title text-center"><?php the_title();?></h3>

                  <div class="info-wrapper">
	                  <?php if( !empty($caseProblem) ):?>
                      <div class="problem-wrapper">
                        <p class="section-name"><?php echo esc_html( pll__( 'Запит' ) ); ?>:</p>
			                   <div class="text"><?php echo wpautop($caseProblem);?></div>
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
                </div>
	            <?php endwhile;?>
            </div>
            <div class="controls-wrapper">
              <div class="control prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M21.7773 14.0001C21.7773 13.3236 21.2446 12.7751 20.5873 12.7751H10.0552L13.4788 9.57482C13.9526 9.1059 13.9673 8.33042 13.5118 7.84274C13.0563 7.35506 12.303 7.33986 11.8292 7.80878L6.27588 13.1171C6.04255 13.3481 5.91068 13.6669 5.91068 14.0001C5.91068 14.3334 6.04255 14.6522 6.27588 14.8832L11.8292 20.1915C12.303 20.6604 13.0563 20.6452 13.5118 20.1575C13.9673 19.6698 13.9526 18.8944 13.4788 18.4254L10.0552 15.2251H20.5873C21.2446 15.2251 21.7773 14.6767 21.7773 14.0001Z" fill="#F4F4F4"/>
                </svg>
              </div>
              <div class="control next">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M6.22266 14.0001C6.22266 13.3236 6.75544 12.7751 7.41266 12.7751H17.9448L14.5212 9.57482C14.0474 9.1059 14.0327 8.33042 14.4882 7.84274C14.9437 7.35506 15.697 7.33986 16.1708 7.80878L21.7241 13.1171C21.9575 13.3481 22.0893 13.6669 22.0893 14.0001C22.0893 14.3334 21.9575 14.6522 21.7241 14.8832L16.1708 20.1915C15.697 20.6604 14.9437 20.6452 14.4882 20.1575C14.0327 19.6698 14.0474 18.8944 14.5212 18.4254L17.9448 15.2251H7.41266C6.75544 15.2251 6.22266 14.6767 6.22266 14.0001Z" fill="#F4F4F4"/>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php
	$callTitle = carbon_get_post_meta(get_the_ID(), 'home_page_call_title'.yuna_lang_prefix());
	$callText = carbon_get_post_meta(get_the_ID(), 'home_page_call_text'.yuna_lang_prefix());
	$callBtnText = carbon_get_post_meta(get_the_ID(), 'home_page_call_btn_text'.yuna_lang_prefix());
	$callBgImage = carbon_get_post_meta(get_the_ID(), 'home_page_call_bg_image'.yuna_lang_prefix());

	if (!empty($callTitle) && !empty($callBtnText)):?>
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
            <div class="button white-btn" data-bs-toggle="modal" data-bs-target="#formModal" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="150">
		          <?php echo $callBtnText; ?>
            </div>
          </div>
				</div>
			</div>
		</section>
<?php endif;?>

<?php
	$aboutUsText = carbon_get_post_meta(get_the_ID(), 'home_page_about_us_text'.yuna_lang_prefix());
	$aboutUsImage1 = carbon_get_post_meta(get_the_ID(), 'home_page_about_us_image_1'.yuna_lang_prefix());
	$aboutUsImage2 = carbon_get_post_meta(get_the_ID(), 'home_page_about_us_image_2'.yuna_lang_prefix());
	$aboutUsLink = carbon_get_post_meta(get_the_ID(), 'home_page_about_us_page');
	$aboutUsBtnText = carbon_get_post_meta(get_the_ID(), 'home_page_about_us_btn_text'.yuna_lang_prefix());
	$aboutUsBlockTitle = carbon_get_post_meta(get_the_ID(), 'home_page_about_us_title'.yuna_lang_prefix());


	if (!empty($aboutUsText) && !empty($aboutUsImage1)):?>
		<section class="about-us indent-top-big indent-bottom-big">
			<div class="container">
				<div class="row">
          <div class="content col-12 indent-top-big indent-bottom-big">
            <div class="text-wrapper">
		          <?php if( !empty($aboutUsBlockTitle) ):?>
                <h2 class="block-title" data-aos="fade-up" data-aos-duration="300">
                  <?php echo $aboutUsBlockTitle;?>
                </h2>
		          <?php endif;?>

              <div class="text" data-aos="fade-up" data-aos-duration="300">
			          <?php echo wpautop($aboutUsText);?>
              </div>
		          <?php if( !empty($aboutUsLink) && !empty($aboutUsBtnText)):?>
                <a href="<?php echo get_permalink($aboutUsLink[0]['id']);?>" target="_blank" class="more-btn" data-aos="fade-up" data-aos-duration="300">
				          <?php echo $aboutUsBtnText;?>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M5 2L10.1958 6.76285C10.6282 7.15918 10.6282 7.84082 10.1958 8.23715L5 13" stroke="#0F0F0F" stroke-linecap="round"/>
                  </svg>
                </a>
		          <?php endif;?>
            </div>
            <div class="image-wrapper">
	            <?php if( !empty($aboutUsBlockTitle) ):?>
                <h2 class="block-title" data-aos="fade-up" data-aos-duration="300">
                  <?php echo $aboutUsBlockTitle;?>
                </h2>
	            <?php endif;?>
              <div class="pic-wrapper pic-1" data-aos="fade-up" data-aos-duration="300" data-aos-delay="100">
                <img
                    class="lazy object-fit"
                    data-src="<?php echo wp_get_attachment_image_src($aboutUsImage1, 'full')[0];?>"
		              <?php
			              $altText = get_post_meta($aboutUsImage1, '_wp_attachment_image_alt', TRUE);
			              if ( !empty( $altText ) ):?>
                      alt="<?php echo $altText;?>"
			              <?php else:?>
                      alt="<?php echo get_bloginfo('name');?>"
			              <?php endif;?>
                >
              </div>
              <?php if( !empty($aboutUsImage2) ):?>
                <div class="pic-wrapper pic-2" data-aos="fade-up" data-aos-duration="300" data-aos-delay="150">
                  <img
                      class="lazy object-fit"
                      data-src="<?php echo wp_get_attachment_image_src($aboutUsImage2, 'full')[0];?>"
			              <?php
				              $altText = get_post_meta($aboutUsImage2, '_wp_attachment_image_alt', TRUE);
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
	$ourStepsTitle = carbon_get_post_meta(get_the_ID(), 'home_page_steps_title'.yuna_lang_prefix());
	$ourStepsList = carbon_get_post_meta(get_the_ID(), 'home_page_steps_list'.yuna_lang_prefix());

	if (!empty($ourStepsTitle) && !empty($ourStepsList)):?>
		<section class="our-steps indent-top-big indent-bottom-small">
			<div class="container">
				<div class="row">
					<h2 class="block-title col-12" data-aos="fade-up" data-aos-duration="300">
            <?php echo str_replace(['<p>', '</p>'], '', $ourStepsTitle );?>
          </h2>
				</div>
				<div class="row">
					<ol class="card-list-wrapper step-list col-12">
						<?php foreach( $ourStepsList as $index=>$step ):?>
							<li class="card-item step" data-aos="flip-left" data-aos-duration="500" data-aos-delay="<?php echo ($index + 1) * 200;?>">
                <div class="icon-wrapper">
                  <img class="svg-pic" src="<?php echo $step['icon'];?>" alt="<?php echo $step['name'];?>">
                </div>
								<div class="step-info">
									<p class="name card-title"><?php echo $step['name'];?></p>
									<p class="description"><?php echo $step['description'];?></p>
								</div>
							</li>
						<?php endforeach;?>

					</ol>
				</div>
			</div>
		</section>
<?php endif;?>
<?php get_footer();
