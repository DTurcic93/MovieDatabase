<?php

    session_start();

    $con=mysqli_connect("localhost","root","","moviedb","3306");

    if(!$con){
        echo"Not connected to server!";
    }
    if(!mysqli_select_db($con,'moviedb')){
        echo"Database not selected!";
    }

    
    $title=mysqli_real_escape_string($con,$_POST['title']);        
    $year=mysqli_real_escape_string($con,$_POST['year']);
    $length=mysqli_real_escape_string($con,$_POST['length']);
    $picture=mysqli_real_escape_string($con,$_POST['picture']);
    $genre=mysqli_real_escape_string($con,$_POST['genre_id']); 

    $query=" INSERT INTO movies( title, year, length, picture, genre_id) VALUES('$title','$year','$length','$picture','$genre')";
       
    if(!mysqli_query($con,$query)){
        echo"Movie did not upload!";
    }else{
        echo"Movie successfully uploaded!";
    }
        
    header("refresh:2; url=movies.php"); //redirect to movies     
?>


