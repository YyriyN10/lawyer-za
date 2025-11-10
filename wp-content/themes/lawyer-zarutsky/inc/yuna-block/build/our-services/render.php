<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$servicesList = carbon_get_theme_option('services_list'.yuna_lang_prefix());
?>

<?php if( !empty($attributes['blockTitle']) && !empty($servicesList) ):?>
	<?php
		$blockAttr = get_block_wrapper_attributes();

		if ( !empty( $attributes['topIndent']) || !empty( $attributes['bottomIndent']) ){
			$indent = $attributes['topIndent'].' '.$attributes['bottomIndent'];
			$blockAttr = get_block_wrapper_attributes(["class" => $indent]);
		}

	?>

	<section <?php echo $blockAttr; ?>
			<?php if( !empty($attributes['anchorId']) ):?>
				id="<?php echo $attributes['anchorId'];?>"
			<?php endif;?>
	>
		<div class="container">
			<div class="row">
        <h2 class="block-title col-12" data-aos="fade-up" data-aos-duration="300" data-aos-easing="ease-in-out-back">
          <?php echo $attributes['blockTitle'];?>
        </h2>
			</div>
      <div class="row">
	      <?php foreach( $servicesList as $index=>$service ):?>
          <a href="<?php echo get_permalink($attributes['pageId']);?>#<?php echo $service['anchor'];?>" class="cat" data-aos="fade-up" data-aos-duration="300" data-aos-easing="ease-in-out-back">
            <span class="name"><?php echo $service['name'];?></span>
            <span class="description"><?php echo $service['description'];?></span>
            <span class="service_experience"><?php echo $service['experience'];?></span>
            <span class="more"><?php echo esc_html( pll__( 'ДІЗНАТИСЬ БІЛЬШЕ' ) ); ?></span>
          </a>
	      <?php endforeach;?>

        <?php if( (!empty($attributes['callTitle']) || !empty($attributes['callText'])) && !empty($attributes['btnAnchor']) ):?>
          <div class="cat call-more" data-aos="fade-up" data-aos-duration="300" data-aos-easing="ease-in-out-back">
            <h3 class="title"><?php echo $attributes['callTitle'];?></h3>
            <p class="text"><?php echo $attributes['callText'];?></p>
		        <?php if ( !empty( $attributes['btnText'] ) && !empty($attributes['btnAnchor']) ):?>
              <div class="button <?php echo $attributes['btnColor'];?>" data-bs-toggle="modal" data-bs-target="#<?php echo $attributes['btnAnchor'];?>">
				        <?php echo $attributes['btnText'];?>
              </div>
		        <?php endif;?>
          </div>
        <?php endif;?>

      </div>
		</div>
	</section>

<?php endif;?>


