//Update profile
$(function () {
    $("#user_form").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            gender: "required",
            email_id: {
                required: true,
                email: true
            },
            mobile_no: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 10
            },
        },
        messages: {
            first_name: "Please enter first name",
            last_name: "Please enter last name",
            gender: "Please select gender",
            email_id: {
                required: "Please enter email id",
                email: "Please enter a valid email address"
            },
            mobile_no: {
                required: "Please enter mobile no",
                number: "Please enter only digit",
                minlength: "Please enter min 10 digit mobile no",
                maxlength: "Please enter max 10 digit mobile no"
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
//---------------------------Change password------------------------------------------
    $("#change_pwd_form").validate({
        rules: {
            current_pwd: "required",
            new_pwd: {
                required: true,
                minlength: 5
            },
            conf_pwd: {
                required: true,
                equalTo: "#new_pwd"
            },
        },
        messages: {
            current_pwd: "Please enter your current password",
            new_pwd: {
                required: "Please enter new password",
                minlength: "Password must be 5 characters"
            },
            conf_pwd: {
                required: "Please enter confirm password",
                equalTo: "Password and confirm password do not match"
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
    //---------------------------Login Form------------------------------------------
  $("#login-form").validate({
        rules: {
            username: {
                required: true

            },
            password: {
                required: true

            }
        },
        messages: {
            username: {
                required: "Please enter Username",
            },
            password: {
                required: "Please enter Password",
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
//---------------------------Forgot password------------------------------------------
    $("#forget_form").validate({
        rules: {
            email_id: {
                required: true,
                email: true
            }
        },
        messages: {
            email_id: {
                required: "Please enter email id",
                email: "Please enter a valid email address"
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
    //---------------------------------------------------------------------------------------
    $("#add_user_form").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            gender: "required",
            role: "required",
            branches: "required",
            email_id: {
                required: true,
                email: true
            },
            mobile_no: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 10
            },
            password: {
                required: true,
                minlength: 5
            },
        },
        messages: {
            first_name: "Please enter first name",
            last_name: "Please enter last name",
            gender: "Please select gender",
            role: "Please select user role",
            branches: "Please Select Branch",
            email_id: {
                required: "Please enter email id",
                email: "Please enter a valid email address"
            },
            mobile_no: {
                required: "Please enter mobile no",
                number: "Please enter only digit",
                minlength: "Please enter min 10 digit mobile no",
                maxlength: "Please enter max 10 digit mobile no"
            },
            password: {
                required: "Please enter password",
                minlength: "Password must be 5 characters"
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
    //---------------------------Update password------------------------------------------
    $("#changeUserPassword").validate({
        rules: {
            password: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            password: {
                required: "Please enter password",
                minlength: "Password must be 5 characters"
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
    //------------------------Sale form-----------------------
    $("#saleForm").validate({
        rules: {
            cogs: {
                required: true,
            }
        },
        messages: {
            cogs: {
                required: "Please enter cogs",
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});

//----------------------------Customer Form------------------------
$("#add_customer_form").validate({
    rules: {
        first_name: "required",
        last_name: "required",
        gender: "required",
        country: "required",
        state: "required",
        city: "required",
        street: "required",
        birth_date: "required",
        branches: "required",
        email_id: {
            required: true,
            email: true
        },
        mobile_no: {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10
        },
        pincode: {
            required: true,
            number: true,
            minlength: 6,
            maxlength: 6
        }

    },
    messages: {
        first_name: "Please enter first name",
        last_name: "Please enter last name",
        gender: "Please select gender",
        country: "Please Enter Country",
        state: "please enter State",
        city: "Please Enter State",
        street: "Enter Street",
        birth_date: "Select Date Of Birth",
        branches: "Select Branch",
        email_id: {
            required: "Please enter email id",
            email: "Please enter a valid email address"
        },
        mobile_no: {
            required: "Please enter mobile no",
            number: "Please enter only digit",
            minlength: "Please enter min 10 digit mobile no",
            maxlength: "Please enter max 10 digit mobile no"
        },
        pincode: {
            required: "Please enter pincode",
            number: "Please enter only digit",
            minlength: "Please enter min 10 digit mobile no",
            maxlength: "Please enter max 10 digit mobile no"
        }
    },
    submitHandler: function (form) {
        form.submit();
        return false;
    }
});
$("#campaign_form").validate({
    rules: {
        campaign_name: "required",
        description: "required",
        date: "required"
        

    },
    messages: {
        campaign_name: "Please enter campaign name",
        description: "Please enter description",
        date: "Please select date"
        
    },
    submitHandler: function (form) {
        form.submit();
        return false;
    }
});
//----------------temp  campaign Customer Form------------------------
$("#temp_customer_form").validate({
    rules: {
        first_name: "required",
        last_name: "required",
        gender: "required",
 	campaign_status: "required",

        email_id: {
            
            email: true
        },
        mobile_no: {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10
        }
        

    },
    messages: {
        first_name: "Please enter first name",
        last_name: "Please enter last name",
        gender: "Please select gender",
        campaign_status: "please enter Status",
        email_id: {
           
            email: "Please enter a valid email address"
        },
        mobile_no: {
            required: "Please enter mobile no",
            number: "Please enter only digit",
            minlength: "Please enter min 10 digit mobile no",
            maxlength: "Please enter max 10 digit mobile no"
        }
    },
    submitHandler: function (form) {
        form.submit();
        return false;
    }
});