<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template post type: services
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package lawyer_zarutsky
	 */

	get_header();?>
	<section class="main-screen serviсe-single-main-screen" style="background-image: url(<?php the_post_thumbnail_url();?>)">
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
								<h3 class="category page-title" data-aos="zoom-out" data-aos-duration="300">
                  <?php echo $category->name;?>
                </h3>
							<?php endif;?>
						<?php endforeach;?>
					<h1 class="main-title card-title" data-aos="zoom-out" data-aos-duration="300">
            <?php the_title();?>
          </h1>
					<?php
						$mainBtnText = carbon_get_post_meta(get_the_ID(), 'service_single_page_main_btn_text'.yuna_lang_prefix());
						if( !empty($mainBtnText) ):?>
							<div class="button white-btn" data-bs-toggle="modal" data-bs-target="#formModal" data-aos="zoom-out" data-aos-duration="300">
								<?php echo $mainBtnText; ?>
							</div>
						<?php endif;?>
				</div>
			</div>
		</div>
	</section>

<?php

	$parentPage = carbon_get_post_meta(get_the_ID(), 'service_single_page_parent');

	$breadcrumbsArgs = array(
		'parent_page' => $parentPage
	);

	get_template_part('template-parts/breadcrumbs', null, $breadcrumbsArgs);

?>

<?php
	$serviceShortText = carbon_get_post_meta(get_the_ID(), 'service_single_page_short_about'.yuna_lang_prefix());

	if (!empty($serviceShortText)):?>
		<section class="service-short-wrapper indent-bottom-big">
			<div class="container">
				<div class="row">
					<div class="text-content block-title text-center col-12" data-aos="fade-up" data-aos-duration="300">
						<?php echo wpautop($serviceShortText);?>
					</div>
				</div>
			</div>
		</section>
	<?php endif;?>

<?php
	$serviceFullInfoTitle = carbon_get_post_meta(get_the_ID(), 'service_single_page_service_info_title'.yuna_lang_prefix());
	$serviceFullInfoList = carbon_get_post_meta(get_the_ID(), 'service_single_page_service_info_list'.yuna_lang_prefix());

	if (!empty($serviceFullInfoList)):?>
		<section class="service-full-info-wrapper indent-top-big indent-bottom-big">
      <div class="container">
	      <?php if( !empty($serviceFullInfoTitle) ):?>
          <div class="row">
            <h2 class="block-title col-12" data-aos="fade-up" data-aos-duration="300">
				      <?php echo str_replace(['<p>', '</p>'], '', $serviceFullInfoTitle );?>
            </h2>
          </div>
	      <?php endif;?>
        <div class="row">
          <ul class="service-info-list card-list-wrapper col-12">
			      <?php foreach( $serviceFullInfoList as $index=>$item):?>
              <li class="card-item item" data-aos="flip-left" data-aos-duration="500" data-aos-delay="<?php echo ($index + 1) * 200;?>">
					      <?php if( !empty($item['name']) ):?>
                  <h3 class="name card-title"><?php echo $item['name'];?></h3>
					      <?php endif;?>
                <div class="description"><?php echo wpautop($item['description']);?></div>
              </li>
			      <?php endforeach;?>
          </ul>
        </div>
      </div>
		</section>
	<?php endif;?>

<?php
	$callTitle = carbon_get_post_meta(get_the_ID(), 'service_single_page_call_title'.yuna_lang_prefix());
	$callText = carbon_get_post_meta(get_the_ID(), 'service_single_page_call_text'.yuna_lang_prefix());
	$callBtnText = carbon_get_post_meta(get_the_ID(), 'service_single_page_call_btn_text'.yuna_lang_prefix());
	$callBgImage = carbon_get_post_meta(get_the_ID(), 'service_single_page_call_image'.yuna_lang_prefix());

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

		<section class="our-cases indent-top-big indent-bottom-big">
			<div class="container">
				<div class="row">
					<h2 class="block-title col-12" data-aos="fade-up" data-aos-duration="300">
            <?php echo $casesTitle;?>
          </h2>
					<?php if( !empty($casesSubTitle) ):?>
						<h3 class="subtitle col-12" data-aos="fade-up" data-aos-duration="300">
              <?php echo $casesSubTitle;?>
            </h3>
					<?php endif;?>
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
			'posts_per_page' => 2,
			'orderby' 	 => 'date',
			'post_type'  => 'news',
			'post_status'    => 'publish'
		);
	}


	$blogList = new WP_Query( $blogArgs );

	if ( $blogList->have_posts() && $blogTitle ) :?>

		<section class="news-list indent-bottom-small indent-top-big">
			<div class="container">
				<div class="row">
					<h2 class="block-title col-12" data-aos="fade-up" data-aos-duration="300">
            <?php echo $blogTitle;?>
          </h2>
				</div>
				<div class="row">
					<?php while ( $blogList->have_posts() ) : $blogList->the_post(); ?>
            <a href="<?php the_permalink();?>" target="_blank" class="news-post col-md-6" data-aos="fade-up" data-aos-duration="300">
                  <span class="pic-wrapper">
                    <img
                        class="lazy object-fit"
                        data-src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];?>"
                       <?php
	                       $altText = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);
	                       if ( !empty( $altText ) ):?>
                           alt="<?php echo $altText;?>"
	                       <?php else:?>
                           alt="<?php the_title();?>"
	                       <?php endif;?>
                    >
                  </span>
              <span class="name card-title"><?php the_title();?></span>
              <span class="description"><?php echo get_the_excerpt();?></span>
              <span class="more-btn">
                    <?php echo esc_html( pll__( 'Читати далі' ) ); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M5 2L10.1958 6.76285C10.6282 7.15918 10.6282 7.84082 10.1958 8.23715L5 13" stroke="#0F0F0F" stroke-linecap="round"/>
                      </svg>
						      </span>
            </a>
					<?php endwhile;?>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php wp_reset_postdata(); ?>



<?php get_footer();
