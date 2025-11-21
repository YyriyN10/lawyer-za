<?php
	if ( ! defined( 'ABSPATH' ) ) {
				exit;
			}

	/**
	 * The template for displaying archive-services pages
	 *
	 * Template name: Template Services
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Lawyer_Zarutsky
	 */
	get_header(); ?>


<?php
  $mainTitle = carbon_get_post_meta(get_the_ID(), 'services_page_main_title'.yuna_lang_prefix());
	$mainText = carbon_get_post_meta(get_the_ID(), 'services_page_main_text'.yuna_lang_prefix());
	$mainBtnText = carbon_get_post_meta(get_the_ID(), 'services_page_main_btn_text'.yuna_lang_prefix());

	if (!empty($mainTitle)):?>
	<section class="main-screen all-service-main-screen" style="background-image: url(<?php the_post_thumbnail_url() ;?>)">
    <div class="container">
      <div class="row">
        <div class="content col-lg-6">
          <h1 class="main-title page-title" data-aos="zoom-out" data-aos-duration="300">
            <?php echo $mainTitle;?>
          </h1>
          <?php if( !empty($mainText) ):?>
            <p class="main-text" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="100">
              <?php echo $mainText;?>
            </p>
          <?php endif;?>
	        <?php if( !empty($mainBtnText) ):?>
            <div class="button white-btn" data-bs-toggle="modal" data-bs-target="#formModal" data-aos="zoom-out" data-aos-duration="300" data-aos-delay="150">
              <span><?php echo $mainBtnText; ?></span>
            </div>
	        <?php endif;?>
        </div>
      </div>
    </div>
  </section>
<?php endif;?>
<?php get_template_part('template-parts/breadcrumbs');?>

<?php
	$serviceSubcat = get_categories( array(
		'taxonomy'     => 'services-tax',
		'type'         => 'services',
		'child_of'     => false,
		'parent'       => 0,
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => false,
		'number'       => 0,
		'pad_counts'   => false,
	) );

	if(!empty($serviceSubcat)):?>
  <section class="full-category indent-bottom-big">
    <div class="container">
      <div class="row">
		    <?php foreach( $serviceSubcat as $subcat ):?>
          <div class="category col-12" id="<?php echo $subcat->slug;?>">
            <div class="about-cat text-center" data-aos="fade-up" data-aos-duration="300">
              <div class="inner">
                <h3 class="cat-name card-title"><?php echo $subcat->name;?></h3>
                <p class="cat-description"><?php echo $subcat->description;?></p>
	              <?php
		              $catExperience = carbon_get_term_meta($subcat->term_id, 'service_experience'.yuna_lang_prefix());

		              if (!empty($catExperience)):?>
                  <div class="experience">
                    <h4 class="exp-title"><?php echo esc_html( pll__( 'Наш досвід' ) ); ?>:</h4>
                    <div class="exp-description"><?php echo wpautop($catExperience);?></div>
                  </div>
                <?php endif;?>
              </div>

                  <div class="button more-btn" data-bs-toggle="modal" data-bs-target="#formModal" data-service="<?php echo $subcat->name;?>">
                    <?php echo esc_html( pll__( 'Залишити заявку' ) ); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                      <path d="M5 2L10.1958 6.76285C10.6282 7.15918 10.6282 7.84082 10.1958 8.23715L5 13" stroke="#0F0F0F" stroke-linecap="round"/>
                    </svg>
                  </div>
            </div>
            <?php
	            $argsService = array(
		            'tax_query' => array(
			            array(
				            'taxonomy' => 'services-tax',
				            'field' => 'id',
				            'terms' => $subcat->term_id,
			            )
		            ),
		            'post_type' => 'services',
		            'orderby' 	 => 'date',
		            'posts_per_page' => -1
	            );

	            $thisService = new WP_Query( $argsService );

	            $i = 0;

			        if ( $thisService->have_posts() ) :?>
                <div class="cat-services-list accordion" id="accordion-<?php echo $subcat->slug;?>">
                  <?php while ( $thisService->have_posts() ) : $thisService->the_post(); $i++;?>
                    <div class="card" data-aos="fade-up" data-aos-duration="300" data-aos-delay="<?php echo $i * 150;?>">
                      <div class="card-header">
                        <a class="collapsed card-title btn" data-bs-toggle="collapse" href="#category-<?php echo $subcat->slug;?>-<?php echo get_the_ID();?>">
                          <?php the_title();?>
                          <span class="indicator">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1542 6.06689C14.8307 6.06689 15.3792 6.59968 15.3792 7.25689L15.3792 17.7891L18.5795 14.3654C19.0484 13.8917 19.8239 13.8769 20.3116 14.3324C20.7992 14.788 20.8144 15.5413 20.3455 16.015L15.0372 21.5684C14.8062 21.8017 14.4874 21.9336 14.1542 21.9336C13.8209 21.9336 13.5021 21.8017 13.2711 21.5684L7.96281 16.015C7.49389 15.5413 7.5091 14.788 7.99678 14.3324C8.48446 13.8769 9.25993 13.8917 9.72885 14.3654L12.9292 17.7891L12.9292 7.25689C12.9292 6.59968 13.4776 6.06689 14.1542 6.06689Z" fill="#F4F4F4"/>
