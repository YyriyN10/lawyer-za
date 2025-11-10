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
        <h2 class="block-title col-12" data-aos="fade-up" data-aos-duration="300" data-aos-easing="ease-in-out-back"><?php echo $attributes['blockTitle'];?></h2>
				<?php if( !empty($content) ):?>
					<div class="content col-12">
						<?php echo $content; ?>
					</div>
				<?php endif;?>
			</div>
		</div>
	</section>

<?php endif;?>


