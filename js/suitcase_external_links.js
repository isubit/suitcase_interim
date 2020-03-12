/**
 * Function for adding a class to external links
 * so they can be styled.
 */

(function ($) {

	$(document).ready(function() {

		$('a').filter(function() {
			return this.hostname && this.hostname !== location.hostname;
		}).not('a:has(img)').addClass('external').append('<span class="external-icon"><span class="fa fa-external-link"></span></span>');


	});

})(jQuery);