<?php

	if ( ! defined( 'ABSPATH' ) ) {
				exit;
			}

	?>

<form method="post">
	<input type="hidden" name="action" value="form_integration">
	<div class="form-group">
		<input type="text" name="name" class="form-control" placeholder="<?php echo esc_html( pll__( 'Ім’я' ) ); ?>"
		       required>
	</div>
	<div class="form-group">
		<input type="tel" name="phone" class="form-control" placeholder="<?php echo esc_html( pll__( 'Телефон' ) ); ?>"
		       required>
	</div>
	<div class="form-group">
		<input type="email" name="email" class="form-control" placeholder="Email" required>
	</div>

	<button type="submit" class="button black-btn">
    <span><?php echo esc_html( pll__( 'Зв’яжіться зі мною' ) ); ?></span>
  </button>
	<input type="hidden" name="home-url" value="<?php echo home_url( '/' ); ?>">
	<input type="hidden" name="page-name" value="<?php the_title(); ?>">
	<input type="hidden" name="page-url" value="<?php the_permalink(); ?>">
	<input type="hidden" name="service" value="">
	<?php wp_nonce_field( "form_integration" ); ?>

</form>
