jQuery(function() {

    jQuery("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
         submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var name = jQuery("input#name").val();
            var email = jQuery("input#email").val();
            var message = jQuery("textarea#message").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            jQuery.ajax({
                url: ajax_object.ajaxurl,
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    message: message,
                    action:'contactForm',
                    security:ajax_object.ajax_nonce
                },
                cache: false,
                success: function(response) {
                    // Success message
                    console.log(response)
                   if(response == -1 || response == -2)
                   {
                          // Fail message
                        jQuery('#success').html("<div class='alert alert-danger'>");
                        jQuery('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                        jQuery('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                        jQuery('#success > .alert-danger').append('</div>');
                       
                   } if(response == 1){
                      jQuery('#success').html("<div class='alert alert-success'>");
                    jQuery('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    jQuery('#success > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    jQuery('#success > .alert-success')
                        .append('</div>');

                   }
                    //clear all fields
                    jQuery('#contactForm').trigger("reset");
                },
                error: function() {
                    // Fail message
                    jQuery('#success').html("<div class='alert alert-danger'>");
                    jQuery('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    jQuery('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    jQuery('#success > .alert-danger').append('</div>');
                    //clear all fields
                    jQuery('#contactForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return jQuery(this).is(":visible");
        },
    });

    jQuery("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        jQuery(this).tab("show");
    });
});


/*When clicking on Full hide fail/success boxes */
jQuery('#name').focus(function() {
    jQuery('#success').html('');
});
