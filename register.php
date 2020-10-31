<?php
include('config.php');
if (isset($_POST['register'])) {
    $count=0;
    $res=mysqli_query($conn, "select * from user_registration where username='$_POST[username]'") or die(mysqli_error($conn));
    $count=mysqli_num_rows($res);
    if ($count>0) {
       
    } else {
        mysqli_query($conn, "insert into user_registration (`firstname`,`lastname`,`username`,`passwords`,`email`,`contact`)values('$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[passwords]','$_POST[email]','$_POST[contact]')") or die(mysqli_error($conn));
        
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Register Now</title>
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center custom-login">
                <h3>Register Now</h3>
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="" name="userregistration" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>FirstName</label>
                                    <input type="text" name="firstname" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>LastName</label>
                                    <input type="text" name="lastname" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Password</label>
                                    <input type="password" name="passwords" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Contact</label>
                                    <input type="text" name="contact" class="form-control">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="register" class="btn btn-success loginbtn">Register</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>