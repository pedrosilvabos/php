<?php
IF(ISSET($_GET['registered'])){
	$registered = $_GET['registered'];
        if($registered== TRUE) {
                     echo "
    <div style='position:absolute;' class='alert alert-success'>
  <strong>Success!</strong> Login with you credentials.
</div>
                    ";
        }
 
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Bootstrap Login</title>
<!-- JQUERY -->
<script type="text/javascript" language="javascript" src="../vendor/jquery/jquery.js"></script>
<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
<script src="../vendor/bootstrap/css/bootstrap.min.css"></script>
<link href="../style/style.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" language="javascript" src="../style/style.js"></script>

</head>

<div class="container">
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="../img/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" action="" method="POST">
            <span id="reauth-email" class="reauth-email"></span>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <br>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit"  name="login">Sign in</button>    
        </form>
        <form class="form-signup" action="" method="POST">
        <button class="btn btn-md btn-primary btn-block btn-signup" type="submit"  name="register">Register</button>
        </form>
    </div>
</div>

</body>
</html>

<?php
include "../db_con.php";
IF(ISSET($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user_login WHERE email='$email' AND password='$password'";
    $result=mysqli_query($link,$sql);
    $cek = mysqli_num_rows($result);
    $data = mysqli_fetch_array($result);
    IF($cek > 0)
    {		
        session_start();
        $_SESSION['email'] = $data['email'];
        $_SESSION['name'] = $data['full_name'];
        echo "<script language=\"javascript\">document.location.href='index.php';</script>";
    }else{
        echo "<script language=\"javascript\">alert(\"Invalid username or password\");document.location.href='login.php';</script>";
    }
}
IF(ISSET($_POST['register'])){
   echo " 
   echo '<script language='javascript'>document.location.href='register.php';</script>';
</script>";
}
?>