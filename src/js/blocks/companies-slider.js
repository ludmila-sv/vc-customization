import $ from 'jquery';

export function initCompaniesWhoTrustUsSlider( rootEl = document ) {
	$( '[data-companies-slider]', rootEl ).each( ( index, el ) => {
		const $el = $( el );

		const $slideWrapper = $( '[data-companies-slides]', $el );
		const $navWrapper = $( '[data-companies-nav]', $el );

		$slideWrapper
			.slick( {
				infinite: true,
				arrows: false,
				dots: false,
				fade: true,
				responsive: [
					{
						breakpoint: 767,
						settings: {
							dots: true,
							fade: false,
						},
					},
				],
			} )
			.on( 'beforeChange', ( event, slick, currentSlide, nextSlide ) => {
				$navWrapper.children().removeClass( 'active' );
				$navWrapper
					.children( `[data-slide-to="${ nextSlide }"]` )
					.addClass( 'active' );
			} );

		$navWrapper.on( 'click', 'a', ( event ) => {
			event.preventDefault();
			const slideIndex = parseInt(
				event.currentTarget.getAttribute( 'data-slide-to' )
			);
			$slideWrapper.slick( 'slickGoTo', slideIndex );
		} );

		$navWrapper
			.children()
			.first()
			.addClass( 'active' );
	} );
}
