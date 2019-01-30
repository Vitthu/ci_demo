<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<style>
    .custom-navbar
    {
        min-height: 80px;
    }

    .text-center
    {
        text-align: -webkit-center;
        text-align: -moz-center;

    }
    .profile-name
    {
        font-size:16px;
        font-weight:700;
    }
    .category-name
    {
        font-size: 14px;
        font-weight: 700;   
    }
    .vmiddle
    {
        height: 80px;
        justify-content: center;
        /*display: flex;*/
        float:left
    }
    .m-auto
    {
        margin:auto;
    }
    .color-green {
        color: green
    }
    .m25 {
        margin: 2% 0% 5% 0%;
    }
    .pad015
    {
        padding: 0px 15px;
    }

    .bbottom
    {
        border-bottom:1px solid lightgrey;
        padding: 2% 0%
    }
    .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
        z-index: 2;
        /*margin-left: 10px !important;*/
    }
    .custom-hr
    {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .custom-para{
        margin :15px 0 0 0;
    }
    @media (max-width:420px)
    {
        .vmiddle
        {
            height: 80px;
            justify-content: center;
            display: flex;
            text-align:center;
            width:100%
        }
    }
</style>
<div class="page-content-wrapper">

    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height: 1431px;">

        <div class="row">
            <div class="col-md-3 col-lg-3 hidden-xs hidden-sm"></div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 text-center">
                <img width="150" height="150" src="<?php echo $expert_image ?>" class="img-responsive"/>
                <div class="profile-name "><?php echo $expert_name ?></div>
                <div ><i><?php echo $designation ?></i></div>
                <?php
                $open_time = strtotime($start_date);
                $close_time = strtotime($end_date);
                $current_time = strtotime(date('Y-m-d'));
                ?>
                <div class = " m25">
                    <?php
                    if ($open_time <= $current_time && $close_time >= $current_time) {
                        if (date('Y-m-d') == $question_date) {
                            $question_ask = TRUE;
                            ?>
                            <div class="bold color-blue" style="color: #009dc7">Taking Quetions</div>
                            <span><i>Will answer on <?php echo date('F d ,T', strtotime($answer_date)); ?></i></span>
                            <?php
                        } else {
                            $question_ask = FALSE;
                        }
                        ?>
                        <?php
                        if (date('Y-m-d') == $answer_date) {
                            $ans_write = TRUE;
                            ?>
                            <div class="bold color-green"><i>Answering  Quetions Now</i></div>

                            <?php
                        }
                    } else {
//                    if (date('Y-m-d') == $end_date) {
                        $ans_write = TRUE;
                        ?>
                        <div class="bold color-red"><i>Session Closed</i></div>
                        <span><i>Held  on <?php echo date('F d ,T', strtotime($end_date)); ?></i></span>
                        <?php
                    }
                    ?>
                </div>

                <div class="input-group">
                    <input type="text" class="form-control glyphicon" placeholder="&#xe003; Search" />

                    <div class="input-group-btn">
                        <button <?php echo (isExpertLogged() || !$question_ask) ? 'disabled' : '' ?> type="button" class="btn btn-primary" data-toggle="modal" data-target="#question_modal">
                            <span class="hidden-xs hidden-sm">Ask New Question</span><i class="hidden-md hidden-lg fa fa-question"></i>
                        </button>
                    </div>
                </div>
                <hr class="custom-hr">
            </div>

            <div class="col-md-3 col-lg-3 hidden-xs hidden-sm"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3 col-lg-3 col-sm-12 hidden-xs">
                    <div class=" pull-left">
                        <label class="bold ">More About <?php echo $expert_name ?></label>
                        <p class="text-justify"> <img width="40" height="40" src="<?php echo $expert_image; ?>" class="img-circle" /> 
                            <?php echo $about; ?>
                        </p>
                    </div>

                    <div class="categories">
                        <span class="category-name">Categories</span>
                        <ul class="pad015">
                            <?php foreach ($categories as $cat):
                                ?>
                                <li>
                                    <?php echo $cat; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" id="question_data">

                </div>
                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                    <div class="categories">
                        <span class="category-name">Ask questions about</span>
                        <ul class="pad015">
                            <?php foreach ($categories as $cat):
                                ?>
                                <li>
                                    <?php echo $cat; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="sessions">
                        <span class="category-name">Upcoming Sessions</span>
                        <?php
                        foreach ($upcomming_sessions as $u_sess):
                            if ($session_id != $u_sess->session_id) {
                                ?>
                                <div class=" clearfix bbottom">
                                    <div class="  col-md-3 vmiddle">
                                        <img width="40" height="40" src="<?php echo base_url() . 'uploads/experts/' .$u_sess->image; ?>" class="img-responsive img-circle m-auto" />
                                    </div>
                                    <div class="text-justify pull-right  col-md-9 ">

                                        <span class="pull-left ">     <a class="" href="<?php echo base_url() . 'home/session?session_id=' . $u_sess->session_id; ?>"> <?php echo $u_sess->name; ?></a></span>
                                        <br>
                                        <i><?php echo $u_sess->designation; ?></i>
                                        <br> 
                                        <span class="pull-right"> <i class="fa fa-calendar pull-right" aria-hidden="true"><?php echo date('d M', strtotime($u_sess->start_date)); ?></i></span>
                                    </div>

                                </div>
                            <?php } endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- Modal -->
<div class="modal fade" id="question_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control"  name='question_title' id="question_title"  style="border-radius: 4px !important;" placeholder="Title" >
                        </div>
                        <div class="form-group">
                            <label>Quetion</label>
                            <textarea rows="3" class="form-control"  name='question' id="question"  style="border-radius: 4px !important;" placeholder="Quetion ?" ></textarea>
                        </div>
                        <div class ="form-actions text-center">
                            <a onclick="add_question()"   class="btn  btn-default green " data-toggle="tooltip" title="Submit Quetion">
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
    function add_question() {
        var question_title = $("#question_title").val();
        var question = $("#question").val();
        var error = false;
        if (question_title == '') {
            error = true;
        }
        if (question == '') {
            error = true;
        }
        if (!error) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>home/add_question",
                data: {question_title: question_title, question: question, session_id: <?php echo $session_id; ?>},
                dataType: 'json',
                success: function (result) {
                    console.log(result.status)
                    if (result.status == true) {
                        $("#question_modal").modal('hide');
                        $("#question_title").val('');
                        $("#question").val('');
                        load_questions();
                    }
                }
            });
        }
    }
    load_questions();
    function load_questions() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url(); ?>home/load_questions",
            data: {session_id: <?php echo $session_id; ?>},
            dataType: 'html',
            success: function (result) {
                $("#question_data").html(result);
            }
        });
    }
</script>