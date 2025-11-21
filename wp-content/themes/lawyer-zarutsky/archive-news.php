<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * The template for displaying archive-services pages
	 *
	 * Template name: Template News
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Lawyer_Zarutsky
	 */
	get_header(); ?>


<?php
	$mainTitle = carbon_get_post_meta(get_the_ID(), 'news_page_main_title'.yuna_lang_prefix());
	$mainText = carbon_get_post_meta(get_the_ID(), 'news_page_main_text'.yuna_lang_prefix());

	if (!empty($mainTitle)):?>
		<section class="main-screen blog-main-screen" style="background-image: url(<?php the_post_thumbnail_url();?>)">
			<div class="container">
				<div class="row">
          <h1 class="main-title page-title col-12 text-center" data-aos="zoom-out" data-aos-duration="300">
            <?php echo $mainTitle;?>
          </h1>
					<?php if( !empty($mainText) ):?>
            <p class="slogan card-title col-12 text-center" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="100">
              <?php echo $mainText;?>
            </p>
					<?php endif;?>
				</div>
			</div>
		</section>
	<?php endif;?>

<?php get_template_part('template-parts/breadcrumbs');?>

 <?php
 	$newsArgs = array(
 		'posts_per_page' => -1,
 		'orderby' 	 => 'date',
 		'post_type'  => 'news',
 		'post_status'    => 'publish'
 	);

 	$newsList = new WP_Query( $newsArgs );
 	$counter1 = 0;
 	$counter2 = 0;

	$bannerTitle = carbon_get_post_meta(get_the_ID(), 'news_page_banner_title'.yuna_lang_prefix());
	$bannerText = carbon_get_post_meta(get_the_ID(), 'news_page_banner_text'.yuna_lang_prefix());
	$bannerBtnText = carbon_get_post_meta(get_the_ID(), 'news_page_banner_btn_text'.yuna_lang_prefix());
	$bannerImage = carbon_get_post_meta(get_the_ID(), 'news_page_banner_image'.yuna_lang_prefix());

 		  if ( $newsList->have_posts() ) :?>
		    <section class="news-list indent-bottom-big">
			    <div class="container">
				    <div class="row">
					    <?php while ( $newsList->have_posts() ) : $newsList->the_post(); $counter1++;?>
                <?php if( $counter1 < 5 ):?>
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
                <?php endif;?>
					    <?php endwhile;?>
				    </div>
			    </div>
		    </section>
		    <?php if (!empty($bannerTitle) && !empty($bannerBtnText)):?>
          <section class="call-to-action" style="background-image: url(<?php echo $bannerImage;?>)">
            <div class="container">
              <div class="row">
                <div class="content col-12 text-center">
                  <h2 class="block-title" data-aos="zoom-out" data-aos-duration="300">
                    <?php echo $bannerTitle;?>
                  </h2>
							    <?php if( $bannerText ):?>
                    <p class="call" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="100">
                      <?php echo $bannerText;?>
                    </p>
							    <?php endif;?>
                  <div class="button white-btn" data-bs-toggle="modal" data-bs-target="#formModal" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="150">
								    <?php echo $bannerBtnText; ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
		    <?php endif;?>
        <section class="news-list indent-top-big indent-bottom-small">
          <div class="container">
            <div class="row">
					    <?php while ( $newsList->have_posts() ) : $newsList->the_post(); $counter2++;?>
						    <?php if( $counter2 > 4 ):?>
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
						    <?php endif;?>
					    <?php endwhile;?>
            </div>
          </div>
        </section>
 	<?php endif; ?>
 <?php wp_reset_postdata(); ?>

<?php get_footer();

