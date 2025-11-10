<?php
	/**
	 * The template for displaying the footer
	 *
	 * Contains the closing of the #content div and all content after.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Lawyer_Zarutsky
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

?>
</main>
<footer class="site-footer contacts-footer" id="contact-form">
	<div class="container">
		<div class="row">
			<div class="content col-12">
				<div class="form-wrapper">
					<?php get_template_part('template-parts/form');?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<p><?php echo esc_html( pll__( 'Розроблено в' ) ); ?> <a href="https://smmstudio.com/" rel="nofollow" target="_blank">SMMSTUDIO</a></p>
			</div>
		</div>
	</div>
</footer>
</div>

<?php get_template_part('template-parts/popup');?>

<?php wp_footer(); ?>

</body>
</html>
