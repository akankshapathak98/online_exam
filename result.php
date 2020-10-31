<?php
session_start();
include("header.php");
include('config.php');
?>
        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
                <?php
                $correct=0;
                $wrong=0;
                if (isset($_SESSION['answer'])) {
                    for ($i=1; $i<=sizeof($_SESSION['answer']); $i++) {
                        $answer="";
                        $res=mysqli_query($conn, "select * from questions where category='$_SESSION[category]' && question_no='$i'");
                        while ($row=mysqli_fetch_array($res)) {
                            $answer=$row['answer'];
                        }
                        if (isset($_SESSION['answer'][$i])) {
                            if ($answer==$_SESSION["answer"][$i]) {
                                $correct=$correct+1;
                            } else {
                                $wrong=$wrong+1;
                            }
                        } else {
                            $wrong=$wrong+1;
                        }
                    }
                }
                $count=0;
                $res= mysqli_query($conn, "select * from questions where category='$_SESSION[category]'");
                $count=mysqli_num_rows($res);
                $wrong=$count-$correct;
                echo "<br>";
                echo "<br>";
                echo "Total question =".$count;
                echo "<br>";
                echo "Correct answer =".$correct;
                echo "<br>";
                echo "Wrong answer =".$wrong;
                echo "<br>";
                if ($correct>3) {
                    echo "result = pass";
                    echo "<br>";
                    echo "Congratulations";
                } else {
                    echo "result = fail";
                    echo "Better luck next time";
                }
                ?>
            </div>

        </div>

<?php
mysqli_query($conn, "insert into exam_result (`username`,`exam_type`,`total_question`,`correct_answer`,`wrong_anwer`) 
values('$_SESSION[username]','$_SESSION[category]','$count','$correct','$wrong')");
include('footer.php');
?>
