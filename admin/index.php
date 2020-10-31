<?php
session_start();
include('../config.php');
if (isset($_POST['login'])) {
    $count=0;
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $passwords=mysqli_real_escape_string($conn, $_POST['passwords']);
    $res=mysqli_query($conn, "select * from admin_login where username='$username' && passwords='$passwords' ");
    $count=mysqli_num_rows($res);
    if ($count==0) {
       
    } else {
        $_SESSION['admin']=$username;
        ?>
        <script type="text/javascript">
            window.location='demo.php';
        </script>
        <?php
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body class="bg-dark">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- no additional media querie or css is required -->
<div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                    <form name="adminlogin" action="" method="post" >
                        <div class="form-group">
                            <label>UserName</label>
                            <input type="text" name="username" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="passwords" class="form-control" placeholder="Password">
                            </div>
                            <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
