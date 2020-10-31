<?php
session_start();
include("header.php");
include("config.php");
if(!isset($_SESSION['username'])) {
    ?>
    <script>
        window.location='login.php';
        </script>
    <?php
}
$total_que=0;
$res=mysqli_query($conn, "select * from questions where category='$_SESSION[category]'");
$total_que=mysqli_num_rows($res);
?>
<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">

        <br>

        <br>

        <div id="load_que">

        </div>
        <div class="row">
            <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();">
            <input type="button" class="btn btn-success" value="Next" onclick="load_next();">
            <input type="button" id="result" class="btn btn-success" value="Submit" onclick="load_register();" style="display: none;">
            <?php
            
            ?>

        </div>

    </div>

</div>
<?php
include('footer.php');
?>
<script>
    var question_no = "1";
    load_question(question_no);

    function load_question(question_no) {
        $.ajax({
                method: "POST",
                url: "load_que.php",
                data: {
                    question_no: question_no
                }
            })
            .done(function(msg) {
                $('#load_que').html(msg);
            });

    }

    function load_previous() {
        if (question_no == "1") {
            load_question(question_no);
        } else {
            question_no = eval(question_no) - 1;
            load_question(question_no);
        }
    }

    function load_next() {
        question_no = eval(question_no) + 1;
        if(question_no<11) {
        load_question(question_no);
        } else {
            document.getElementById("result").style.display="block";
        }
    }
    function load_register()
    {
        window.location="result.php";
    }
</script>