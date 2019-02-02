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
    session_destroy();
    unset($_SESSION['username']); 
    $_SESSION['message']="you logged out";  
   // header("location: ../html/register.html");

    if(isset($_SESSION['message'])){
        echo"<div id='error_msg'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
        header("refresh:1; url=../html/register.html");
    }
    
?>