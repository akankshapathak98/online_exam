<?php
session_start();
if(!isset($_SESSION['username'])) {
     ?>
     <script type="text/javascript">
     window.location="login.php";
     </script>
     <?php
}
include("header.php");
include('config.php');
?>
        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
               <?php 
               $res=mysqli_query($conn, "select * from exam_category") ;
               while ($row=mysqli_fetch_array($res))
               {
                
                   ?>
                   <a href="dashboard.php?category=<?php $_SESSION['category'] = $row['category'];?>"><input id="exammenu" type="button" class="btn btn-success form-control exam" value="<?php echo $row['category'];?>"></a>
                   <?php
               }
               ?>
            </div>

        </div>
<?php
include('footer.php');
?>




       