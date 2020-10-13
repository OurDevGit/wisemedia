// Eva Js
// Header 
jQuery(document).ready(function() {
	// site preloader 
	jQuery(window).load(function(){
		jQuery('.loader-wrapper').fadeOut('slow',function(){jQuery(this).remove();});
	});
	jQuery('.s-header-v2__dropdown-on-hover a').on("click", function(e){
		jQuery(this).next('ul').toggle();
		//e.stopPropagation();
		//e.preventDefault();
	});
	
	//blog
	jQuery( "ul.page-numbers" ).addClass( "pagination mrgt-0" );
	
});