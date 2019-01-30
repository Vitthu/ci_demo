<?php
if (!empty($questions)) {
    foreach ($questions as $question):
        ?>
        <div>
            <h3><?php echo $question->question_title; ?></h3>
            <div>
                <span class="profileImage img-circle"><?php echo substr($question->visitor_name, 0, 1); ?></span>
                <span style="padding-left: 2%;font-size: 14px"><?php echo $question->visitor_name; ?>, asked on
                    <?php echo date('F d h:i A', strtotime($question->question_time)); ?>
                </span>
            </div>
            <div class="clearfix">   <p><?php echo $question->question; ?></p>


                <?php if (!empty($question->answer)) { ?>
                    <p class="custom-para">
                        <b>Answer: </b><?php echo $question->answer ?>
                    </p>
                    <div  class="clearfix margin-top-10" >

                        <button <?php echo (isExpertLogged()) ? 'disabled' : '' ?> onclick="like()" class="btn btn-default">
                            <i class="fa fa-thumbs-up"></i> Like </button> 0 
                        <span
                            class="pull-right">0 Views</span>
                    </div>
                    <?php
                } else {
                    if (isExpertLogged() && $save_ans) {
                        ?>
                        <div  class="clearfix" id="answer_data<?php echo $question->question_id; ?>">
                            <textarea id="answer<?php echo $question->question_id; ?>" class="form-control" rows="3"></textarea>
                            <button type="button" onclick="set_answer(<?php echo $question->question_id; ?>)"class=" margin-top-10 btn btn-primary  pull-right">Answer</button>
                        </div>

                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <hr>
        <?php
    endforeach;
} else {
    echo ' <h3>No  Questions For This Session </h3>';
}
?>     
<script>
    function like() {

    }
    function set_answer(question_id) {
        $('.error').html('');
        var answer = $("#answer" + question_id).val();

        var error = false;
        if (answer == '') {
            $("#answer" + question_id).append('<label class="error">Enter Answer</lable>').fadeOut(3000);
            error = true;
        }
        if (!error) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>home/save_answer",
                data: {answer: answer, question_id: question_id},
                dataType: 'json',
                success: function (result) {
                    if (result.status == true) {
                        var html = '<p class="custom-para"><b>Answer: </b>' + answer + '</p>';
                        html += '<div  class="clearfix" >';
                        html += '<button <?php echo (isExpertLogged()) ? 'disabled' : '' ?> onclick="like()" class="btn btn-default">';
                        html += '<i class="fa fa-thumbs-up"></i> Like </button> 0 <span class="pull-right">0 Views</span></div>';
                        $("#answer_data" + question_id).html(html)
//                        load_questions();
                    } else {
                        $("#answer" + question_id).append('<label class="error">something went wrong</lable>').fadeOut(3000);
                    }
                }
            });
        }
    }
</script>