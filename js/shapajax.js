//AJAX Filters

jQuery(function(){
	var mainContent = jQuery('#main-content'),
		cat_links = jQuery('ul.xiong-filters li a');

		cat_links.on('click', function(e){

			e.preventDefault();
			el = $(this);
			var value = $el.attr("href");
			mainContent.animate({opacity:"0.5"});
			mainContent.load(value + " #inside", function(){
				mainContent.animate({opacity:"1"});
			});
			jQuery( "li" ).removeClass( "current-cat" );
			 jQuery(this).closest('li').addClass("current-cat");
		});
});
