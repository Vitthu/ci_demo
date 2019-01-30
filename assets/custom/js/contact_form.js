$(function() {
    //----------------------------Add Coupon-----------------------------------------------------------
    $("#contact_form").validate({
		errorElement: 'span',
        rules: {
            name:"required",
            email: {
                required: true,
                email: true
            },
            phn_number: {
                required: true,
                minlength: 10,
                maxlength: 10
            },
            message:"required",
        },
        messages: {
            name:"Please enter name",
            email: {
                required: "Please enter email id",
                email: "Please enter valid email id"
            },
            phn_number: {
                required: "Please enter phone number",
                minlength: "Number must be of 10 digit",
                maxlength: "Number must be of 10 digit"
            },
            message:"Please enter message",
           
        },      
        submitHandler: function(form) {
            form.submit();
        }
    });
        //----------------------------SUBSCRIBE TO VIA E-MAIL----------------------------------------------------------
    $("#subscribeForm").validate({
		errorElement: 'span',
        rules: {
            sub_email_id: {
                required: true,
                email: true
            },
        },
        messages: {
            sub_email_id: {
                required: "Enter email id",
                email: "Enter valid email id"
            }, 
        },      
        submitHandler: function(form) {
            form.submit();
        }
    });
  });