</svg>
                          </span>
                        </a>
                      </div>
                      <div id="category-<?php echo $subcat->slug;?>-<?php echo get_the_ID();?>" class="collapse" data-bs-parent="#accordion-<?php echo $subcat->slug;?>">
                        <div class="card-body">
                          <?php the_excerpt();?>
                          <a href="<?php the_permalink();?>" target="_blank" class="more-btn">
		                        <?php echo esc_html( pll__( 'Дізнатись більше' ) ); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                              <path d="M5 2L10.1958 6.76285C10.6282 7.15918 10.6282 7.84082 10.1958 8.23715L5 13" stroke="#0F0F0F" stroke-linecap="round"/>
                            </svg>
                          </a>
                        </div>
                      </div>
                    </div>
                  <?php endwhile;?>
                </div>
              <?php endif;?>
	          <?php wp_reset_postdata(); ?>
          </div>
		    <?php endforeach;?>
        <?php
	        $judicatureSubcat = get_categories( array(
		        'taxonomy'     => 'judicature-tax',
		        'type'         => 'judicature',
		        'child_of'     => false,
		        'parent'       => 0,
		        'orderby'      => 'name',
		        'order'        => 'ASC',
		        'hide_empty'   => 1,
		        'hierarchical' => false,
		        'number'       => 0,
		        'pad_counts'   => false,
	        ) );

	        $judicatureDescription = carbon_get_theme_option('judicature_main_description'.yuna_lang_prefix());
	        $judicatureExperience = carbon_get_theme_option('judicature_main_experience'.yuna_lang_prefix());
		      if(!empty($judicatureSubcat)):?>
        <div class="category col-12" id="judicature">
          <div class="about-cat text-center" data-aos="fade-up" data-aos-duration="300">
            <div class="inner">
              <h3 class="cat-name card-title"><?php echo esc_html( pll__( 'Суди' ) ); ?></h3>
              <p class="cat-description"><?php echo $judicatureDescription;?></p>
				      <?php
					      if (!empty($judicatureExperience)):?>
                  <div class="experience">
                    <h4 class="exp-title"><?php echo esc_html( pll__( 'Наш досвід' ) ); ?>:</h4>
                    <div class="exp-description"><?php echo wpautop($judicatureExperience);?></div>
                  </div>
					      <?php endif;?>
            </div>

            <div class="button more-btn" data-bs-toggle="modal" data-bs-target="#formModal" data-service="<?php echo esc_html( pll__( 'Суди' ) ); ?>">
				      <?php echo esc_html( pll__( 'Залишити заявку' ) ); ?>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path d="M5 2L10.1958 6.76285C10.6282 7.15918 10.6282 7.84082 10.1958 8.23715L5 13" stroke="#0F0F0F" stroke-linecap="round"/>
              </svg>
            </div>
          </div>
          <div class="cat-services-list accordion" id="accordion-judicature">
          <?php foreach( $judicatureSubcat as $subcat ):?>
				      <?php
				      $argsJudicature = array(
					      'tax_query' => array(
						      array(
							      'taxonomy' => 'judicature-tax',
							      'field' => 'id',
							      'terms' => $subcat->term_id,
						      )
					      ),
					      'post_type' => 'judicature',
					      'orderby' 	 => 'date',
					      'posts_per_page' => -1
				      );

				      $thisJudicature = new WP_Query( $argsJudicature );
				      $i = 0;

				      if ( $thisJudicature->have_posts() ) :?>

                <div class="card" data-aos="fade-up" data-aos-duration="300" data-aos-delay="<?php echo $i * 150;?>">
                  <div class="card-header">
                    <a class="collapsed card-title btn" data-bs-toggle="collapse" href="#category-<?php echo $subcat->slug;?>-<?php echo get_the_ID();?>">
						          <?php echo $subcat->name ;?>
                      <span class="indicator">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1542 6.06689C14.8307 6.06689 15.3792 6.59968 15.3792 7.25689L15.3792 17.7891L18.5795 14.3654C19.0484 13.8917 19.8239 13.8769 20.3116 14.3324C20.7992 14.788 20.8144 15.5413 20.3455 16.015L15.0372 21.5684C14.8062 21.8017 14.4874 21.9336 14.1542 21.9336C13.8209 21.9336 13.5021 21.8017 13.2711 21.5684L7.96281 16.015C7.49389 15.5413 7.5091 14.788 7.99678 14.3324C8.48446 13.8769 9.25993 13.8917 9.72885 14.3654L12.9292 17.7891L12.9292 7.25689C12.9292 6.59968 13.4776 6.06689 14.1542 6.06689Z" fill="#F4F4F4"/>
