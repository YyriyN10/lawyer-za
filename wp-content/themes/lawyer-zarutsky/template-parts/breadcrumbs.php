<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

?>

<section class="breadcrumbs" >
  <div class="container">
    <div class="row" data-aos="fade-up" data-aos-duration="300">
      <ul class="crumbs-list col-12">
        <li class="crumb">
          <a href="<?php echo home_url('/');?>">
            <?php echo get_the_title( get_option('page_on_front') );;?>
          </a>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
            <path d="M5 2L10.1958 6.76285C10.6282 7.15918 10.6282 7.84082 10.1958 8.23715L5 13" stroke="#575757" stroke-linecap="round"/>
          </svg>
        </li>
        <?php if( !empty($args['parent_page']) ):?>
          <li class="crumb">
            <a href="<?php echo get_permalink($args['parent_page'][0]['id']);?>">
			        <?php echo get_the_title( $args['parent_page'][0]['id'] );;?>
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M5 2L10.1958 6.76285C10.6282 7.15918 10.6282 7.84082 10.1958 8.23715L5 13" stroke="#575757" stroke-linecap="round"/>
            </svg>
          </li>
        <?php endif;?>
        <li class="crumb current-crumb">
          <?php the_title();?>
        </li>
      </ul>
    </div>
  </div>
</section>
