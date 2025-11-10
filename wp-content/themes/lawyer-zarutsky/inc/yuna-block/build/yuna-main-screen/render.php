<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>

<?php if( !empty($attributes['blockTitle']) ):?>
	<?php
		$blockAttr = get_block_wrapper_attributes();

	?>

	<section <?php echo $blockAttr; ?>
			<?php if( !empty($attributes['anchorId']) ):?>
				id="<?php echo $attributes['anchorId'];?>"
			<?php endif;?>
      <?php if (!empty($attributes['backgroundImageUrl'])):?>
        style="background-image: url(<?php echo $attributes['backgroundImageUrl'];?>)"
      <?php endif;?>
	>
		<div class="container-fluid">
			<div class="row">
				<?php if( !empty($attributes['blockTitle'])):?>
          <h1 class="main-title col-12" data-aos="<?php echo $attributes['animationType'];?>" data-aos-duration="<?php echo $attributes['animationDuration'];?>" data-aos-delay="<?php echo $attributes['animationDelay'];?>" data-aos-easing="<?php echo $attributes['animationEasing'];?>">
            <?php echo $attributes['blockTitle'];?>
          </h1>
				<?php endif;?>
				<?php if( !empty($attributes['blockText'])):?>
					<p class="main-text col-12" data-aos="<?php echo $attributes['animationType'];?>" data-aos-duration="<?php echo $attributes['animationDuration'];?>" data-aos-easing="<?php echo $attributes['animationEasing'];?>">
            <?php echo $attributes['blockText'];?>
          </p>
				<?php endif;?>

				<?php if ( !empty( $attributes['btnContactText'] ) && !empty($attributes['btnContactAnchor']) ):?>
          <div class="button <?php echo $attributes['btnContactColor'];?>" data-bs-toggle="modal" data-bs-target="#<?php echo $attributes['btnContactAnchor'];?>">
						<?php echo $attributes['btnContactText'];?>
          </div>
				<?php endif;?>

			</div>
		</div>
	</section>

<?php endif;?>


