<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template post type: news
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package lawyer_zarutsky
	 */

	get_header();?>
	<section class="main-screen news-single-main-screen" style="background-image: url(<?php the_post_thumbnail_url();?>)">
		<div class="container">
			<div class="row">
				<div class="content col-12 text-center">
					<h1 class="main-title page-title" data-aos="zoom-out" data-aos-duration="300">
            <?php the_title();?>
          </h1>
					<?php
            $postSubtitle = carbon_get_post_meta(get_the_ID(), 'news_single_page_main_sub_title'.yuna_lang_prefix());

						if( !empty($postSubtitle) ):?>
              <p class="subtitle card-title" data-aos="fade-up" data-aos-duration="300" data-aos-delay="100">
                <?php echo $postSubtitle;?>
              </p>

					<?php endif;?>
				</div>
			</div>
		</div>
	</section>

  <?php

  $parentPage = carbon_get_post_meta(get_the_ID(), 'news_single_page_parent');

  $breadcrumbsArgs = array(
      'parent_page' => $parentPage
  );

  get_template_part('template-parts/breadcrumbs', null, $breadcrumbsArgs);

  ?>

<?php
	$postContent = carbon_get_post_meta(get_the_ID(), 'news_single_page_content'.yuna_lang_prefix());

	if (!empty($postContent)):?>
		<section class="news-post-content indent-bottom-big">
			<div class="container">
				<div class="row">
					<div class="content col-12" data-aos="fade-up" data-aos-duration="300">
						<?php echo wpautop($postContent);?>
					</div>
				</div>
			</div>
		</section>
	<?php endif;?>

<?php
	$callTitle = carbon_get_post_meta(get_the_ID(), 'news_single_page_call_title'.yuna_lang_prefix());
	$callText = carbon_get_post_meta(get_the_ID(), 'news_single_page_call_text'.yuna_lang_prefix());
	$callBtnText = carbon_get_post_meta(get_the_ID(), 'news_single_page_call_btn_text'.yuna_lang_prefix());
	$callImage = carbon_get_post_meta(get_the_ID(), 'news_single_page_call_image'.yuna_lang_prefix());

	if (!empty($callTitle) && !empty($callBtnText)):?>
		<section class="call-to-action" style="background-image: url(<?php echo $callImage;?>)">
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
<?php get_footer();
