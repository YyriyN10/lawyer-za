<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>

<?php if( !empty($attributes['blockTitle']) ):?>
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
		<div class="container-fluid">
			<div class="row">
        <h2 class="block-title col-12" data-aos="<?php echo $attributes['animationType'];?>" data-aos-duration="<?php echo $attributes['animationDuration'];?>" data-aos-easing="<?php echo $attributes['animationEasing'];?>"><?php echo $attributes['blockTitle'];?></h2>
        <?php if( !empty($blockAttr['blockSubTitle']) ):?>
          <h3 class="subtitle col-12" data-aos="<?php echo $attributes['animationType'];?>" data-aos-duration="<?php echo $attributes['animationDuration'];?>" data-aos-delay="<?php echo $attributes['animationDelay'];?>" data-aos-easing="<?php echo $attributes['animationEasing'];?>"><?php echo $blockAttr['blockSubTitle'];?></h3>
        <?php endif;?>
        <?php if( !empty($attributes['blockSubText']) ):?>
          <div class="text col-12" data-aos="<?php echo $attributes['animationType'];?>" data-aos-duration="<?php echo $attributes['animationDuration'];?>" data-aos-delay="<?php echo $attributes['animationDelay'];?>" data-aos-easing="<?php echo $attributes['animationEasing'];?>">
            <?php echo $attributes['blockSubText'];?>
          </div>
        <?php endif;?>
				<?php if( !empty($content) ):?>
					<ul class="items-list col-12">
						<?php echo $content; ?>
					</ul>
				<?php endif;?>
				<div class="buttons-wrapper col-12">
					<?php if ( !empty( $attributes['btnContactText'] ) && !empty($attributes['btnContactAnchor']) ):?>
						<div class="button <?php echo $attributes['btnContactColor'];?>" data-bs-toggle="modal" data-bs-target="#<?php echo $attributes['btnContactAnchor'];?>">
							<?php echo $attributes['btnContactText'];?>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</section>

<?php endif;?>


