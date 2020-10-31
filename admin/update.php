<?php
include('header.php');
include('../config.php');
$id = $_POST['categoryid'];
                $res=mysqli_query($conn, "select * from exam_category where exam_cat_id=$id");
                while ($row=mysqli_fetch_array($res)) {
                    $examname=$row['category'];
                    $exam_time=$row['exam_time_in_minute'];
                }
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Exam</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form action="" name="createexam" method="post">
                            <div class="card-body">
                                
                            <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Edit Exam</strong><small> Update Exam Here</small></div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">New Exam Category</label>
                                    <input type="text" name="examname" placeholder="Enter Exam Name" class="form-control" value="<?php echo $category?>">
                                </div>
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Exam Time In Minutes</label>
                                        <input type="text" name="examtime" placeholder="Enter Exam Minute" class="form-control"  value="<?php echo $exam_time?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="createExam" value="create Exam" class="btn btn-success">
                                    </div>
                                   
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
    
                               
<?php
include('footer.php');
?>