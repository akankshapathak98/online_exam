<?php
include('../config.php');
if (!empty($_POST['action'])) {
    switch ($_POST['action']) {
        case "remove":
            if (isset($_POST['categoryid'])) {
                $id = $_POST['categoryid'];
                mysqli_query($conn, "delete from exam_category where exam_cat_id=$id");
?>
                <script type="text/javascript">
                    alert('exam added successfully');
                    window.location = "exam_category.php";
                </script>
<?php
            }
            break;
        case "update":

            $id = $_POST['categoryid'];
            $res = mysqli_query($conn, "select * from exam_category where exam_cat_id=$id");
            while ($row = mysqli_fetch_array($res)) {
                $examname = $row['category'];
                $exam_time = $row['exam_time_in_minute'];
            }


            break;
    }
}
?>
<form  name="createexam" method="post">
    <div class="card-body">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><strong>Edit Exam</strong><small> Update Exam Here</small></div>
                <div class="card-body card-block">
                    <div class="form-group">
                        <label for="company" class=" form-control-label">New Exam Category</label>
                        <input type="text" name="examname" placeholder="Enter Exam Name" class="form-control" value="<?php echo $category ?>">
                    </div>
                    <div class="form-group">
                        <label for="vat" class=" form-control-label">Exam Time In Minutes</label>
                        <input type="text" name="examtime" placeholder="Enter Exam Minute" class="form-control" value="<?php echo $exam_time ?>">
                    </div>
                    <div class="form-group">
                        <input type="button" name="createExam" value="create Exam" class="btn btn-success">
                    </div>

                </div>
            </div>
        </div>



    </div>
</form>