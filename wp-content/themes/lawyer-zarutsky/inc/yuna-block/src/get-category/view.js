/**
 * Use this file for JavaScript code that you want to run in the front-end
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * Example:
 *
 * ```js
 * {
 *   "viewScript": "file:./view.js"
 * }
 * ```
 *
 * If you're not making any changes to this file because your project doesn't need any
 * JavaScript running in the front-end, then you should delete this file and remove
 * the `viewScript` property from `block.json`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */

jQuery(function($) {
	$('.wp-block-yuna-blocks-our-services').each(function () {

		const thisBlock = $(this);

		thisBlock.find('.services-slider').slick({
			autoplay: false,
			autoplaySpeed: 5000,
			slidesToShow: 4,
			slidesToScroll: 1,
			arrows: false,
			fade: false,
			dots: false,
			responsive: [
				{
					breakpoint: 1200,
					settings: {
						slidesToShow: 3
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 575,
					settings: {
						slidesToShow: 2,
						dots: true,
					}
				}
			]
		});

		thisBlock.find('.slider-controls .prev').click(function(e){
			e.preventDefault();

			thisBlock.find('.services-slider').slick('slickPrev');
		});

		thisBlock.find('.slider-controls .next').click(function(e){
			e.preventDefault();

			thisBlock.find('.services-slider').slick('slickNext');
		});


	})
});
