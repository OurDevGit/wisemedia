(function( $ ) {
	'use strict';

    $(function() {        
        if ($('#email-sending-template')) {
            if ($('#email-sending-template').data('confirmed') === 'yes') {
                $('.loading-area').show();
               
                var action = 'wet_send_emails';
                var templateId = $('#email-sending-template').data('id');

                // ajaxData is defined by wp_localize_script in PHP file class-location-ajax-selection-public.php 

                $.post( ajaxData.wpAjaxUrl, { action: action, templateId: templateId }, function(response) {
                    if (typeof response !== 'undefined' && response.success === true) {
                        $('.message').text(response.message);
                    } else {
                        if (typeof response !== 'undefined' && response.success === false) {
                            $('.message').text(response.message).addClass('error');
                        } else {
                            $('.message').text('An unknown error has ocurred.').addClass('error');
                        }
                    }
                })
                .fail(function() {
                    $('.message').text('An unknown error has ocurred.').addClass('error');
                })
                .always(function() {
                    $('.loading-area').hide();
                });    
             }
         }       
    });

})( jQuery );
