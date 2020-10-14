

function autocomplet_set_google_autocomplete(){
	jQuery(input_fields).each(function(){

		var autocomplete= new google.maps.places.Autocomplete(
		/** @type {HTMLInputElement} */(this));
		// When the user selects an address from the dropdown,
		// populate the address fields in the form.

	});
}
jQuery(window).load(function(){
	autocomplet_set_google_autocomplete();
});
