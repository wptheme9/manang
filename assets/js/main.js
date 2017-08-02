$ = jQuery.noConflict();
// jQuery(document).ready(function($){
// alert('ok');
//Newsletter
            var successMSG = "<h2 class='subscribe-success'>You've been added to our sign-up list.<br />We have sent an email, asking you to confirm it.</h2>";
            var campaignmsg = "<h2 class='subscribe-success'>You've been added to our sign-up list.</h2>";
            var errorMSG = "<h2 class='subscribe-error'>That does not look like a valid email.</h2>";
            var invalidEmailMSG = "<h2 class='subscribe-error'>There was an error. Please try again.</h2>";
            jQuery('#mailchimp').validate({

            rules: {
                email: {
                    required: true,
                },
            },
            submitHandler: function(form){
                jQuery.ajax({
                    success : function (responseText) {
                        // if (responseText === 'added_mailchimp') {
                        //     // $('form#mailchimp').fadeOut('slow');
                        //     $('#mailchimp-sign-up h2').replaceWith(successMSG).fadeIn('slow');
                        // }else if (responseText === 'added') {
                        //     // $('form#mailchimp').fadeOut('slow');
                        //     $('#mailchimp-sign-up h2').replaceWith(campaignmsg).fadeIn('slow');
                        // }else if (responseText === 'invalid email') {
                        //     $('#mailchimp-sign-up h2').replaceWith(invalidEmailMSG).fadeIn('slow');
                        // } else {
                        //     $('#mailchimp-sign-up h2').replaceWith(errorMSG).fadeIn('slow');
                        // }
                        // // jQuery('#mailchimp')[0].reset();
                        // $('.ajax-loader').hide();
                        console.log('subscribed');
                    },
                    url :framework.ajaxUrl,
                    data    : {
                        action : 'cpm_framework_add_to_mailchimp_list',
                        email : jQuery('[name="email"]').val(),
                    },
                    type    : 'POST',
                })
            }
        });
// })