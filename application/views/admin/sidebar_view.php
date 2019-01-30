
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper hide">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler"> </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

                <?php
                $roleId = $this->session->userdata('role_id');
                ?>
                <li class="nav-item start add-class-select <?php
                if ($sidebar_id == 'Dashboard') {
                    echo 'active';
                }
                ?>" id="Dashboard">
                    <a href="<?php echo base_url(); ?>admin/dashboard" class="nav-link nav-toggle">
                        <i class="fa fa-tachometer"></i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <li class="nav-item start add-class-select <?php
                if ($sidebar_id == 'categories') {
                    echo 'active';
                }
                ?>" id="categories">
                    <a href="<?php echo base_url(); ?>admin/categories" class="nav-link nav-toggle">
                        <i class="fa fa-briefcase"></i>
                        <span class="title">Categories</span>
                        <span class="selected"></span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <li class="nav-item start add-class-select <?php
                if ($sidebar_id == 'experts') {
                    echo 'active';
                }
                ?>" id="experts">
                    <a href="<?php echo base_url(); ?>admin/experts" class="nav-link nav-toggle">
                        <i class="fa fa-graduation-cap"></i>
                        <span class="title">Experts</span>
                        <span class="selected"></span>
                        <span class="arrow"></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END SIDEBAR -->
    </div>
    <script>
        $(".add-class-select").click(function () {
            var element = $(this);
            var id = element.attr("id");
            var info = 'id=' + id;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>user/set_sidebar_session",
                data: info,
                success: function (result) {}
            });

            $(".add-class-select").removeClass("active");
            //$( ".add-class-select" ).removeClass( "open" );
            $("#" + id).addClass("active")
        });
    </script>