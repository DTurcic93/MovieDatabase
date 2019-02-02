<?php
session_start();
?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" /> 
    <link rel="stylesheet" type="text/css" href="../css/style.css">  
    <title>movieDB</title>  
</head>
<?php
    if(isset($_SESSION['message'])){
        echo"<div id='error_msg'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
?>
<body>
    <div class="header">  
        <h1>movieDB</h1>    
    </div>   

    </div><h2>Welcome <?php echo "[".$_SESSION['username']."]"?></h1><div>
	<div><a href="logout.php">Logout</a></div>
	<div><a href="../html/upload.html">Upload</a></div>
    <hr>
    

    
    
    
</body>
</html>




<?php

    require_once ("../database/DbConfig.php");

    $conn = DbConfig::getInstance();

    $query = "SELECT * FROM movies";

    $stmt = $conn->query($query);
    $stmt->execute();
    $result = $stmt->fetchAll();   


    
    echo "<table style='border-collapse:collapse;border:1px solid black;'>";    
    foreach ($result as $row) { 

        echo "<tr style='border:1px solid black;'>";        
        echo "<td style='border: 1px solid black;'><a style='text-decoration: none;' href='movie.php?id={$row['id']}&name={$row['title']}&genre={$row['genre_id']}'> {$row['title']} </a></td>";
        echo "</tr>";
    }    
    echo "</table>";

    //style='border:1px solid black; font-size:18; font-weight:bold'


?>