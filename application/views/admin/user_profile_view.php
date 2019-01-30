<?php extract($userInfo); ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <div class="row">
            <div class="portlet light">
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="<?php ?>">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Profile Info</span>
                    </li>
                </ul>

                <div class="row">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet ">
                            <!-- SIDEBAR USERPIC -->

                            <div class="profile-userpic show-image view_profile" style="    border: solid #878787 !important;">
                                <?php if (empty($profile_photo)) { ?>
                                    <img id="profile_pic" src="<?php echo base_url(); ?>assets/custom/images/avatar.png" class="img-responsive profile-pic-updated" alt=""> 
                                <?php } else { ?>
                                    <img id="profile_pic" src="<?php echo base_url(); ?>uploads/profile_pic/thumb/<?php echo $profile_photo; ?>" class="img-responsive profile-pic-updated" alt="">
                                <?php } ?>
                                <a class="updatee"><i class="fa fa-pencil" style="margin-left: 1%;font-size: 34px;color: black;" id="clckid" title="Edit Profile"></i></a>
                                <input id="profile_image" type="file" name="profile_image" style="display: none;" /><br/>
                            </div>
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"> <span id="fname1"><?php echo $first_name . ''; ?></span>&nbsp;<span id="lname"> <?php echo ' ' . $last_name; ?> </span></div>
                                <!--<div class="profile-usertitle-job"> Developer </div>-->
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                        </div>
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <span id="message"></span>
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light ">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <!-- PERSONAL INFO TAB -->
                                            <div class="tab-pane active" id="tab_1_1">
                                                <form role="form" action="#" id="user_form" name="user_form" method="post">
                                                    <div class="form-group">
                                                        <label class="control-label"> <font color="red">* </font>First Name</label>
                                                        <input type="text" placeholder="Enter first name"  class="form-control" name="first_name" id="first_name" value="<?php echo $first_name; ?>"/> </div>
                                                    <div class="form-group">
                                                        <label class="control-label"><font color="red">* </font>Last Name</label>
                                                        <input type="text" placeholder="Enter last name" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name; ?>"/> </div>

                                                    <input type="hidden" placeholder="Enter email id name" class="form-control" name="user_id" id="user_id" value="<?php echo $id; ?>"/>
                                                    <input type="hidden" placeholder="Enter email id name" class="form-control" name="action_type" id="action_type" value="update"/>

                                                    <div class="form-group">
                                                        <label class="control-label"><font color="red">* </font>Email id</label>
                                                        <input type="text" placeholder="Enter email id" readonly=""class="form-control" name="email_id" id="email_id" value="<?php echo $email; ?>"/> </div>

                                                    <div class="margiv-top-10">
                                                        <button type="submit" class="btn btn-success" name="userForm">Submit</button>
                                                    </div>

                                                </form>
                                            </div>
                                            <!-- CHANGE PASSWORD TAB -->
                                            <div class="tab-pane" id="tab_1_3">
                                                <form action="#" id="change_pwd_form" name="change_pwd_form">
                                                    <div class="form-group">
                                                        <label class="control-label"><font color="red">* </font>Current Password</label>
                                                        <input type="password" class="form-control" id="current_pwd" name="current_pwd" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label"><font color="red">* </font>New Password</label>
                                                        <input type="password" class="form-control" id="new_pwd" name="new_pwd"/> </div>
                                                    <div class="form-group">
                                                        <label class="control-label"><font color="red">* </font>Re-type New Password</label>
                                                        <input type="password" class="form-control" id="conf_pwd" name="conf_pwd"/> </div>
                                                    <div class="margin-top-10">
                                                        <button type="submit" class="btn btn-success" name="changePassword"> Change Password</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END CHANGE PASSWORD TAB -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE CONTENT -->
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<!-- END CONTAINER -->
<script>
    $('#clckid').on('click', function () {
        $('#profile_image').trigger('click');
    });
</script>
<style>
    div.show-image {
        position: relative;

        margin:5px;
    }
    div.show-image:hover img{
        opacity:0.5;
    }
    div.show-image:hover a, div.show-image:hover input {
        display: block;
    }
    div.show-image a, div.show-image input {
        position:absolute;
        display:none;
    }
    div.show-image a.updatee, div.show-image input.updatee {
        top: 48%;
        left: 44%;
    }
    a:focus, a:hover {
        color: #6D737F;
        text-decoration: underline;
    }
