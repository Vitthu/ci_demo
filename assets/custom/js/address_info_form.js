$(function() {
    //----------------------------Add info-----------------------------------------------------------
    $("#address_info_form").validate({
        errorElement: 'span',
        rules: {
            card_number:{
                number: true,
                required: true,
                // minlength: 19,
                // maxlength: 19
            },
            expiration_month:"required",
            expiration_year:"required",
            cvv:{
                number: true,
                required: true,
                minlength: 3,
                maxlength: 4
            },

            ship_first_name:"required",
            ship_last_name:"required",
            ship_email: {
                required: true,
                email: true
            },
            ship_phn: {
                number: true,
                required: true,
                minlength: 10,
                maxlength: 10
            },
            ship_address:"required",
            ship_city:"required",
            ship_state:"required",
            ship_post: {
                number: true,
                required: true
            },
            ship_country:"required",
            
            bill_first_name:"required",
            bill_last_name:"required",
            bill_email: {
                required: true,
                email: true
            },
            bill_phn: {
                number: true,
                required: true,
                minlength: 10,
                maxlength: 10
            },
            bill_address:"required",
            bill_city:"required",
            bill_state:"required",
            bill_post: {
                number: true,
                required: true
            },
            bill_country:"required",
            check2:{
                required:"#check2:checked"
            }
            
        },
        messages: {
            card_number:{
                number: "<br>Please enter digits only",
                required: "<br>Please enter card number",
                // minlength: "<br>Number must be min  19 digit",
                // maxlength: "<br>Number must be max 19 digit"
            },
            expiration_month:"Please select expiration month",
            expiration_year:"Please select expiration year",
            cvv:{
                number: "<br>Please enter digits only",
                required: "<br>Please enter card number",
                minlength: "<br>Number must be min 3 digit",
                maxlength: "<br>Number must be max 4 digit"
            },      
            ship_first_name:"Please enter first name<br>",
            ship_last_name:"Please enter last name",
            ship_email: {
                required: "Please enter email id<br>",
                email: "Please enter valid email id<br>"
            },
            ship_phn: {
                number: "Please enter digits only<br>",
                required: "Please enter phone number<br>",
                minlength: "Number must be of 10 digit<br>",
                maxlength: "Number must be of 10 digit<br>"
            },
            ship_address:"Please enter address",
            ship_city:"Please enter city<br>",
            ship_state:"Please enter state",
            ship_post: {
                number: "Please enter digits only<br>",
                required: "Please enter postal code<br>"
            },
            ship_country:"Please select country",

            bill_first_name:"Please enter first name<br>",
            bill_last_name:"Please enter last name",
            bill_email: {
                required: "Please enter email id<br>",
                email: "Please enter valid email id<br>"
            },
            bill_phn: {
                number: "Please enter digits only<br>",
                required: "Please enter phone number<br>",
                minlength: "Number must be of 10 digit<br>",
                maxlength: "Number must be of 10 digit<br>"
            },
            bill_address:"Please enter address",
            bill_city:"Please enter city<br>",
            bill_state:"Please enter state",
            bill_post: {
                number: "Please enter digits only<br>",
                required: "Please enter postal code<br>"
            },
            bill_country:"Please select country",
            check2:{
                required:"Please select I agree with the terms of service"
            }
            
        },      
        submitHandler: function(form) {
            form.submit();
        }
    });
  });