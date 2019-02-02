<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" /> 
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script>
        function goBack() {
          window.history.back()
        }
    </script> 
    <title>movieDB</title>  
</head>
<body>
    <div class="header">
        <h1>movie</h1>
    </div>
    <button onclick="goBack()">Go Back</button>
    
   
</body>
</html>
<?php

	$id = $_GET['id'];
	$id2 = $_GET['id'];
	$movieTitle = $_GET['name'];
	$genreTitle = $_GET['genre'];

	require_once ("../database/DbConfig.php");

	$conn = DbConfig::getInstance();

	//dohvati sve podatke o filmu
	$query = "SELECT * FROM movies	WHERE id=:id";
	$stmt = $conn->prepare($query);
	$stmt->bindParam(':id', $id);
	$result = $stmt->execute();
	$result = $stmt->fetchAll();

	//dohvati zanr
	$query2="SELECT title FROM genres WHERE id=:genre_id";
	$stmt2 = $conn->prepare($query2);
	$stmt2->bindParam(':genre_id',$genreTitle);
	$result2 = $stmt2->execute();
	$result2 = $stmt2->fetchAll();

	//dohvati glumce
	$query3="SELECT first_name, last_name  FROM actors INNER JOIN actors_movies ON actors.id=actors_movies.actor_id 
    INNER JOIN movies ON actors_movies.movie_id=movies.id
    WHERE movies.id=actors_movies.movie_id AND actors_movies.movie_id=:ids";
	$stmt3 = $conn->prepare($query3);
	$stmt3->bindParam(':ids',$id2);
	$result3 = $stmt3->execute();
	$result3 = $stmt3->fetchAll();

	//echo "<a href='movies.php'>Nazad</a>";
	echo "<h3>Movie: {$movieTitle}</h3>";
	echo"<hr>";

	//ispisi  o filmu
	foreach ($result as $movie) {			
			
		echo "<img src='../image/".$movie['picture']."' />";
		echo "<p> Year: {$movie['year']} <br><br> Length: {$movie['length']}</p>";
		
	}
	
	//ispisi zanr
	foreach ($result2 as $genre) {		
		echo "<p> Genre: {$genre['title']} </p>";
	}
	echo"<hr>";
	//ispisi glumce
	echo "Actors:";
	foreach ($result3 as $actor) {		
		echo "<p>  {$actor['first_name']} {$actor['last_name']} <br> </p>";
	}

?>

