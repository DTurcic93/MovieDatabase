
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" /> 
    <link rel="stylesheet" type="text/css" href="../css/style.css"> 
    <title>movieDB</title>  
</head>
<body>
    <div class="header">
        <h1>Login</h1>
    </div>
</body>
</html>

<?php

    session_start();

    $db=mysqli_connect("localhost","root","","moviedb","3306");

    if(isset($_POST['login_btn'])) {
        $username=mysqli_real_escape_string($db,$_POST['username']);       
        $password=mysqli_real_escape_string($db,$_POST['password']);        
        
        $password=md5($password);

        $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)==1){
            $_SESSION['message']="you are logged in";
            $_SESSION['username']=$username;
            header("location: movies.php");
        }else{
            $_SESSION['message']="wrong usernmae/password";
        }        
        if(isset($_SESSION['message'])){
            echo"<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
            header("refresh:1; url=../html/login.html");
        }
    
    }

?>
