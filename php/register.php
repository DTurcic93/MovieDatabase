<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" /> 
    <link rel="stylesheet" type="text/css" href="../css/style.css"> 
    <title>movieDB</title>  
</head>
<body> 
</body>
</html>

<?php

    session_start();
    
    $db=mysqli_connect("localhost","root","","moviedb","3306");    

    if(isset($_POST['register_btn'])) {
        $username=mysqli_real_escape_string($db,$_POST['username']);        
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $password=mysqli_real_escape_string($db,$_POST['password']);
        $password2=mysqli_real_escape_string($db,$_POST['password2']);
        
        if($password==$password2){
            $password=md5($password);//encription
            
            $sql=" INSERT INTO users(username, email, password) VALUES('$username','$email','$password')";
            mysqli_query($db,$sql);
            $_SESSION['message']="You completed your registration";
            $_SESSION['username']=$username;
            header("location: movies.php"); //redirect to homepage
        }else {
            $_SESSION['message']="passwords dont match";
            
        }
        if(isset($_SESSION['message'])){
            echo"<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
            header("refresh:1; url=../html/register.html");
        }
        
        
    }
    
        

?>

