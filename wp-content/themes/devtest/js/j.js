jQuery( document ).ready(function() {
	jQuery('#mobile-menu-btn').click(function() {
		
		
			
	if (jQuery( ".top-menu" ).hasClass( "actived" )){
		
		jQuery('.top-menu').removeClass( "actived" );
	}else
	{
		jQuery('.top-menu').addClass( "actived" );
	}
	});

	jQuery('.search-wrapper .search-icon').click(function() {
		jQuery('.header-search-box').toggleClass('active');
	});

	

});