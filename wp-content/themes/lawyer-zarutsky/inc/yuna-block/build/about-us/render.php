<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

?>

<?php if( !empty($attributes['blockText'])):?>
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
        <div class="text-content col-lg-6" data-aos="fade-up" data-aos-duration="300" data-aos-easing="ease-in-out-back">
          <?php echo $attributes['blockText'];?>
	        <?php if ( !empty( $attributes['btnText'] ) && (!empty($attributes['btnAnchor']) || !empty($attributes['pageId'])) ):?>
            <?php if( $attributes['btnTargetType'] == "modal" ):?>
              <div class="button <?php echo $attributes['btnColor'];?>" data-bs-toggle="modal" data-bs-target="#<?php echo $attributes['btnAnchor'];?>">
				        <?php echo $attributes['btnText'];?>
              </div>
            <?php endif;?>
		        <?php if( $attributes['btnTargetType'] == "block" ):?>
              <a href="#<?php echo $attributes['btnAnchor'];?>" class="scroll-to button <?php echo $attributes['btnColor'];?>">
				        <?php echo $attributes['btnText'];?>
              </a>
		        <?php endif;?>
		        <?php if( $attributes['btnTargetType'] == "page" ):?>
              <a href="<?php echo get_permalink($attributes['pageId']) ;?>" class="button <?php echo $attributes['btnColor'];?>">
				        <?php echo $attributes['btnText'];?>
              </a>
		        <?php endif;?>
	        <?php endif;?>
        </div>
        <div class="image-wrapper col-lg-6" data-aos="fade-up" data-aos-duration="300" data-aos-delay="150" data-aos-easing="ease-in-out-back">
          <img
             class="lazy"
             data-src="<?php echo $attributes['imageUrl'];?>"
             <?php
              $altText = $attributes['imageAlt'];
              if ( !empty( $altText ) ):?>
                  alt="<?php echo $altText;?>"
              <?php else:?>
                  alt="<?php get_bloginfo('name');?>"
              <?php endif;?>
          >
        </div>
			</div>
		</div>
	</section>

<?php endif;?>


