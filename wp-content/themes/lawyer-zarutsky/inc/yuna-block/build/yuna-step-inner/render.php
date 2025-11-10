<?php
	/**
	 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
	 */
?>

<?php

	$blockAttr = get_block_wrapper_attributes();
	$context = isset( $block->context ) && is_array( $block->context ) ? $block->context : [];

	$class = get_block_wrapper_attributes(["class" => 'item']);

?>

<li <?php echo $class;?> class="item" data-aos="<?php echo  $context['yuna/steps:animationType'];?>" data-aos-duration="<?php echo $context['yuna/steps:animationDuration'];?>" data-aos-delay="<?php echo  $context['yuna/steps:animationDelay'] * ($attributes['blockIndex'] + 1) ;?>" data-aos-easing="<?php echo $context['yuna/steps:animationEasing'];?>" >

 <!-- --><?php /*print_r($class);*/?>

  <?php if( !empty($attributes['itemIconUrl']) ):?>
    <div class="pic-wrapper">
      <img class="svg-pic"
           src="<?php echo $attributes['itemIconUrl'];?>"
			  <?php
				  if ( !empty( $attributes['itemIconAlt'] ) ):?>
            alt="<?php echo $attributes['itemIconAlt'] ;?>"
				  <?php else:?>
            alt="<?php wp_strip_all_tags($attributes['itemName']);?>"
				  <?php endif;?>
      >
    </div>
  <?php endif;?>

	<?php if( !empty($attributes['itemName']) ):?>
    <p class="name"><?php echo $attributes['itemName'];?></p>
	<?php endif;?>
  <?php if( !empty($attributes['itemDescription']) ):?>
    <p class="description"><?php echo $attributes['itemDescription'];?></p>
  <?php endif;?>
</li>



