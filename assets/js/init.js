jQuery(document).ready(function($) {
    
	var $form		= $(".gform_wrapper form");
    var $field		= $(".gfield input[type=tel]");

	if( !gravityforms_phone_extension_strings['enable_html5'] ){
        $field = $(".gfield .ginput_container_phone input[type=text]");
    }

	/**
	 * Init International Telephone Field
	 */
	$field.intlTelInput({
		initialCountry: "auto",
		geoIpLookup: function(callback) {
			$.get('//ipinfo.io', function() {}, "jsonp").always(function(resp) {
				var countryCode = (resp && resp.country) ? resp.country : "";
				callback(countryCode);
			});
		}
	});
	
	/**
	 * Update the hidden input on form submit
	 */
	$form.submit(function() {
		
		$field.each(function (index, value){
			
			$(this).val($(this).intlTelInput("getNumber"));
			
		});	
		
	});
	
});