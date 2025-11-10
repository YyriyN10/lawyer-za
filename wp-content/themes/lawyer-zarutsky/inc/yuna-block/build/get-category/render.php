<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>

<?php if( !empty($attributes['blockName']) || !empty($attributes['blockTitle']) ):?>
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
				<?php if( !empty($attributes['blockName'])):?>
					<h2 class="block-name col-12" data-aos="<?php echo $attributes['animationType'];?>" data-aos-duration="<?php echo $attributes['animationDuration'];?>" data-aos-easing="<?php echo $attributes['animationEasing'];?>"><?php echo $attributes['blockName'];?></h2>
				<?php endif;?>
				<?php if( !empty($attributes['blockTitle'])):?>
					<h3 class="block-title col-12" data-aos="<?php echo $attributes['animationType'];?>" data-aos-duration="<?php echo $attributes['animationDuration'];?>" data-aos-delay="<?php echo $attributes['animationDelay'];?>" data-aos-easing="<?php echo $attributes['animationEasing'];?>"><?php echo $attributes['blockTitle'];?></h3>
				<?php endif;?>
				<?php if( !empty($content) ):?>
					<div class="slider-wrapper col-12">
						<div class="slider services-slider">
							<?php echo $content; ?>
						</div>
					</div>
				<?php endif;?>
				<div class="buttons-wrapper col-12">
					<?php if ( !empty( $attributes['btnContactText'] ) && !empty($attributes['btnContactAnchor']) ):?>
						<div class="button <?php echo $attributes['btnContactColor'];?>" data-bs-toggle="modal" data-bs-target="#<?php echo $attributes['btnContactAnchor'];?>">
							<?php echo $attributes['btnContactText'];?>
							<svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
								<line y1="-1" x2="10.7814" y2="-1" transform="matrix(-0.0252642 -0.999681 0.999721 -0.0236356 13.9504 12.7783)" stroke="white" stroke-width="2"/>
								<line x1="3.61142" y1="11.7783" x2="13.9504" y2="11.7783" stroke="white" stroke-width="2"/>
								<line y1="-1" x2="15.2564" y2="-1" transform="matrix(-0.718792 -0.695225 0.718792 -0.695225 13.2713 10.6067)" stroke="white" stroke-width="2"/>
							</svg>
						</div>
					<?php endif;?>
					<div class="slider-controls">
						<div class="control prev">
							<svg xmlns="http://www.w3.org/2000/svg" width="17" height="19" viewBox="0 0 17 19" fill="none">
								<path d="M2.67326 11.1904C1.4318 10.4054 1.4318 8.59462 2.67326 7.8096L12.6811 1.48128C14.0128 0.639205 15.75 1.59609 15.75 3.17168L15.75 15.8283C15.75 17.4039 14.0128 18.3608 12.6811 17.5187L2.67326 11.1904Z" stroke="black" stroke-width="2"/>
							</svg>
						</div>
						<div class="control next">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="19" viewBox="0 0 16 19" fill="none">
								<path d="M14.1632 7.78773C15.4519 8.56556 15.4519 10.4344 14.1632 11.2123L3.53352 17.6283C2.20056 18.4328 0.500001 17.473 0.500001 15.916L0.500002 3.08398C0.500002 1.52703 2.20056 0.567154 3.53351 1.37172L14.1632 7.78773Z" fill="none" stroke="black" stroke-width="2"/>
							</svg>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

<?php endif;?>


