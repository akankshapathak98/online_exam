<?php
session_start();
include('header.php');
include('../config.php');
if (!isset($_SESSION['admin'])) {
    ?>
<script type="text/javascript">
window.location='index.php';
</script>
<?php
}
if (isset($_POST['createExam'])) {
    mysqli_query($conn, "insert into exam_category (`category`, `exam_time_in_minute`)
     values ('$_POST[examname]', '$_POST[examtime]')") or die(mysqli_error($conn));
    ?>
    <script type="text/javascript">
        alert('exam added successfully');
        window.location.href = window.location.href;
    </script>
    <?php
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Exam</h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="card updatee">
                    <form name="createexam" method="post">
                        <div class="card-body">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Create Exam</strong><small> Create New Exam Here</small></div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">New Exam Category</label>
                                            <input type="text" name="examname" placeholder="Enter Exam Name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Exam Time In Minutes</label>
                                            <input type="text" name="examtime" placeholder="Enter Exam Minute" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="button" name="createExam" value="create Exam" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Exam Categories</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Exam Name</th>
                                                    <th scope="col">Exam Time</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 0;
                                                $res = mysqli_query($conn, "select * from exam_category");
                                                while ($row = mysqli_fetch_array($res)) {
                                                    $count = $count + 1;
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $count; ?></th>
                                                        <td><?php echo $row['category']; ?></td>
                                                        <td><?php echo $row['exam_time_in_minute']; ?></td>
                                                        <td>
                                                            <!-- Icons -->
                                                            <a href="" title="Edit" class="edit" data-action="update" data-categoryid="<?php echo $row["exam_cat_id"]; ?>"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                            <a href="" title="Delete" class="remove" data-action="remove" data-categoryid="<?php echo $row["exam_cat_id"]; ?>"><img src="images/icons/cross.png" alt="Delete" /></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<script>
    $('.remove').on("click", function() {

        var categoryid = $(this).data('categoryid');
        var action = $(this).data('action');

        $.ajax({
                method: "POST",
                url: "action.php",
                data: {
                    categoryid: categoryid,
                    action: action
                }
            })
            .done(function(msg) {
                alert("Data Saved: " + msg);

            });
    });
    $('.edit').on("click", function() {


        var categoryid = $(this).data('categoryid');
        var action = $(this).data('action');

        $.ajax({
                method: "POST",
                url: "action.php",
                data: {
                    categoryid: categoryid,
                    action: action
                }
            })
            .done(function(msg) {
                $('.updatee').html(msg);
            });

    });
</script>

<?php
include('footer.php');
?>