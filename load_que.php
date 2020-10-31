<?php
session_start();
include('config.php');
$question_no = '';
$question = '';
$opt1 = '';
$opt2 = '';
$opt3 = '';
$opt4 = '';
$answer = '';
$count = 0;
$ans = '';
$queno = $_POST['question_no'];
if (isset($_SESSION['answer'][$queno])) {
    $ans = $_SESSION['answer'][$queno];
}
$res = mysqli_query($conn, "select * from questions where category='$_SESSION[category]' && question_no='$_POST[question_no]'");
$count = mysqli_num_rows($res);
if ($count == 0) {
} else {
    $output = '';
    while ($row = mysqli_fetch_array($res)) {
        $question_no = $row['question_no'];
        $question = $row['question'];
        $opt1 = $row['opt1'];
        $opt2 = $row['opt2'];
        $opt3 = $row['opt3'];
        $opt4 = $row['opt4'];
        $answer = $row['answer'];
    }
?>
    <table>
        <tr>
            <td>(<?php echo $question_no; ?>) <?php echo $question; ?></td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt1; ?>" <?php
                                                                                    if ($ans == $opt1) {
                                                                                        echo "checked";
                                                                                    }
                                                                                    ?>>
            </td>
            <td>
                <?php
                if (strpos($opt1, 'images/question/')!=false) {
                    ?>
                    <img src="admin/images/question/<?php echo $opt1;?>" height="30" width="30">
                    <?php
                } else {
                    echo $opt1;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt2; ?>" <?php
                                                                                    if ($ans == $opt2) {
                                                                                        echo "checked";
                                                                                    }
                                                                                    ?>>
            </td>
            <td>
                <?php
                if (strpos($opt2, 'images/question/')!=false) {
                    ?>
                    <img src="admin/images/question/<?php echo $opt2;?>" height="30" width="30">
                    <?php
                } else {
                    echo $opt2;
                }
                ?>
            </td>

        </tr>
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt3; ?>" <?php
                                                                                    if ($ans == $opt3) {
                                                                                        echo "checked";
                                                                                    }
                                                                                    ?>>
            </td>
            <td>
                <?php
                if(strpos($opt3,'images/question/')!=false)
                {
                    ?>
                    <img src="admin/images/question/<?php echo $opt3;?>" height="30" width="30">
                    <?php
                } else {
                    echo $opt3;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt4; ?>" <?php
                                                                                    if ($ans == $opt4) {
                                                                                        echo "checked";
                                                                                    }
                                                                                    ?>>
            </td>
            <td>
                <?php
                if(strpos($opt4,'images/question/')!=false)
                {
                    ?>
                    <img src="admin/images/question/<?php echo $opt4;?>" height="30" width="30">
                    <?php
                } else {
                    echo $opt4;
                }
                ?>
            </td>
            <td><input type="button" id="select" class="btn btn-success" data-question_no="<?php echo $question_no ?>" data-answer="' . $row['answer'] . '" value="select"></td>
        </tr>
    </table>
<?php } ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $('#select').on("click", function() {
        var question_no = $(this).data('question_no');
        var radiovalue = $("input[name='r1']:checked").val();

        $.ajax({
            method: "POST",
            url: "save_answer.php",
            data: {
                radiovalue: radiovalue,
                question_no: question_no
            }
        })
    });
</script>