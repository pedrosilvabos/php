
<?php
include "../db_con.php";
IF(ISSET($_POST['register'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userName = $_POST['userName'];
        $age = $_POST['age'];
        //see if the username is taken
        $sql = "SELECT email FROM user_login WHERE email='$email'";
        $result=mysqli_query($link,$sql);
        print_r($sql."\r\n");  
        $cek = mysqli_num_rows($result);
        print_r($cek."\r\n");
        if($cek == 1){
           echo "
                <div style='position:absolute;' class='alert alert-danger'  role='alert'>
                    <strong>Oh snap!</strong> Change a few things up and try submitting again.
                </div>
            ";
        }else {
            mysqli_query($link,"INSERT INTO user_login (email, password, full_name) VALUES ('$email','$password','$userName');");
            mysqli_query($link,"INSERT INTO users (name, age) VALUES ('$userName', '$age');");
            echo "'<script language='javascript'>document.location.href='login.php?registered=TRUE';</script>'";                       
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
            <form class="form-signin" action="#" method="POST">
                <span id="reauth-email" class="reauth-email"></span>
                Email: <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                Password:<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                Username: <input type="text" id="userName" name="userName" class="form-control" placeholder="userName" required autofocus>
                Age: <input type="text" id="age" name="age" class="form-control" placeholder="age" required autofocus>
                <br>
                <button class="btn btn-md btn-primary btn-block btn-signup" type="submit"  name="register">Register</button>   
            </form>
        </div>
</div>

</body>
</html>