</svg>
                          </span>
                    </a>
                  </div>
                  <div id="category-<?php echo $subcat->slug;?>-<?php echo get_the_ID();?>" class="collapse" data-bs-parent="#accordion-judicature">
                    <div class="card-body">
                      <ul class="judicature-list">
	                      <?php while ( $thisJudicature->have_posts() ) : $thisJudicature->the_post(); ?>
                          <li class="item">
                            <a href="<?php the_permalink();?>" target="_blank">
                              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                <path d="M13.4739 0.684651L13.099 0.363724C12.4768 -0.169127 11.5417 -0.109732 10.9923 0.497334L4.72124 7.42633L2.82829 5.80172C2.2067 5.26827 1.2715 5.32647 0.72147 5.93288L0.390021 6.29836C0.12123 6.59456 -0.0183323 6.9853 0.00193546 7.38442C0.0224031 7.78332 0.200988 8.15781 0.498696 8.42555L3.96857 11.5919C4.26899 11.873 4.6716 12.0196 5.08312 11.9979C5.49465 11.9762 5.87939 11.7878 6.14821 11.4765L13.6343 2.80871C13.8958 2.50588 14.0259 2.11196 13.9957 1.71366C13.9656 1.31507 13.7779 0.944989 13.4739 0.684651Z" fill="#575757"/>
                              </svg>
                              <span><?php the_title();?></span>
                            </a>
                          </li>
	                      <?php endwhile;?>
                      </ul>
                    </div>
                  </div>
                </div>
            <?php endif;?>
          <?php endforeach;?>
            </div>
		      <?php wp_reset_postdata(); ?>
        </div>
      <?php endif;?>
      </div>
    </div>
  </section>
<?php endif;?>




<?php get_footer();
	
