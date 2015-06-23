jQuery(document).ready(function($){
	function eytg_init_MPAU() {
		$('.eytg-item').magnificPopupAU({
			disableOn:320,
			type:'iframe',
			removalDelay:160,
			preloader:false,
			fixedContentPos:false,
			mainClass:'eytg-mfp-lightbox',
		});
	}
	jQuery(window).on('load',function(){
		eytg_init_MPAU();
	});
	jQuery(document).ajaxComplete(function(){
		eytg_init_MPAU();
	});
});