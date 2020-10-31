<?php
include('header.php');
include('../config.php');
$exam_category = '';
$id = $_GET['id'];
$res = mysqli_query($conn, "select * from exam_category where exam_cat_id=$id");
while ($row = mysqli_fetch_array($res)) {
    $exam_category = $row['category'];
}
if (isset($_POST['addquestion'])) {
     $limit=1;
    if ($limit<11) {
    $loop = 0;
    $count = 0;
    $res = mysqli_query($conn, "select * from questions where category='$exam_category' order by id asc")
    or die(mysqli_error($conn));
    $count = mysqli_num_rows($res);
    if ($count == 0) {
    } else {
        while ($row = mysqli_fetch_array($res)) {
            $loop = $loop + 1;
            mysqli_query($conn, "update questions set question_no='$loop' where id=$row[id]");
        }
    }
    $loop = $loop + 1;
    mysqli_query($conn, "insert into questions 
        values (null,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category')") or die(mysqli_error($conn));
?>
    <script>
        alert("question added successfully");
        window.location.href = window.location.href;
    </script>
<?php
$limit=$limit+1;
} else {?>
    <script>
        alert("only 10 question should be added");
        
    </script>
<?php
}
}
if (isset($_POST['addquestionimage'])) {
    $loop = 0;
    $count = 0;
    $res = mysqli_query($conn, "select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($conn));
    $count = mysqli_num_rows($res);
    if ($count == 0) {
    } else {
        while ($row = mysqli_fetch_array($res)) {
            $loop = $loop + 1;
            mysqli_query($conn, "update questions set question_no='$loop' where id=$row[id]");
        }
    }
    $loop = $loop + 1;
    $filename1 = $_FILES["fopt1"]["name"];
    $tempname ="./images/question/".$filename1;
    $db_filename1 = "images/question/" . $filename1;
    move_uploaded_file($_FILES["fopt1"]["tmp_name"], $tempname);

    $filename2 = $_FILES["fopt2"]["name"];
    $tempname ="./images/question/".$filename2;
    $db_filename2 = "images/question/" . $filename2;
    move_uploaded_file($_FILES["fopt2"]["tmp_name"], $tempname);

    $filename3 = $_FILES["fopt3"]["name"];
    $tempname ="./images/question/".$filename3;
    $db_filename3 = "images/question/" . $filename3;
    move_uploaded_file($_FILES["fopt3"]["tmp_name"], $tempname);
   
    $filename4 = $_FILES["fopt4"]["name"];
    $tempname ="./images/question/".$filename4;
    $db_filename4 = "images/question/" . $filename4;
    move_uploaded_file($_FILES["fopt4"]["tmp_name"], $tempname);

    $filename5 = $_FILES["fanswer"]["name"];
    $tempname ="./images/question/".$filename5;
    $db_filename5 = "images/question/" . $filename5;
    move_uploaded_file($_FILES["fanswer"]["tmp_name"], $tempname);

   
    mysqli_query($conn, "insert into questions 
        values (null,'$loop','$_POST[fquestion]','$db_filename1','$db_filename2','$db_filename3','$db_filename4','$db_filename5','$exam_category')") or die(mysqli_error($conn));
?>
    <script>
        alert("question added successfully");
        window.location.href = window.location.href;
    </script>
<?php
}
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Insert Question Inside <span id="category_heading"> <?php echo $exam_category; ?></span></h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <div class="col-lg-6">
                            <form action="" name="addquestion" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add New qustion with text</strong><small> Insert Question Here</small>
                                    </div>
                                    <div class="card-body card-block">

                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Add Question</label>
                                            <input type="text" name="question" placeholder="Add Question" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Add Option1</label>
                                            <input type="text" name="opt1" placeholder="Add Option1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Add Option2</label>
                                            <input type="text" name="opt2" placeholder="Add Option2" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Add Option13</label>
                                            <input type="text" name="opt3" placeholder="Add Option3" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Add Option4</label>
                                            <input type="text" name="opt4" placeholder="Add Option4" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Add Answer</label>
                                            <input type="text" name="answer" placeholder="Add Answer" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="addquestion" value="Add Question" class="btn btn-success">
                                        </div>


                                    </div>

                                </div>

                        </div>
                        <div class="col-lg-6">

                            <div class="card">
                                <div class="card-header">
                                    <strong>Add New qustion with images</strong><small> Insert Question Here</small>
                                </div>
                                <div class="card-body card-block">

                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Add Question</label>
                                        <input type="text" name="fquestion" placeholder="Add Question" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Add Option1</label>
                                        <input type="file" name="fopt1" class="form-control file">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Add Option2</label>
                                        <input type="file" name="fopt2" class="form-control file">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Add Option3</label>
                                        <input type="file" name="fopt3" class="form-control file">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Add Option4</label>
                                        <input type="file" name="fopt4" class="form-control file">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Add Answer</label>
                                        <input type="file" name="fanswer" class="form-control file">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="addquestionimage" value="Add Question" class="btn btn-success">
                                    </div>


                                </div>

                            </div>

                        </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                      <table class="table table-bordered">
                          <tr>
                              <th>Number</th>
                              <th>Questions</th>
                              <th>Option1</th>
                              <th>Option2</th>
                              <th>Option3</th>
                              <th>Option4</th>
                              <th>Action</th>
                          </tr>
                      
                      <?php
                      $res=mysqli_query($conn, "select * from questions where category='$exam_category'order by question_no asc") or die(mysqli_error($conn));
                        while ($row=mysqli_fetch_array($res)) {
                            echo "<tr>";
                            echo "<td>"; echo $row["question_no"]; echo "</td>";
                            echo "<td>"; echo $row["question"]; echo "</td>";
                            echo "<td>"; 
                            if(strpos($row["opt1"], 'images/question/')!==false) {
                                ?>
                                <img src="<?php echo $row["opt1"]; ?>" height="50" width="50" alt="">
                                <?php
                            } else {
                                echo $row["opt1"];
                            }
                            echo "</td>";

                            echo "<td>"; 
                            if(strpos($row["opt2"], 'images/question/')!==false) {
                                ?>
                                <img src="<?php echo $row["opt2"]; ?>" height="50" width="50" alt="">
                                <?php
                            } else {
                                echo $row["opt2"];
                            }
                            echo "</td>";

                            echo "<td>"; 
                            if(strpos($row["opt3"], 'images/question/')!==false) {
                                ?>
                                <img src="<?php echo $row["opt3"]; ?>" height="50" width="50" alt="">
                                <?php
                            } else {
                                echo $row["opt3"];
                            }
                            echo "</td>";

                            echo "<td>"; 
                            if(strpos($row["opt4"], 'images/question/')!==false) {
                                ?>
                                <img src="<?php echo $row["opt4"]; ?>" height="50" width="50" alt="">
                                <?php
                            } else {
                                echo $row["opt4"];
                            }
                            echo "</td>";
                            echo "<td>"; 
                           echo'<a href="" title="Edit" class="edit" data-action="update" data-categoryid="<?php echo $row["exam_cat_id"]; ?><img src="images/icons/pencil.png" alt="Edit" /></a>
                            <a href="" title="Delete" class="remove" data-action="remove" data-categoryid="<?php echo $row["exam_cat_id"]; ?> <img src="images/icons/cross.png" alt="Delete" /></a>';
                                                        
                            echo "</td>";
                            echo "</tr>";
                        }
                      ?>
                      </table>
                    </div>
                </div>
            </div>
        </div>


    </div><!-- .animated -->
</div><!-- .content -->

<?php
include('footer.php');
?>