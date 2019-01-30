<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>  Login| Company</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link rel="icon" href="<?php echo base_url(); ?>assets/custom/images/logoo.jpg" height="20px" width="900px" >
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>/assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url(); ?>/assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/custom/css/common.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/custom/images/favicon.ico">
    </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <!--<a href="index.html">-->
               <!--<img src="<?php echo base_url(); ?>/assets/custom/images/logo.jpg" alt="" />--> 
            <img src="<?php echo base_url(); ?>assets/custom/images/logo.png" alt="logo" class="logo-default" style ="margin-top: 5px; height: 40px; width: 170px;"/>
            <!--</a>-->
<!--<span >Lanyards</span>>-->
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <?php
            if (isset($data)) {
                extract($data);
            }
            ?>
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" id="login-form" name="login-form" action="<?php echo base_url(); ?>user" method="post" >
                <h3 class="form-title font-green">Sign In</h3>
                <span class="message"> <?php echo get_flash_message(); ?> </span>

                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix"
                           value="<?php
                           if (isset($user)) {
                               echo $user;
                           }
                           ?>" type="text" autocomplete="off" placeholder="Username" name="username" id="username"/> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input  class="form-control form-control-solid placeholder-no-fix"value="<?php
                    if (isset($pass)) {
                        echo $pass;
                    }
                    ?>" type="password" autocomplete="off" placeholder="Password" name="password" id="password"required="required"/> </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase" id="loginForm" name="loginForm" >Login</button>
                    <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                </div>

            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="index.html"  id="forget_form" name="forget_form">
                <h3 class="font-green">Forget Password ?</h3>
                <!--                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <span> Enter any username and password. </span>
                                </div>-->
                <span class="message"></span>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email_id" id="email_id"/> </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn btn-default">Back</button>
                    <button type="button" class="btn btn-success uppercase pull-right" id='forgetForm' name="forgetForm">Submit</button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->

        </div>
        <div class="copyright"><?php echo date('Y'); ?> &copy; Company Pvt. Ltd. </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            $(function () {
                $(".message").fadeOut(3000);
                $('body').on('keydown', "input[type = 'text']", function (e) {
                    console.log(this.value);
                    if (e.which === 32 && e.target.selectionStart === 0) {
                        return false;
                    }
                });
                $('body').on('keydown', "input[type = 'password']", function (e) {
                    console.log(this.value);
                    if (e.which === 32 && e.target.selectionStart === 0) {
                        return false;
                    }
                });
            });
        </script>
        <script>
            $(function () {
                $(document).on("click", "button[name = 'forgetForm']", function (e) {
                    var form = $("#forget_form");
                    form.validate();
                    if (form.valid() == true) {
                        var email_id = $("#email_id").val();
                        var dataString = 'email_id=' + email_id;
                        $.ajax({
                            type: 'post',
                            url: "<?php echo base_url(); ?>user/forgotPassword",
                            data: dataString,
                            success: function (res)
                            {
                                if (res == 'success') {
                                    var message_html = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Password sent your email id</div>';
                                    $(".message").html(message_html);
                                    $(".alert-danger").delay(5000).fadeOut(300);
                                    $(".alert-success").delay(5000).fadeOut(300);
                                    $("input[id='email_id']").val('');
                                }
                                if (res == 'notExist') {
                                    var message_html = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Email id does not exist</div>';
                                    $(".message").html(message_html);
                                    $(".alert-danger").delay(5000).fadeOut(300);
                                    $(".alert-success").delay(5000).fadeOut(300);
                                    // $("input[id='email_id']").val('');
                                }
                                if (res == 'email_error') {
                                    var message_html = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Email sent error</div>';
                                    $(".message").html(message_html);
                                    $(".alert-danger").delay(5000).fadeOut(300);
                                    $(".alert-success").delay(5000).fadeOut(300);
                                    // $("input[id='email_id']").val('');
                                }
                                if (res == 'db_error') {
                                    var message_html = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>DB error</div>';
                                    $(".message").html(message_html);
                                    $(".alert-danger").delay(5000).fadeOut(300);
                                    $(".alert-success").delay(5000).fadeOut(300);
                                    // $("input[id='email_id']").val('');
                                }
                            }
                        });
                        return false;
                    }
                });


            });
        </script>
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url(); ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>/assets/custom/js/user_form.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>/assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>
</html>