</style>
<script>
    $(function () {
        $(document).on("click", "button[name = 'userForm']", function (e) {
            var form = $("#user_form");
            form.validate();
            if (form.valid() == true) {
                var first_name = $("#first_name").val();
                var last_name = $("#last_name").val();
                var email_id = $("#email_id").val();
                var user_id = $("#user_id").val();
                var action_type = $("#action_type").val();
                var dataString = 'first_name=' + first_name + '&last_name=' + last_name + '&email_id=' + email_id + '&user_id=' + user_id + '&action_type=' + action_type;
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: "<?php echo base_url(); ?>user/updateProfile",
                    data: dataString,
                    success: function (res)
                    {
                        if (res.success) {
                            var message_html = '<div class="alert alert-success" style="margin-left: 17px;margin-top: 10px;margin-right: 56px;"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>' + res.success + '</div>';
                            $("#message").html(message_html);
                            $(".alert-danger").delay(5000).fadeOut(300);
                            $(".alert-success").delay(5000).fadeOut(300);
                            $('#fname').text(res.first_name);
                            $('#fname1').text(res.first_name);
                            $('#lname').text(res.last_name);
                        }
                        if (res.error) {
                            var message_html = '<div class="alert alert-danger" style="margin-left: 17px;margin-top: 10px;margin-right: 56px;"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>' + res.error + '</div>';
                            $("#message").html(message_html);
                            $(".alert-danger").delay(5000).fadeOut(300);
                            $(".alert-success").delay(5000).fadeOut(300);
                        }
                    }
                });
                return false;
            }
        });
        //----------------------Change password------------------------------------------
        $(document).on("click", "button[name = 'changePassword']", function (e) {
            var form = $("#change_pwd_form");
            form.validate();
            if (form.valid() == true) {
                var current_pwd = $("#current_pwd").val();
                var new_pwd = $("#new_pwd").val();
                var dataString = 'current_pwd=' + current_pwd + '&new_pwd=' + new_pwd;
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: "<?php echo base_url(); ?>user/changePassword",
                    data: dataString,
                    success: function (res)
                    {
                        if (res.success) {
                            var message_html = '<div class="alert alert-success" style="margin-left: 17px;margin-top: 10px;margin-right: 56px;"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>' + res.success + '</div>';
                            $("#message").html(message_html);
                            $(".alert-danger").delay(5000).fadeOut(300);
                            $(".alert-success").delay(5000).fadeOut(300);
                            $("input[id='current_pwd']").val('');
                            $("input[id='new_pwd']").val('');
                            $("input[id='conf_pwd']").val('');
                        }
                        if (res.error) {
                            var message_html = '<div class="alert alert-danger" style="margin-left: 17px;margin-top: 10px;margin-right: 56px;"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>' + res.error + '</div>';
                            $("#message").html(message_html);
                            $(".alert-danger").delay(5000).fadeOut(300);
                            $(".alert-success").delay(5000).fadeOut(300);
                            $("input[id='current_pwd']").val('');
                            $("input[id='new_pwd']").val('');
                            $("input[id='conf_pwd']").val('');
                        }
                    }
                });
                return false;
            }
        });
        //-----------------------------Add image-----------------------------------------
        $('#profile_image').fileupload({
            url: "<?php echo base_url(); ?>user/updateProfilePic",
            dataType: 'json',
            done: function (e, data) {
            },
            success: function (resp) {
                if (resp.error) {
                    var error_message_html = '<div class="alert alert-danger" style="margin-left: 17px;margin-top: 10px;margin-right: 56px;"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>The filetype you are attempting to upload is not allowed.</div>';
                    $("#message").html(error_message_html);
                    $(".alert-danger").delay(5000).fadeOut(300);
                    $(".alert-success").delay(5000).fadeOut(300);
                } else if (resp.file) {
                    var error_message_html = '<div class="alert alert-success" style="margin-left: 17px;margin-top: 10px;margin-right: 56px;"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Profile pic updated successfully</div>';
                    $("#message").html(error_message_html);
                    $('.profile-pic-updated').attr('src', '<?php echo base_url(); ?>uploads/profile_pic/thumb/' + resp.file);
                    $(".alert-danger").delay(5000).fadeOut(300);
                    $(".alert-success").delay(5000).fadeOut(300);
                }
            },
            progressall: function (e, data) {
            }
        }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
</script>