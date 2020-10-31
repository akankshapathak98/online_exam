<?php
session_start();
include('config.php');
if (isset($_POST['login'])) {
    $count=0;
    $res=mysqli_query($conn, "select * from user_registration where username='$_POST[username]' && passwords='$_POST[passwords]' ")  or die(mysqli_error($conn));
    $count=mysqli_num_rows($res);
    if ($count==0) {

    } else {
        $_SESSION['username']=$_POST["username"];
        ?>
        <script type="text/javascript">
        window.location="select_exam.php";
        </script>
        <?php
    }
}
?>
<!doctype html>
<html>
<head>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>LOGIN FORM</h3>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="" name="userlogin" method="post">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="username" name="username" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" name="passwords" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                            </div>
                            <button type="submit" name="login" class="btn btn-success btn-block loginbtn">Login</button>
                            <a class="btn btn-default btn-block" href="register.php">Register</a>
                        </form>
                    </div>
                </div>
			</div>
		</div>   
    </div>
  </body>
</html>