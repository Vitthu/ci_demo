<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height: 1431px;">
        <!-- BEGIN PAGE BASE CONTENT -->
        <!-- BEGIN CONTENT HEADER -->
        <!-- END CONTENT HEADER -->
        <!-- BEGIN CARDS -->

        <!-- END CARDS -->
        <!-- BEGIN TEXT & VIDEO -->

        <!-- END TEXT & VIDEO -->
        <!-- BEGIN MEMBERS SUCCESS STORIES -->
        <?php if ($active_sessions) { ?>
            <div class="row  stories-header" data-auto-height="true">
                <div class="col-md-12">
                    <h1>Ongoing Sessions</h1>
                    <h2></h2>
                    <!--<h2>Life is either a great adventure or nothing</h2>-->
                </div>
            </div>
            <div class="row margin-bottom-20 stories-cont">
                <?php
                foreach ($active_sessions as $active_ses) {
//                    print_r($active_ses)
                    ?>
                    <div class="col-lg-3 col-md-6 session_cart">
                        <a class="" href="<?php echo base_url() . 'home/session?session_id=' . $active_ses->session_id; ?>"> 
                            <div class="portlet light ">
                                <div class="photo">
                                    <img src="<?php echo base_url() . 'uploads/experts/' . $active_ses->image ?>" alt="" class="img-responsive" width="130" height="130"> </div>
                                <div class="title">
                                    <span> <?php echo $active_ses->expert_name; ?></span>

                                </div>

                                <div class="desc">
                                    <span>  <?php echo substr($active_ses->about, 0, 200); ?></span>
                                </div>
                                <div class="pull-right">
                                    <?php
                                    $q_time = strtotime($active_ses->question_date);
                                    $a_time = strtotime($active_ses->answer_date);
                                    $current_time = strtotime(date('Y-m-d'));
                                    if ($current_time <= $q_time) {
                                        ?>
                                        <span> Ask Quetion on <?php echo date('d-m-Y ', strtotime($active_ses->question_date)); ?></span>
                                    <?php } ?>
                                </div>

                            </div>
                        </a>
                    </div>


                    <?php
                }
            }
            ?>
        </div>
        <?php if ($upcomming_sessions) { ?>
            <div class="row  stories-header" data-auto-height="true">
                <div class="col-md-12">
                    <h1>UpComming Sessions</h1>
                    <h2></h2>
                    <!--<h2>Life is either a great adventure or nothing</h2>-->
                </div>
            </div>
            <div class="row margin-bottom-20 stories-cont">
                <?php
                foreach ($upcomming_sessions as $upcomming_ses) {
//                    print_r($active_ses)
                    ?>
                    <div class="col-lg-3 col-md-6 session_cart">
                        <a class="" href="<?php echo base_url() . 'home/session?session_id=' . $upcomming_ses->session_id; ?>"> 
                            <div class="portlet light ">
                                <div class="photo">
                                    <img src="<?php echo base_url() . 'uploads/experts/' . $upcomming_ses->image ?>" alt="" class="img-responsive" width="130" height="130"> </div>
                                <div class="title">
                                    <span> <?php echo $upcomming_ses->expert_name; ?></span>

                                </div>

                                <div class="desc">
                                    <span>  <?php echo substr($upcomming_ses->about, 0, 200); ?></span>
                                </div>
                                <div class="pull-right">
                                    <?php
                                    $uq_time = strtotime($upcomming_ses->question_date);
                                    $a_time = strtotime($upcomming_ses->answer_date);
                                    $current_time = strtotime(date('Y-m-d'));
                                    if ($current_time <= $uq_time) {
                                        ?>
                                        <span> Ask Quetion on <?php echo date('d-m-Y ', strtotime($upcomming_ses->question_date)); ?></span>
                                    <?php } ?>
                                </div>

                            </div>
                        </a>
                    </div>


                    <?php
                }
            }
            ?>
        </div>

        <!--        <div class="row margin-bottom-40 stories-footer">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-danger">SEE MORE STORIES</button>
                    </div>
                </div>-->
        <!-- END MEMBERS SUCCESS STORIES -->

        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div>