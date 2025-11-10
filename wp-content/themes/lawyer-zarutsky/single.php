<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lawyer_Zarutsky
 */
if ( ! defined( 'ABSPATH' ) ) {
			exit;
		}

get_header();?>
	<section class="main-screen">
		<div class="container">
			<div class="row">
				<div class="content col-12 text-center">
					<h1 class="main-title"><?php the_title();?></h1>
					<?php
						$newsMainSubTile = carbon_get_post_meta(get_the_ID(), 'news_single_page_main_sub_title'.yuna_lang_prefix());

						if( !empty($newsMainSubTile) ):?>
							<p class="subtitle"><?php echo $newsMainSubTile;?></p>
					<?php endif;?>
				</div>
			</div>
		</div>
	</section>
<?php
	$topContentPart = carbon_get_post_meta(get_the_ID(), 'news_single_page_top_content_part'.yuna_lang_prefix());

	if (!empty($topContentPart)):?>
	<section class="news-body">
		<div class="container">
			<div class="row">
				<div class="content col-12"><?php echo wpautop($topContentPart);?></div>
			</div>
		</div>
	</section>
<?php endif;?>

<?php
	$callTitle = carbon_get_post_meta(get_the_ID(), 'news_single_page_call_title'.yuna_lang_prefix());
	$callText = carbon_get_post_meta(get_the_ID(), 'news_single_page_call_text'.yuna_lang_prefix());
	$callBtnText = carbon_get_post_meta(get_the_ID(), 'news_single_page_call_btn_text'.yuna_lang_prefix());

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
	$bottomContentPart = carbon_get_post_meta(get_the_ID(), 'news_single_page_bottom_content_part'.yuna_lang_prefix());

	if (!empty($bottomContentPart)):?>
		<section class="news-body">
			<div class="container">
				<div class="row">
					<div class="content col-12"><?php echo wpautop($bottomContentPart);?></div>
				</div>
			</div>
		</section>
	<?php endif;?>
<?php get_footer();
