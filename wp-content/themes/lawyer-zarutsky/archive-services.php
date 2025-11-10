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

	if (!empty($mainTitle)):?>
	<section class="main-screen">
    <div class="container">
      <div class="row">
        <div class="content col-12 text-center">
          <h1 class="main-title"><?php echo $mainTitle;?></h1>
          <?php if( !empty($mainText) ):?>
            <p class="main-text"><?php echo $mainText;?></p>
          <?php endif;?>
        </div>
      </div>
    </div>
  </section>
<?php endif;?>

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
  <section class="full-category">
    <div class="container">
      <div class="row">
		    <?php foreach( $serviceSubcat as $subcat ):?>
          <div class="category col-12" id="<?php echo $subcat->slug;?>">
            <div class="about-cat">
              <h3 class="cat-name"><?php echo $subcat->name;?></h3>
              <p class="cat-description"><?php echo $subcat->description;?></p>
              <?php
                $catExperience = carbon_get_term_meta($subcat->term_id, 'service_experience'.yuna_lang_prefix());

                if (!empty($catExperience)):?>
                <div class="experience">
                  <?php echo wpautop($catExperience);?>
                </div>
                  <div class="button" data-bs-toggle="modal" data-bs-target="#formModal" data-service="<?php echo $subcat->name;?>">
                    <?php echo esc_html( pll__( 'ЗАЛИШИТИ ЗАЯВКУ' ) ); ?>
                  </div>
              <?php endif;?>
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

			        if ( $thisService->have_posts() ) :?>
                <div class="cat-services-list accordion" id="accordion-<?php echo $subcat->slug;?>">
                  <?php while ( $thisService->have_posts() ) : $thisService->the_post(); ?>
                    <div class="card">
                      <div class="card-header">
                        <a class="collapsed btn" data-bs-toggle="collapse" href="#category-<?php echo $subcat->slug;?>-<?php echo get_the_ID();?>">
                          <?php the_title();?>
                        </a>
                      </div>
                      <div id="category-<?php echo $subcat->slug;?>-<?php echo get_the_ID();?>" class="collapse" data-bs-parent="#accordion-<?php echo $subcat->slug;?>">
                        <div class="card-body">
                          <?php the_excerpt();?>
                        </div>
                      </div>
                    </div>
                  <?php endwhile;?>
                </div>
              <?php endif;?>
	          <?php wp_reset_postdata(); ?>
          </div>
		    <?php endforeach;?>
      </div>
    </div>
  </section>
<?php endif;?>




<?php get_footer();
	
