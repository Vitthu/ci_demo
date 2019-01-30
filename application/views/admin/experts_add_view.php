<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="portlet light">
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="<?php echo base_url(); ?>admin/dashboard">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/experts">Experts</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <span class="caption-subject bold uppercase"><?php
                                    if (isset($this->request->get['expert_id'])) {
                                        echo 'Update';
                                    } else {
                                        echo 'Add';
                                    }
                                    ?> Expert  </span>
                            </div>
                        </div>  
                    </li>
                </ul>
            </div>
            <div class="portlet light">
                <div class="row " id="flash">
                </div>
                <div class="portlet-body" >
                    <form role="form" id="add_vendor" method="POST" action="<?php echo $action; ?>" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="row col-md-12">
                                <div class="form-group col-md-4">
                                    <label class="bold"> Name<span class="required" aria-required="true">*</span></label>
                                    <input class="form-control" 
                                           placeholder="Enter  Expert Name"
                                           type="text" inputmode="name" 
                                           name="name" value="<?php echo isset($name) ? $name : ''; ?>" id="name"> 
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="bold"> Email </label>
                                    <div class="input-icon input-icon-sm right">
                                      <!--  <i class="fa fa-search" aria-hidden="true"></i>-->
                                        <input class="form-control" placeholder="Enter  Email" type="text"  name="email"
                                               value="<?php echo isset($email) ? $email : ''; ?>" id="email"> 

                                    </div>

                                </div>
                                <div class="form-group col-md-4">
                                    <label class="bold"> Designation <span class="required" aria-required="true">*</span></label>
                                    <input class="form-control" placeholder="Enter Designation" type="text" name="designation" 
                                           value="<?php echo isset($designation) ? $designation : ''; ?>" id="designation"> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <div class="form-group col-md-6">
                                        <label class="bold">Select Category<span class="required" aria-required="true">*</span></label>
                                        <div class="input-icon input-icon-sm right">
                                            <div class="input-icon input-icon-sm right">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                <select placeholder="Category" class="form-control select2-multiple select2-hidden-accessible " multiple id="categories" name="categories[]">
                                                    <?php foreach ($categories as $category) {
                                                        ?>
                                                        <option value="<?php echo $category->category_id ?>"
                                                        <?php
                                                        if (in_array($category->category_id, $expert_categories)) {
                                                            echo 'selected';
                                                        }
                                                        ?>   ><?php echo $category->name; ?></option>
                                                            <?php }
                                                            ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="bold">Status</label>
                                        <div class="input-icon input-icon-sm right">
                                     <!--  <i class="fa fa-search" aria-hidden="true"></i>-->
                                            <select class="form-control" name="is_active">

                                                <option value="1" <?php
                                                if (isset($is_active)) {
                                                    if ($is_active == 1) {
                                                        ?> selected='selected'<?php
                                                            }
                                                        }
                                                        ?>>Enabled</option>
                                                <option value="0"  <?php
                                                if (isset($is_active)) {
                                                    if ($is_active == 0) {
                                                        ?> selected='selected'<?php
                                                            }
                                                        }
                                                        ?>>Disabled</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="bold"> About <span class="required" aria-required="true">*</span></label>
                                        <div class="input-icon input-icon-sm right">
                                          <!--  <i class="fa fa-search" aria-hidden="true"></i>-->
                                            <textarea class="form-control" placeholder="About Expert"
                                                      type="text"  name="about" 
                                                      id="about"  ><?php echo isset($about) ? $about : ''; ?></textarea> 
                                        </div>

                                    </div> 
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="bold">Upload Image</label>

                                    <div class="fileinput <?php echo isset($image) ? 'fileinput-exists' : "fileinput-new" ?> right col-md-12" data-provides="fileinput">

                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" alt="logo" style="width: 200px; height: 150px;"> <img src="<?php
                                            if (isset($image)) {
                                                echo $image;
                                            }
                                            ?>" <?php if (isset($image)) { ?>style="width:200px;height:150px" <?php } ?>></div>
                                        <div class="image">
                                            <span class="btn red btn-outline btn-file">
                                                <span class="fileinput-new"> Browse </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="text" name="image" id="image" value="<?php if (isset($image)) echo $image; ?>">
                                                <input type="file" name="file" onchange="readURL(this, '#image');" > </span>
                                            <!--<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>-->
                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                            <div class="row">



                            </div>


                            <div class="form-actions">
                                <div class="row col-md-offset-3">

                                    <div class="col-md-12 ">
                                        <button type="submit" class="btn blue" id="submit">Submit</button>
                                        <button type="reset" class="btn default">Reset</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

                                                    $(document).ready(function () {
                                                        jQuery.validator.addMethod("lettersonly", function (value, element) {
                                                            return this.optional(element) || /^[a-z\s]+$/i.test(value);
                                                        }, "Letters only please");
                                                        jQuery.validator.addMethod("mobile", function (value, element) {
                                                            return this.optional(element) || /^[6-9]\d{9}$/.test(value);
                                                        }, "Enter valid number");
                                                        var isValid = false;
                                                        $("form").validate({
                                                            rules: {
                                                                name: {
                                                                    required: true,
                                                                    lettersonly: true
                                                                },
                                                                about: {
                                                                    required: true,
                                                                },
                                                                designation: {
                                                                    required: true,
                                                                },
                                                                email: {
                                                                    required: true,
                                                                    email: true,
                                                                },
                                                            },
                                                            messages:
                                                                    {
                                                                        name: {
                                                                            required: 'Enter  Name',
                                                                        },
                                                                        about: {
                                                                            required: 'Select  Somthing About ',
                                                                        },
                                                                        designation: {
                                                                            required: 'Enter Designation',
                                                                        },
                                                                        location_id: {
                                                                            required: 'Delivery Location Area',
                                                                        },
                                                                        email: {
                                                                            required: 'Enter Email ',
                                                                            email: 'Enter valid Email'
                                                                        },
                                                                    },
                                                            submitHandler: function (form) {

                                                                form.submit();
                                                            }
                                                        });
                                                    });</script>

