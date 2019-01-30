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
                        <span>Experts</span>
                    </li>
                </ul>
                <div class="portlet-body" >

                    <?php
                    if ($this->session->flashdata('success')) {

                        echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '<button type="button" class="close" data-dismiss="alert">x</button></div>';

                        //	 unset($_SESSION['success_update']);
                    }
                    ?>
                    <script>
                        $(".alert-success").fadeTo(2000, 400).slideUp(400, function () {
                            $(".alert-success").slideUp(400);
                        });
                    </script>
                    <div class="row">
                        <div class="col-sm-8">
                            <span class="error-display"> </span>
                        </div>  
                        <div class ="col-sm-1 pull-right">
                            <a href="<?php echo base_url() . 'admin/experts/add'; ?>" id="add_category" class="btn  btn-default green " data-toggle="tooltip" title="Add">
                                <i class="fa fa-plus"></i>  
                            </a>
                        </div> 

                    </div>
                    <div class=row">
                        <div class="table-scrollable changes">
                            <table class="table table-striped table-bordered table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th style=""> Sr. No </th>
                                        <th style="">  Name </th>
                                        <th style=""> Email </th>
                                        <th style=""> Designation </th>
                                        <th style=""> About </th>
                                        <th style=""> Categories </th>
                                        <th style="">Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($experts)) {
                                        foreach ($experts as $cnt => $key) {
                                            // print_r($key);
                                            ?>
                                            <tr class="record">
                                                <td class="highlight"  >
                                                    <?php echo ++$cnt; ?>
                                                </td>
                                                <td class="highlight"  >
                                                    <?php echo $key->name; ?>
                                                </td>
                                                <td class="highlight"  >
                                                    <?php echo $key->email; ?>
                                                </td>
                                                <td class="highlight"  >
                                                    <?php echo $key->designation; ?>
                                                </td>
                                                <td class="highlight"  >
                                                    <?php echo substr($key->about, 0,200); ?>
                                                </td>
                                                <td class="highlight"  >
                                                    <?php echo $key->categories; ?>
                                                </td>
        <!--                                                <td class="highlight"  >
                                                    <img  src="<?php echo base_url() . 'uploads/experts/' . $key->image; ?>" class="img-thumbnail">
                                                </td>-->
                                                <td>
                                                    <a class="btn btn-primary" href="<?php echo base_url() . 'admin/experts/update?expert_id=' . $key->expert_id; ?>"><i class="fa fa-pencil fa-1x"></i></a>
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



<script>
    // $(function(){
    $(document).on("click", "button[name='add_branches']", function (e) {
        var countryy = $("#city option:selected").val();
        var city = countryy.trim();
        var country_cod = $("#branches").val();
        var branches = country_cod.trim();
        if (city == '')
        {
            $("#flash").show();
            $("#flash").html("<div class='alert alert-danger'>Please Select  City. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
            $("#flash").delay(4000).fadeOut(300);
        } else if (branches == '')
        {
            $("#flash").show();
            $("#flash").html("<div class='alert alert-danger'>Please enter branches  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
            $("#flash").delay(4000).fadeOut(300);
        } else
        {
            $(".country").val("");
            $(".country_code").val("");
            var dataString = 'city=' + city + '&branches=' + branches;
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>Branches/addBranches",
                data: dataString,
                dataType: 'json',
                success: function (result) {
                    if (result.res == '1')
                    {
                        $("#flash").show();
                        $("#flash").html("<div class='alert alert-danger'>Country or country code already exist.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
                        $("#flash").delay(4000).fadeOut(300);
                    }
                    if (result.res == '2')
                    {
                        $("#flash").show();
                        $("#flash").html("<div class='alert alert-success'>Country added successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
                        $("#flash").delay(4000).fadeOut(300);
                        $.ajax({
                            type: 'post',
                            url: "<?php echo base_url(); ?>Branches/allBranches",
                            data: dataString,
                            success: function (result) {
                                $('.changes').html(result);
                            }
                        });
                    }
                    if (result.res == '3')
                    {
                        $("#flash").show();
                        $("#flash").html("<div class='alert alert-danger'> Failed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
                        $("#flash").delay(4000).fadeOut(300);
                    }




                }
            });
        }
        return false;
    });
    $(document).on("click", "a[href = 'category-update']", function (e) {
        e.preventDefault();
        var element = $(this);
        var id = element.attr("id");
        var country_old = ($("#country_old" + id).val());
        $("#country_new" + id + " option[value=" + country_old + "]").attr('selected', 'selected');
        //alert(id);
        $(".country-show-td" + id).toggle();
        $(".country-update-td" + id).toggle();
        $('#country_update' + id)[0].reset();
    });
    // });
</script>
<script type="text/javascript">
//    $("#loader").show()
    function add_category() {

    }
</script>