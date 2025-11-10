<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

?>

<?php if( !empty($attributes['blockTitle'])):?>
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
        <?php if( !empty($attributes['blockText']) ):?>
          <div class="text col-12" data-aos="fade-up" data-aos-duration="300" data-aos-delay="150" data-aos-easing="ease-in-out-back">
            <?php echo $attributes['blockText'];?>
          </div>
        <?php endif;?>

				<div class="button-wrapper col-12">
					<?php if ( !empty( $attributes['btnText'] ) && !empty($attributes['btnAnchor']) ):?>
            <div class="button <?php echo $attributes['btnColor'];?>" data-bs-toggle="modal" data-bs-target="#<?php echo $attributes['btnAnchor'];?>">
							<?php echo $attributes['btnText'];?>
            </div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</section>

<?php endif;?>


