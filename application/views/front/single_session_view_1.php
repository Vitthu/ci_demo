<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height: 1431px;">
        <!-- BEGIN PAGE BASE CONTENT -->


        <div class="portlet light">
            <div class="row col-md-12">
                <div class="text-center">
                    <img class="img-rounded" src="<?php echo $expert_image; ?>" height="80">
                    <div class="bold margin-top-10"><?php echo $expert_name ?></div>
                    <div class="margin-top-10"><?php echo $designation ?></div>

                    <div class="margin-top-40 text-center">
                        <?php if (date('Y-m-d') == $question_date) {
                            ?>
                            <div class="bold " style="color: #009dc7">Taking Quetions</div>
                            <span><i>Will answer on <?php echo date('F d ,T'); ?></i></span>
                            <?php
                        }
                        ?>
                    </div>
                </div>

            </div>


            <div class="row" style="margin: 5%;padding-top: 15%;">
                <div class="col-md-2 margin-top-40">
                    <div>
                        <label class="bold ">More About <?php echo $expert_name ?></label>
                        <p class="text-justify">
                            <img class="img-rounded" src="<?php echo $expert_image; ?>" height="80">
                            <?php echo $about ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-8 ">
                    <div class="from-group col-md-8">
                        <div class="">
                            <input id="searchText" type="text" class="form-control" name="searchText" placeholder="Search">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="from-group col-md-4">
                        <button class="btn btn-primary" ><span class="hidden-xs hidden-sm">Ask New Question</span><i class="fa fa-question"></i></button>
                    </div>
                    <br>
                    <hr size="1">
                    <div>
                        <label class="bold ">More About <?php echo $expert_name ?></label>
                        <p class="text-justify">
                            <img class="img-rounded" src="<?php echo $expert_image; ?>" height="80">
                            <?php echo $about ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-2 margin-top-40">
                    <div>
                        <label class="bold ">More About <?php echo $expert_name ?></label>
                        <p class="text-justify">
                            <img class="img-rounded" src="<?php echo $expert_image; ?>" height="80">
                            <?php echo $about ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div>