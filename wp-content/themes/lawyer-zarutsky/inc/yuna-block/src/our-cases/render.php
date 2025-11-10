<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$casesList = carbon_get_theme_option('cases_list'.yuna_lang_prefix());
?>

<?php if( !empty($attributes['blockTitle']) && !empty($casesList) ):?>
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
        <div class="slider-wrapper col-12" data-aos="fade-up" data-aos-duration="300" data-aos-easing="ease-in-out-back">
          <div class="slider" id="cases-slider">
	          <?php foreach( $casesList as $index=>$case ):?>
              <div class="slide" >
                <h3 class="name"><?php echo $case['name'];?></h3>
                <p class="problem"><span class="section-name"><?php echo esc_html( pll__( 'Запит' ) ); ?>:</span> <?php echo $case['problem'];?></p>
                <?php if( !empty($case['component_list']) ):?>
                  <div class="do-wrapper">
                    <p class="section-name"><?php echo esc_html( pll__( 'Наші дії' ) ); ?>:</p>
                    <ul class="do-list">
                      <?php foreach( $case['component_list'] as $do):?>
                        <li class="item"><?php echo $do['text'];?></li>
                      <?php endforeach;?>
                    </ul>
                  </div>
                <?php endif;?>
                <p class="result"><span class="section-name"><?php echo esc_html( pll__( 'Результат' ) ); ?>:</span> <?php echo $case['case_result'];?></p>
              </div>
	          <?php endforeach;?>
          </div>
        </div>
      </div>
		</div>
	</section>

<?php endif;?>


