<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="row">
            <div class="portlet light">
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="<?php echo base_url() . 'admin/dashboard'; ?>">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Categories</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="portlet light">
                    <div class="portlet-body" >
                        <div class="row " id="flash">

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Category Name</label>
                                <input type="text" class="form-control"  name='category' id="category"  style="border-radius: 4px !important;" placeholder="Enter Category" >
                            </div>
                            <div class="col-sm-4">
                                <label>Status</label>
                                <select class="form-control" name="is_active" id="is_active">
                                    <option value="1">Active</option>
                                    <option value="0">InActive</option>
                                </select>
                            </div>
                            <div class ="col-sm-1">
                                <br>
                                <a onclick="add_category()" name="add_category"  class="btn  btn-default green " data-toggle="tooltip" title="Add">
                                    <i class="fa fa-plus"></i>  
                                </a>
                            </div> 

                        </div>

                        <div class=row">
                            <div class="table-scrollable changes">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                        <tr>
                                            <th style=""> Category </th>
                                            <th style=""> Status </th>
                                            <th style="">Action </th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body">
                                        <?php
                                        if (!empty($categories)) {
                                            foreach ($categories as $cnt => $key) {
                                                // print_r($key);
                                                ?>
                                                <tr class="record<?php echo $key->category_id; ?>">
                                                    <td class="highlight category-show-td<?php echo $key->category_id; ?>"  >
                                                        <?php echo $key->name; ?>
                                                    </td>
                                                    <td class="highlight category-show-td<?php echo $key->category_id; ?>"  >
                                                        <?php echo ($key->is_active) ? 'Active' : 'InActive'; ?>
                                                    </td>
                                                    <td>
                                                        <a onclick="get_category('<?php echo $key->name; ?>', <?php echo $key->is_active ?>,<?php echo $key->category_id; ?>)"  id="<?php echo $key->category_id; ?>" data-toggle="tooltip" class="btn btn-default blue" data-toggle="tooltip"  title="Edit">
                                                            <i class="fa fa-edit"></i>  </a>
            <!--                                                    <a href="delbutton" class="btn btn-default red delbutton" id="<?php echo $key->category_id; ?>" data-toggle="tooltip" title="Delete">
                                                            <i class="fa fa-trash-o"></i>  </a>-->
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="3">No Record found</td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="update_category" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Category</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Category Name</label>
                            <input type="text" class="form-control"  name='u_category' id="u_category"  style="border-radius: 4px !important;" placeholder="Enter Category" >
                        </div>
                        <div class="col-sm-4">
                            <label>Status</label>
                            <select class="form-control" name="u_is_active" id="u_is_active">
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                            </select>
                            <input class="hidden" id="u_category_id">
                        </div>
                        <div class ="col-sm-1">
                            <br>
                            <a onclick="update_category()" name="add_category"  class="btn  btn-default green " data-toggle="tooltip" title="Add">
                                Submit
                            </a>
                        </div> 

                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
<script>
    function get_category(name, status, id) {

        $("#u_category_id").val(id);
        $("#u_category").val(name);
        $("#u_is_active").val(status);
        $("#update_category").modal();
    }
    // $(function(){
    function add_category() {
        var name = $('#category').val();
        var is_active = $('#is_active').val();
        if (is_active == 1) {
            var status = 'Active';
        } else {
            var status = 'InActive';
        }
        if (name == '')
        {
            $("#flash").show();
            $("#flash").html("<div class='alert alert-danger'>Please Enter Category<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
            $("#flash").delay(4000).fadeOut(300);
        } else
        {
            $("#category").val("");
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>admin/categories/add_category",
                data: {name: name, is_active: is_active},
                dataType: 'json',
                success: function (result) {
                    if (result.status == true) {
                        var c_name = "'" + name + "'";
                        var html = '<tr class="record' + result.category_id + '"><td class="highlight category-show-td' + result.category_id + '"  >' + name + '</td>';
                        html += '<td class="highlight category-show-td' + result.category_id + '"  >';
                        html += status + '</td>';
                        html += '<td><a onclick="get_category(' + c_name + ', 1,3)"  id="' + result.category_id + '" data-toggle="tooltip" class="btn btn-default blue" data-toggle="tooltip"  title="Edit">';
                        html += ' <i class="fa fa-edit"></i>  </a> </td></tr>';
                        $("#table_body").append(html);
                        $("#flash").show();
                        $("#flash").html("<div class='alert alert-success'>Category Added successfully <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
                        $("#flash").delay(4000).fadeOut(300);
                        $("#u_category_id").val('');
                        $("#u_category").val('');
                        $("#u_is_active").val('');
                    } else {
                        $("#flash").show();
                        $("#flash").html("<div class='alert alert-danger'>Somthing Went Wrong<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
                        $("#flash").delay(4000).fadeOut(300);
                    }
                }
            });
        }
        return false;
    }

    function update_category() {
        var name = $('#u_category').val();
        var category_id = $('#u_category_id').val();
        var is_active = $('#u_is_active').val();
        if (is_active == 1) {
            var status = 'Active';
        } else {
            var status = 'InActive';
        }
        if (name == '')
        {
            $("#u_category").after("<label class='error'>Please Enter Category</label>");
            $("#u_category").delay(4000).fadeOut(300);
        } else
        {
            $("#category").val("");
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>admin/categories/update_category",
                data: {name: name, is_active: is_active, category_id: category_id},
                dataType: 'json',
                success: function (result) {
                    console.log(result.status)
                    if (result.status == true) {
                        var html = '<td class="highlight category-show-td' + result.category_id + '"  >' + name + '</td>';
                        html += '<td class="highlight category-show-td' + result.category_id + '"  >';
                        html += status + '</td>';
                        html += '<td><a onclick="get_category("' + name + '",' + is_active + ',' + result.category_id + ')"  id="' + result.category_id + '" data-toggle="tooltip" class="btn btn-default blue" data-toggle="tooltip"  title="Edit">';
                        html += ' <i class="fa fa-edit"></i>  </a> </td>';
                        $('.record' + result.category_id).html(html);
                        $("#update_category").modal('hide');
                        $("#flash").show();
                        $("#flash").html("<div class='alert alert-success'>Category Updated successfully <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
                        $("#flash").delay(4000).fadeOut(300);
                    } else {
                        $("#flash").show();
                        $("#flash").html("<div class='alert alert-danger'>Somthing Went Wrong<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
                        $("#flash").delay(4000).fadeOut(300);
                    }
                }
            });
        }
        return false;
    }
    // });
</script>
