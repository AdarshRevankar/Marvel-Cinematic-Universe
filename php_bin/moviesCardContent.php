<?php
    $servername = "localhost";
	$username = "root";
	$password = "";
    $database = "marvel";
    
	$movie_card_split_1 = '<div class="movie-card"><img src="';
    $movie_card_split_2 = '"/><p class="movie-name"><b>';
    $movie_card_split_3 ='</b></p><p class="movie-year">';
    $movie_card_split_4 ='</p></div>';
	
	// Connection Handling
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
	    die("Connection failed: ".$conn->connect_error);
	}

	// Request an Query
	if(isset($_GET['search'])){
        $content = $_GET["search"];
        $query1 =   "SELECT name,img_url,rel_year FROM movies where upper(name) like upper('%".$content."%') ";
    }
    else{
        $query1 =   "SELECT name,img_url,rel_year FROM movies";
    }
	$res_char = $conn->query($query1);
    
	// Show result to html
	if ($res_char->num_rows > 0) {
	    while($row = $res_char->fetch_assoc()) {
            echo $movie_card_split_1
                .$row["img_url"].$movie_card_split_2
                .$row["name"].$movie_card_split_3
                .$row["rel_year"].$movie_card_split_4;
	    }
	} else {
	    echo "0 results";
	}
	$conn->close();
?>