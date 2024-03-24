<?php 
add_action('wp_footer', 'add_custom_infusionsoft_validations');
function add_custom_infusionsoft_validations() { ?>
    <script>
        jQuery(document).ready(function($) {

            function getValidNumber(value) {
                value = $.trim(value).replace(/\D/g, '');
                //console.log(value.substring(0, 1));
                if (value.substring(0, 1) == '8') {
                    return false;
                }
                if (value.length == 10) {
                    return value;
                }
                return false;
            }

            var onclickFunc = new Function($('.infusion-recaptcha').attr('onclick'));
            $('.infusion-submit').append('<span class="inf_error_mess"></span>');

            $('.infusion-recaptcha').click(function(event){
                // event.preventDefault();
                // event.stopImmediatePropagation();
                //console.log($(this).closest('.infusion-form'));
                var form = $(this).closest('.infusion-form');
                var userLang = navigator.language;
                var FirstName = form.find('#inf_field_FirstName');
                var LastName = form.find('#inf_field_LastName');
                var Phone1 = form.find('#inf_field_Phone1');
                var all_filed = form.find('input');
                // console.log(userLang);
                // console.log(FirstName.val());
                // console.log(LastName.val());
                // console.log(Phone1.val());
                // console.log(getValidNumber(Phone1.val()));
                $('.inf_error_mess').html('');
                all_filed.removeClass('inf_error');
                
                if ( !userLang ) {
                    //console.log('Error userLang!');
                    event.preventDefault();
                    event.stopImmediatePropagation();
                    $('.inf_error_mess').append("Error: Your browser language code not set<br>");
                } else {
                	console.log(userLang + ' -  browser language code ok!');
                }

                if ( !getValidNumber(Phone1.val()) ) {
                    //console.log('Error valid phone number!');
                    event.preventDefault();
                    event.stopImmediatePropagation();                    
                    Phone1.addClass('inf_error');
                    $('.inf_error_mess').append("Error: Not valid phone number!<br>");
                } 

                if ( LastName.val().length >0 && LastName.val().length >0 && FirstName.val() == LastName.val() ) {
                    //console.log('Error dublicate FirstName and LastName!');
                    event.preventDefault();
                    event.stopImmediatePropagation();                    
                    FirstName.addClass('inf_error');
                    LastName.addClass('inf_error');
                    $('.inf_error_mess').append("Error: Don't duplicate First Name and Last Name<br>");
                } 
                if ( LastName.val().length >0 && LastName.val().length >0 && FirstName.val() != LastName.val() && getValidNumber(Phone1.val()) && userLang ) {
                    all_filed.removeClass('inf_error');
                    $('.inf_error_mess').html('');
                }

            }).click(onclickFunc);

        });
    </script>
    <style>
        input[type="text"].inf_error {
            border-color: red !important;
        }
        .inf_error_mess {
            color: red;
            display: block;
            line-height: 32px;
            font-size: 12px;
        }
    </style>
    <?php
} 
